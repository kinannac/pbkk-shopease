<?php
namespace App\Controllers;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        
        return view('admin/categories/index', $data);
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function store()
    {
        $model = new CategoryModel();
        
        // Validasi input form
        $rules = [
            'name' => 'required|min_length[3]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = $this->request->getPost('name');
        
        $model->insert([
            'name' => $name,
            'slug' => url_title($name, '-', true),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/admin/categories');
    }

    public function edit($id)
    {
        $model = new CategoryModel();
        $data['category'] = $model->find($id);

        if (!$data['category']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/categories/edit', $data);
    }

    public function update($id)
    {
        $model = new CategoryModel();
        
        $rules = [
            'name' => 'required|min_length[3]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = $this->request->getPost('name');
        
        $model->update($id, [
            'name' => $name,
            'slug' => url_title($name, '-', true),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/admin/categories');
    }

    public function delete($id)
    {
        $model = new CategoryModel();
        // Sesuai panduan Tugas Praktikum 4, perhatikan relasi produk jika kategori sudah dipakai
        // Namun untuk awal, kita panggil fungsi delete standar CI4:
        $model->delete($id);

        return redirect()->to('/admin/categories');
    }
}