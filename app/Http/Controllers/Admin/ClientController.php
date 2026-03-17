<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Client';
    protected $base_route = 'admin.client.';
    protected $view_path = 'admin.client.';
    protected $img_path = 'images/client/';

    public function __construct()
    {
        $this->model = new Client(); //This model is place for Counter 
    }

    public function index()
    {
        $data = [];
        $data['client'] = $this->model->where('type', 'page')->first();
        $data['clients'] = $this->model->where('type', 'post')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $client = $this->model->where('type', 'page')->first();

            if ($client) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($client->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'client');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($client->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'client');
                }

                $client->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'client');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'client');
                }

                $this->model->create($data + [
                    'type' => 'page',
                    'slug' => Str::slug($request['title']),
                    'created_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page created successfully',
                ]);
            }
        }
        if ($request->type == 'post') {


            try {
                $data = $request->except('image');

                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'client');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['clients'] = $this->model->where('type', 'post')->orderBy('rank')->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['clients']
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error_message' => 'Something went wrong',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                ]);
            }
        }
    }

    public function show($id)
    {
        $client = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('client'))->render();
    }

    public function edit($id)
    {
        $client = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('client', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:clients,title,' . $id,
        ]);
        $data = $request->except('image');
        $client = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($client->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'client');
            }

            $client->update($data + [
                'type' => 'post',
                'slug' => Str::slug($request->title),
                'updated_by' => auth()->user()->id,
            ]);
            $data['clients'] = $this->model->where('type', 'post')->latest()->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['clients']
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => $e,
                'url' => route($this->base_route . 'index'),
                'reload' => true
            ]);
        }
    }


    public function statusChanged(Request $request)
    {
        $client_id = $request['id'];

        $client = $this->model->find($client_id);
        $client->status = $client->status ? '0' : '1';
        $client->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $client = $this->model->findOrFail($id);

            $this->deleteImage($client->image);
            $client->delete($client);

            return response()->json([
                'success_message' => $this->panel . ' deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something went wrong',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
            ]);
        }
    }
}
