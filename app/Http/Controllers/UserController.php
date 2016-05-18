<?php

namespace App\Http\Controllers;

class User extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return "lista";
    }

    public function create()
    {
        return "create";
    }

    public function store()
    {
        return "store - (Create)";
    }

    public function show()
    {
        return "find() - Show one";
    }

    public function update()
    {
        return "Update";
    }

    public function login()
    {
        return "login";
    }

    public function logout()
    {
        return "Logout";
    }

    public function delete()
    {
        return "Delete";
    }

}


