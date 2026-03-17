<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryWisePageController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Page';
    protected $base_route = 'admin.page.';
    protected $view_path = 'admin.page.';
    protected $img_path = 'images/page/';

    public function __construct()
    {
        $this->model = new Category();
    }

    public function index()
    {
        $data = [];
        $data['page'] = $this->model->where('type', 'page')->first();
        $data['pages'] = $this->model->where('type', 'post')->whereNotNull('parent_id')->latest()->get();
        $data['categories'] = $this->model->with('pages')->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
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
            $page = $this->model->where('type', 'page')->first();

            if ($page) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($page->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'page');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($page->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'page');
                }

                $page->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'page');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'page');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'page');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['pages'] = $this->model->where('type', 'post')->whereNotNull('parent_id')->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['pages']
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
        $page = $this->model->where('type', 'post')->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('page'))->render();
    }

    public function edit($id)
    {
        $page = $this->model->findOrFail($id);
        $base_route = $this->base_route;
        // $data['pages'] = $this->model->where('type', 'post')->whereNotNull('parent_id')->latest()->get();
        $categories = $this->model->with('pages')->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('page', 'categories', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:categories,title,' . $id,
        ]);
        $data = $request->except('image');
        $page = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($page->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'page');
            }

            $page->update($data + [
                'type' => 'post',
                'slug' => Str::slug($request['title']),
                'updated_by' => auth()->user()->id,
            ]);
            $data['pages'] = $this->model->where('type', 'post')->whereNotNull('parent_id')->latest()->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['pages']
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
        $page_id = $request['id'];

        $page = $this->model->find($page_id);
        $page->status = $page->status ? '0' : '1';
        $page->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $page = $this->model->findOrFail($id);

            $this->deleteImage($page->image);
            $page->delete($page);

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
