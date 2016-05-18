<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Command;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    protected $command;

    public function __construct(Command $command)
    {
       $this->command = $command;
    }

    public function index()
    {
        $commands = $this->command->all();
        return view('admin.command.index')->with('commands', $commands);// index = all category
    }

    public function create($id)
    {
        return view('admin.command.create',compact('id'));
    }

    public function store(Request $request)
    {
        $this->command->create($request->all());
        return redirect()->back()->with('status', 'Salvo');
        //return create category database
    }

    public function show($id)
    {
        return "Show $id";
        //return view show = one category
    }

    public function edit($id)
    {
        try {
            return view("admin.command.edit")->with('command', $this->command->findOrFail($id));
        } catch (\Exception $e) {
            return redirect(route('command.index'))->with('error', ' ');
        }
    }

    public function update($id, Request $request)
    {
        $this->command->find($id)->update($request->all());
        return redirect()->back()->with('status', 'Salvo');
    }

    public function delete($id)
    {
        try {
            $this->command->findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Excluido');
        } catch (\Exception $e) {
            return redirect(route('category.index'))->with('error', ' ');
        }
        //return delete category database
    }

    public function exec ($id)
    {
        try {
            $command = $this->command->findOrFail($id);
            exec($command->command);
            return redirect()->back();;

        } catch (\Exception $e) {
            return redirect()->back()->with('error', ' ');
        }

    }
    //
}
