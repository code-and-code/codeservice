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

    protected function validation(array $request,$id = '')
    {
        return \Validator::make($request,
            [
                'name' => 'required|string|unique:users,name,'.$id,
                'email' => 'required|string|unique:users,email'.$id,
                'password' => 'required|string|min:5|confirmed'
            ]);
    }

    public function index()
    {
        return view("user.index")->with('users', $this->user->all());
    }

    public function login()
    {
        return view('user.login');
    }

    public function logout()
    {
        return "Logout";
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {
        try{
            return view('user.edit')->with('user', $this->user->findOrFail($id));
        }catch (\Exception $e) {
            return redirect(route('user.index'))->with('error', '');
        }
    }

    public function store(Request $request)
    {
        $validator = $this->validation($request->all());
        if($validator->fails())
        {
            return redirect()->back()->with('error', 'Usuário ja existe');
        } else
        {
            $this->user->create($request->all());
            return redirect(route('user.index'))->with('status', 'Salvo');
        }

    }

    public function update($id, Request $request)
    {
        $validator = $this->validation($request->all(), $id);
        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        } else
        {
            $this->user->find($id)->update($request->all());
            return redirect(route('user.index'))->with('status', 'Salvo');
        }
    }

    public function delete($id)
    {
        try{

            $this->user->find($id)->delete();
            return redirect(route('user.index'))->With('status', 'Salvo');
        }catch (\Exception $e){
            return redirect(route('user.index'))->with('error', '');
        }
    }

}


