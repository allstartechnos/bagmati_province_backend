<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminCreateController extends BackendBaseController
{

    protected $model;
    protected $panel = "Admin Create";
    protected $base_route = 'admin.admin_create.';
    protected $view_path = 'admin.admin_create.';
    protected $img_path = 'images/admin-create';

    public function __construct()
    {
        $this->model = new User();
    }


    public function index(Request $request)
    {
        $data = [];
        $data['users'] = $this->model->where('role', '!=', 'superadmin')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'nullable|unique:users,username',
            'email' => 'nullable|unique:users,email'
        ]);

        $data = $request->all();

        $user = $this->model->create($data + [
            'role' => 'admin',
            'password' => Hash::make('12345')
        ]);
        return response()->json([
            'success_message' => 'Admin created successfully',
            'url' => route($this->base_route . 'index'),
            'reload' => true
        ]);
    }

    public function edit(Request $request, $id)
    {

        $data = [];
        $data['user'] = User::find($id);
        $data['users'] = $this->model->where('role', '!=', 'superadmin')->latest()->get();
        return view($this->__loadDataToView($this->base_route . 'index'), compact('data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'username' => 'nullable|unique:users,username,' . $id,
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id
        ]);

        $data = [];
        $data['user'] = User::find($id);
        $data['user']->update($request->all());


        return response()->json([
            'success_message' => $this->panel . ' updated successfully',
            'reload' => true,
            'url' => route($this->base_route . 'index'),
        ]);
    }

    public function destroy(Request $request, $id)
    {

        $user = User::find($id);
        $user->delete();

        return response()->json([
            'success_message' => $this->panel . ' deleted successfully',
            // 'url' => route($this->base_route . 'index'),
            // 'reload' => true

        ]);
    }
}
