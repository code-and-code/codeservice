<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
       $this->service = $service;
    }

    public function index()
    {
        $services = $this->service->all();
        return view('admin.service.index')->with('services', $services);
    }

    public function create($id = null)
    {
        return view('admin.service.create',compact('id'));
    }

    public function store(Request $request)
    {
        $this->service->create([
                                'name'       => $request->input('name'),
                                'slug'       => str_slug($request->input('name')),
                                'category_id'=> $request->input('category_id')
                                ]);

        return redirect()->back()->with('status', 'Salvo');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            return view("admin.service.edit")->with('service', $this->service->findOrFail($id));
        } catch (\Exception $e) {
            return redirect(route('service.index'))->with('error', ' ');
        }
    }

    public function update($id, Request $request)
    {
        $this->service->find($id)->update($request->all());
        return redirect()->back()->with('status', 'Salvo');
    }

    public function delete($id)
    {
        try {
            $this->service->findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Excluido');
        } catch (\Exception $e) {
            return redirect(route('category.index'))->with('error', ' ');
        }
        //return delete category database
    }

    protected function setSlug(Service $service)
    {
        $slug    = str_slug($service->name);
        dd($slug);
    }
}
