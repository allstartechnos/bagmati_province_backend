<?php

namespace App\Http\Controllers\Admin;

use App\Models\Download;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Download';
    protected $base_route = 'admin.download.';
    protected $view_path = 'admin.download.';
    protected $img_path = 'images/download/';

    public function __construct()
    {
        $this->model = new Download();
    }

    public function index()
    {
        $data = [];
        $data['download'] = $this->model->where('type', 'page')->first();
        $data['downloads'] = $this->model->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $download = $this->model->where('type', 'page')->first();

            if ($download) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($download->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'download');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($download->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'download');
                }

                $download->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'download');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'download');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'download');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['downloads'] = $this->model->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['downloads']
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
        $download = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('download'))->render();
    }

    public function edit($id)
    {
        $download = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('download', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:categories,title,' . $id,
        ]);
        $data = $request->except('image');
        $download = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($download->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'download');
            }

            $download->update($data + [
                'type' => 'post',
                'slug' => Str::slug($data['title']),
                'updated_by' => auth()->user()->id,
            ]);
            $data['downloads'] = $this->model->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['downloads']
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
        $download_id = $request['id'];

        $download = $this->model->find($download_id);
        $download->status = $download->status ? '0' : '1';
        $download->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $download = $this->model->findOrFail($id);

            $this->deleteImage($download->image);
            $download->delete($download);

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
