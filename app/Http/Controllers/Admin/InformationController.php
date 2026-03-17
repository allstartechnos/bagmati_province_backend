<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information;

class InformationController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Video Gallery';
    protected $base_route = 'admin.information.';
    protected $view_path = 'admin.information.';
    protected $img_path = 'images/information/';

    public function __construct()
    {
        $this->model = new Information();
    }

    public function index()
    {
        $data = [];
        $data['information'] = $this->model->where('type', 'page')->first();
        $data['informations'] = $this->model->where('type', 'post')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $information = $this->model->where('type', 'page')->first();

            if ($information) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($information->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'information');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($information->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'information');
                }

                $information->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'information');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'information');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'information');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['informations'] = $this->model->where('type', 'post')->latest()->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['informations']
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
        $information = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('information'))->render();
    }

    public function edit($id)
    {
        $information = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('information', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:informations,title,' . $id,
        ]);
        $data = $request->except('image');
        $information = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($information->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'information');
            }

            $information->update($data + [
                'type' => 'post',
                'slug' => $data['title'],
                'updated_by' => auth()->user()->id,
            ]);
            $data['informations'] = $this->model->where('type', 'post')->latest()->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['informations']
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
        $information_id = $request['id'];

        $information = $this->model->find($information_id);
        $information->status = $information->status ? '0' : '1';
        $information->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $information = $this->model->findOrFail($id);

            $this->deleteImage($information->image);
            $information->delete($information);

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
