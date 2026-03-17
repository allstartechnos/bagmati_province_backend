<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Category';
    protected $base_route = 'admin.category.';
    protected $view_path = 'admin.category.';
    protected $img_path = 'images/category/';

    public function __construct()
    {
        $this->model = new Category();
    }

    public function index()
    {
        $data = [];
        $data['category'] = $this->model->where('type', 'page')->first();
        $data['categorys'] = $this->model->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $category = $this->model->where('type', 'page')->first();

            if ($category) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($category->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'category');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($category->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'category');
                }

                $category->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'category');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'category');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'category');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['categorys'] = $this->model->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['categorys']
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
        $category = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('category'))->render();
    }

    public function edit($id)
    {
        $category = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('category', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:categories,title,' . $id,
        ]);
        $data = $request->except('image');
        $category = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($category->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'category');
            }

            $category->update($data + [
                'type' => 'post',
                'slug' => Str::slug($data['title']),
                'updated_by' => auth()->user()->id,
            ]);
            $data['categorys'] = $this->model->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['categorys']
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
        $category_id = $request['id'];

        $category = $this->model->find($category_id);
        $category->status = $category->status ? '0' : '1';
        $category->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $category = $this->model->findOrFail($id);

            $this->deleteImage($category->image);
            $category->delete($category);

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
