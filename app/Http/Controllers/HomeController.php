<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $categories = Category::where('show','=',true, 'and', 'action', '=', true)->get();

        return view('home')->with('categories', $categories);
    }
}
