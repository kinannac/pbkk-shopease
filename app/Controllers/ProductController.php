<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        // Melakukan JOIN dengan tabel categories untuk mendapatkan nama kategori
        $data['products'] = $productModel
            ->select('products.*, categories.name AS category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->findAll();

        return view('admin/products/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        
        return view('admin/products/create', $data);
    }

    public function store()
    {
        $productModel = new ProductModel();
        
        $image = $this->request->getFile('image');
        $imageName = 'default.jpg';

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $allowed = ['image/jpeg', 'image/png', 'image/webp'];
            if (!in_array($image->getMimeType(), $allowed)) {
                return redirect()->back()->with('error', 'Format gambar tidak valid');
            }
            $imageName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/products', $imageName);
        }

        $productModel->insert([
            'category_id' => $this->request->getPost('category_id'),
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'image'       => $imageName,
            'status'      => 'active'
        ]);

        return redirect()->to('/admin/products')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);
        return redirect()->to('/admin/products');
    }
}