<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends BackendBaseController
{
    protected $model;
    protected $panel = 'About Us';
    protected $base_route = 'admin.about.';
    protected $view_path = 'admin.about_us.';
    protected $img_path = 'images/about_us/';

    public function __construct()
    {
        $this->model = new AboutUs();
    }

    public function index()
    {
        $data = [];
        $data['about'] = $this->model->where('type', 'page')->first();
        $data['abouts'] = $this->model->where('type', 'post')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
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


            try {
                $data = $request->except('image');

                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'about');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($data['title']),
                    'created_by' => auth()->user()->id
                ]);

                $data['abouts'] = $this->model->where('type', 'post')->latest()->get();

                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    'url' => route($this->base_route . 'index'),
                    'isUpdate' => true,
                    // 'reload' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
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

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('about', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:about_us,title,' . $id,
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
            $data['abouts'] = $this->model->where('type', 'post')->latest()->get();
            return response()->json([
                'success_message' => $this->panel . ' Post updated successfully',
                'url' => route($this->base_route . 'index'),
                'isUpdate' => true,
                // 'reload' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render()
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
            'url' => route($this->base_route . 'index'),
            'reload' => true
        ]);
    }

    public function destroy($id)
    {
        try {
            $about = $this->model->findOrFail($id);

            $this->deleteImage($about->image);
            $about->delete($about);

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
