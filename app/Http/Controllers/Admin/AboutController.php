<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AboutController extends BackendBaseController
{
    protected $model;
    protected $panel = 'About Category';
    protected $base_route = 'admin.abouts.';
    protected $view_path = 'admin.about.';
    protected $img_path = 'images/about/';

    public function __construct()
    {
        $this->model = new About();
    }

    public function index()
    {
        $data = [];
        $data['about'] = $this->model->where('type', 'page')->first();
        $data['abouts'] = $this->model->where('type', 'post')->orderBy('parent_id')->get();
        $data['categories'] = $this->model->with('posts')->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {

            $request->validate([
                'title' => 'required',
            ]);
            $about = $this->model->where('type', 'page')->first();

            if ($about) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($about->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'about');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($about->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'about');
                }

                $about->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'about');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'about');
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

            // $request->validate([
            //     'title' => 'required',
            //     'design' => 'required',
            // ]);

            $request->validate([
                'title' => 'required',
                'parent_id' => 'nullable',

            ]);

            try {
                $data = $request->except('image');

                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'about');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                // $data['abouts'] = $this->model->where('type', 'post')->orderBy('parent_id')->get();
                $data['categories'] = $this->model->with('posts')->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true,
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['categories'],
                    'user' => $user
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
        $about = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('about'))->render();
    }

    public function edit($id)
    {
        $about = $this->model->findOrFail($id);
        $base_route = $this->base_route;
        $categories = $this->model->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('about', 'categories', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:categories,title,' . $id,
            'design' => 'nullable',
        ]);
        $data = $request->except('image');
        $about = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($about->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'about');
            }

            $about->update($data + [
                'type' => 'post',
                'slug' => Str::slug($data['title']),
                'updated_by' => auth()->user()->id,
            ]);
            // $data['abouts'] = $this->model->where('type', 'post')->orderBy('parent_id')->get();
            $data['categories'] = $this->model->with('posts')->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();

            return response()->json([
                'success_message' => $this->panel . ' Post updated successfully',
                'url' => route($this->base_route . 'index'),
                'reload' => true,
                'isUpdate' => true,
                // 'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                // 'data' => $data['categories']
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
        $about_id = $request['id'];

        $about = $this->model->find($about_id);
        $about->status = $about->status ? '0' : '1';
        $about->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $about = $this->model->findOrFail($id);

            if ($about->posts?->count() > 0) {
                return response()->json([
                    'error_message' => 'Please delete the related items first before deleting this.',
                    'url' => route($this->base_route . 'index'),
                ]);
            }

            $this->deleteImage($about->image);
            $about->delete($about);
            $data['categories'] = $this->model->where('type', 'post')->whereNull('parent_id')->orderBy('rank')->get();
            return response()->json([
                'success_message' => $this->panel . ' deleted successfully',
                'url' => route($this->base_route . 'index'),
                'reload' => true
                // 'isUpdate' => true,
                // 'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                // 'data' => $data['categories']
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something went wrong',
                'url' => route($this->base_route . 'index'),
                'reload' => true
            ]);
        }
    }
}
