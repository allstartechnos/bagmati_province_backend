<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class MessageController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Messages';
    protected $base_route = 'admin.message.';
    protected $view_path = 'admin.message.';
    protected $img_path = 'images/message/';

    public function __construct()
    {
        $this->model = new Message();
    }

    public function index()
    {
        $data = [];
        $data['message'] = $this->model->where('type', 'page')->first();
        $data['messages'] = $this->model->where('type', 'post')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $message = $this->model->where('type', 'page')->first();

            if ($message) {

                if ($request->hasFile('image')) {

                    $this->deleteImage($message->image);
                    //store data in database
                     $data['image'] = $this->uploadImage($request->file('image'), 'message');

                    // //upload functionality for the image
                    // $image = $request->file('image');

                    // $image_name = time() . '.' . $image->getClientOriginalExtension();

                    // $basePath = public_path($this->img_path);
                    // $thumbPath = $basePath . '/thumbnails';

                    // // Ensure directories exist
                    // if (!File::exists($basePath)) {
                    //     File::makeDirectory($basePath, 0755, true);
                    // }

                    // if (!File::exists($thumbPath)) {
                    //     File::makeDirectory($thumbPath, 0755, true);
                    // }

                    // // Move original image
                    // $image->move($basePath, $image_name);

                    // // Intervention Image
                    // $imgManager = new ImageManager(new Driver());

                    // $thumbnailImage = $imgManager->read($basePath . '/' . $image_name);

                    // $thumbnailImage
                    //     ->resize(250, 250)
                    //     ->save($thumbPath . '/' . $image_name);
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($message->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'message');
                }

                $message->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'message');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'message');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'message');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['messages'] = $this->model->where('type', 'post')->latest()->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['messages']
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
        $message = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('message'))->render();
    }

    public function edit($id)
    {
        $message = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('message', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:messages,title,' . $id,
        ]);
        $data = $request->except('image');
        $message = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($message->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'message');
            }

            $message->update($data + [
                'type' => 'post',
                'slug' => $data['title'],
                'updated_by' => auth()->user()->id,
            ]);
            $data['messages'] = $this->model->where('type', 'post')->latest()->get();
            return response()->json([
                'success_message' => $this->panel . ' Post updated successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true,
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['messages']
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
        $message_id = $request['id'];

        $message = $this->model->find($message_id);
        $message->status = $message->status ? '0' : '1';
        $message->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $message = $this->model->findOrFail($id);

            $this->deleteImage($message->image);
            $message->delete($message);

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
