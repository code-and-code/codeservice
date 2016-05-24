<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return redirect()->to('/categories');
    }

    public function slug($slug)
    {
        try
        {
            $service = Service::whereId($slug)->orWhere('name',$slug)->first();
            if(!$service)
            {
                throw  new \Exception();
            }
            //return view();
        }
        catch (\Exception $e)
        {
            return view('error.404');
        }
    }

    public function getCategories(Request $request)
    {

        if($request->method() == 'get')
        {
            $categories = Category::where('show', 1)->where('active', 1)->get();
        }else {
            $name = $request->input('search');
            $categories = Category::where('name', 'like', '%'.$name.'%')->OrderBy('name')->get();
        }
        return view('home')->with('action', 'categories')->with('data', $categories);
    }

    public function getServices(Request $request)
    {
        if($request->method() == 'get')
        {
            $services = Service::all();
        }else{
            $name = $request->input('search');
            $services = Service::where('name', 'like', '%'.$name.'%')->OrderBy('name')->get();
        }
        return view('home')->with('action', 'services')->with('data', $services);
    }

    public function getService($id)
    {
        try{
            $services = Service::where('category_id', $id)->get();

            return view('home')->with('action', 'services')->with('data', $services);
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Categoria sem serviço');
        }
    }
}
