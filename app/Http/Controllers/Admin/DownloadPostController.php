<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Download;

class DownloadPostController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Download Post';
    protected $base_route = 'admin.downloadpost.';
    protected $view_path = 'admin.downloadpost.';
    protected $img_path = 'images/downloadpost/';

    public function __construct()
    {
        $this->model = new Download();
    }

    public function index()
    {
        $data = [];
        $data['download'] = $this->model->where('type', 'page')->first();
        $data['downloadposts'] = $this->model->where('type', 'post')->whereNotNull('parent_id')->latest()->get();
        $data['downloads'] = $this->model->with('posts')->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'parent_id' => 'required',
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $download = $this->model->where('type', 'page')->first();

            if ($download) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($download->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'downloadpost');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($download->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'downloadpost');
                }

                $download->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' DownloadPost updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'downloadpost');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'downloadpost');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'downloadpost');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['downloadposts'] = $this->model->where('type', 'post')->whereNotNull('parent_id')->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['downloadposts']
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
        $download = $this->model->where('type', 'post')->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('download'))->render();
    }

    public function edit($id)
    {
        $page = $this->model->findOrFail($id);
        // dd($download->title);

        $base_route = $this->base_route;
        // $data['downloads'] = $this->model->where('type', 'post')->whereNotNull('parent_id')->latest()->get();
        $categories = $this->model->with('posts')->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('page', 'categories', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:downloads,title,' . $id,
        ]);
        $data = $request->except('image');
        $download = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($download->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'downloadpost');
            }

            $download->update($data + [
                'type' => 'post',
                'slug' => Str::slug($request['title']),
                'updated_by' => auth()->user()->id,
            ]);

            $data['downloadposts'] = $this->model->where('type', 'post')->whereNotNull('parent_id')->latest()->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['downloadposts']
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
