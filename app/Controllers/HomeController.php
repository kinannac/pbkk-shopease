<?php
namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data['title'] = 'ShopEase Online Store';
        return view('frontend/home', $data);
    }
}