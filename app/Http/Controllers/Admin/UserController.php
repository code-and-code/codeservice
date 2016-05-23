<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    protected function validation(array $request, $id = '')
    {
        return \Validator::make($request,
            [
                'name' => 'required|string|unique:users,name,' . $id,
                'email' => 'required|string|unique:users,email' . $id,
                'password' => 'required|string|min:5|confirmed'
            ]);
    }

    protected function create(array $data )
    {
        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function index()
    {
        return view("admin.user.index")->with('users', $this->user->all());
    }

    public function register()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validation($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            $this->create($request->all());

            return redirect(route('user.index'))->with('status', 'Salvo');
        }
    }

    public function edit($id)
    {
        try {
            return view('admin.user.edit')->with('user', $this->user->findOrFail($id));
        } catch (\Exception $e) {
            return redirect(route('user.index'))->with('error', '');
        }
    }

    public function update($id, Request $request)
    {
        $validator = $this->validation($request->all(), $id);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $this->user->find($id)->update($request->all());
            return redirect(route('user.index'))->with('status', 'Salvo');
        }
    }

    public function delete($id)
    {
        try {

            $this->user->find($id)->delete();
            return redirect(route('user.index'))->With('status', 'Salvo');
        } catch (\Exception $e) {
            return redirect(route('user.index'))->with('error', '');
        }
    }
}


