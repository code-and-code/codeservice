<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    protected function validation(array $request,$id = '')
    {
        return \Validator::make($request,
            [
                'name' => 'required|string|unique:categories,name,'.$id
            ]);
    }

    protected function enableDisable($id, $action = null)
    {
        $category = $this->category->find($id);
        if($category)
        {
                switch($action){
                    case 'active':
                        ($category->active) ? $category->active = false : $category->active = true;
                        break;
                    case 'show':
                        ($category->show) ? $category->show = false : $category->show = true;
                        break;
                    default:
                        throw new \Exception('Action not found');
                }
            return  $category->save();
        }
        else
        {
            throw new \Exception('Categoria não existe');
        }
    }

    public function index()
    {
        return view("admin.category.index")->with('categories', $this->category->paginate(10));
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(Request $request)
    {
        $validator = $this->validation($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $this->category->create($request->all());
            return redirect(route('category.index'))->with('status', 'Salvo');
        }
    }



    public function edit($id)
    {
        try {
            return view("admin.category.edit")->with('category', $this->category->findOrFail($id));
        } catch (\Exception $e) {
            return redirect(route('category.index'))->with('error', ' ');
        }
    }

    public function update($id, Request $request)
    {
        $validator = $this->validation($request->all(),$id);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $this->category->find($id)->update($request->all());
            return redirect(route('category.index'))->with('status', 'Salvo');
        }
    }

    public function delete($id)
    {
        try {
            $this->category->findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Excluido');
        } catch (\Exception $e) {
            return redirect(route('category.index'))->with('error', ' ');
        }
    }

    public function search(Request $request)
    {
        $name = $request->input('search');

        $categories = $this->category->where('name', 'like', '%'.$name.'%')->get();

        return view('admin.category.show')->with('categories', $categories);
    }

    public function active($id)
    {
        try
        {
            $this->enableDisable($id, 'active');
            return redirect()->back()->with('status', 'Salvo');
        }catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function display($id)
    {
        try
        {
            $this->enableDisable($id, 'show');
            return redirect()->back()->with('status', 'Salvo');
        }catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
