<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view("user.index")->with('users', $this->user->all());
    }

    public function login()
    {
        return view('user.login');
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {
        try{
            return view('user.edit')->with('user', $this->user->findOrFail($id));
        }catch (\Exception $e){
            return redirect(route('user.index'))->with('error', '');
        }
    }

    public function store(Request $resquest)
    {
        $this->user->create($resquest->all());
        return redirect()->back()->with('status', 'Usuario Cadastrado');
    }

    public function show($id)
    {
        $user = $this->user->find($id);
        return $user;
    }

    public function update()
    {

    }

    public function logout()
    {
        return "Logout";
    }

    public function delete($id)
    {
        $user = $this->user->find($id);
    }

}


