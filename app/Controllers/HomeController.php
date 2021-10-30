<?php

namespace App\Controllers;

class HomeController
{
    public function index(array $request)
    {
        include __DIR__ . '/../../resources/views/homepage.php';
    }
}
