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

    public function store(Request $resquest)
    {
        $user = $this->user->create($resquest->all());
        dd($user);
        $this->user->create($resquest->all());
        dd($user);
    }

    public function show($id)
    {
        $user = $this->user->find($id);
        dd($user);
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


