<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class HomeController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        // Ambil produk yang aktif dari database
        $data['products'] = $productModel->where('status', 'active')->findAll();
        // Ambil kategori untuk menu navigasi/kategori pilihan
        $data['categories'] = $categoryModel->findAll();

        return view('frontend/home', $data);
    }
}