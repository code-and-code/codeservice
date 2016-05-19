<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    protected $language;
    protected $langs  = [ 'pt-br' => ['active' => 'Ativado',   'show' => 'Ativado', 'disabled' => 'Desabilitado'],
                          'eng'   => ['active' => 'activated', 'show' => 'activated', 'disabled' => 'Desabled', ],
                        ];

    public function __construct(Category $category, $language = 'pt-br')
    {
        $this->category = $category;
        $this->setLanguage($language);
    }

    protected function setLanguage($lang)
    {
        if(!array_key_exists($lang,$this->langs))
        {
            throw new \Exception($lang.' not found');
        }
        $this->language = $lang;
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
        $actions  = ['active','show'];

        if(!in_array($action,$actions))
        {
            throw new \Exception('Action not found');
        }

        $category = $this->category->find($id);
        if($category)
        {
            ($category->$action) ? $category->$action = false : $category->$action = true ;
            $category->save();
            return $category;
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
            $this->category->find($id)->delete();
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

    public function active($id, Request $request)
    {

        $action = $request->get('action');

        try
        {
            $category = $this->enableDisable($id, $action);
            ($category->$action) ? $msg = $this->langs[$this->language][$action] : $msg = $this->langs[$this->language]['disabled'];

            return redirect()->back()->with('status', $msg);
        }catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
