<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;

class NoticeController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Notice';
    protected $base_route = 'admin.notice.';
    protected $view_path = 'admin.notice.';
    protected $img_path = 'images/notice/';

    public function __construct()
    {
        $this->model = new Notice();
    }

    public function index()
    {
        $data = [];
        $data['notice'] = $this->model->where('type', 'page')->first();
        $data['notices'] = $this->model->where('type', 'post')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $notice = $this->model->where('type', 'page')->first();

            if ($notice) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($notice->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'notice');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($notice->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'notice');
                }

                $notice->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'notice');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'notice');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'notice');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['notices'] = $this->model->where('type', 'post')->latest()->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['notices']
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
        $notice = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('notice'))->render();
    }

    public function edit($id)
    {
        $notice = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('notice', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:notices,title,' . $id,
        ]);
        $data = $request->except('image');
        $notice = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($notice->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'notice');
            }

            $notice->update($data + [
                'type' => 'post',
                'slug' => $data['title'],
                'updated_by' => auth()->user()->id,
            ]);
            $data['notices'] = $this->model->where('type', 'post')->latest()->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['notices']
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
        $notice_id = $request['id'];

        $notice = $this->model->find($notice_id);
        $notice->status = $notice->status ? '0' : '1';
        $notice->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $notice = $this->model->findOrFail($id);

            $this->deleteImage($notice->image);
            $notice->delete($notice);

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
