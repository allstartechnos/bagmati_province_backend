<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Contact Us';
    protected $base_route = 'admin.contact.';
    protected $view_path = 'admin.contact.';
    protected $img_path = 'images/contact/';

    public function __construct()
    {
        $this->model = new Contact(); //This model is place for Counter 
    }

    public function index()
    {
        $data = [];
        $data['contact'] = $this->model->where('type', 'page')->first();
        $data['contacts'] = $this->model->where('type', 'post')->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $contact = $this->model->where('type', 'page')->first();

            if ($contact) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($contact->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'contact');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($contact->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'contact');
                }

                $contact->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'contact');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'contact');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'contact');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['contacts'] = $this->model->where('type', 'post')->orderBy('rank')->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['contacts']
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
        $contact = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('contact'))->render();
    }

    public function edit($id)
    {
        $contact = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('contact', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:contacts,title,' . $id,
        ]);
        $data = $request->except('image');
        $contact = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($contact->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'contact');
            }

            $contact->update($data + [
                'type' => 'post',
                'slug' => $data['title'],
                'updated_by' => auth()->user()->id,
            ]);
            $data['contacts'] = $this->model->where('type', 'post')->latest()->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['contacts']
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => $e,
                'url' => route($this->base_route . 'index'),
                'reload' => true
            ]);
        }
    }



    public function destroy($id)
    {
        try {
            $contact = $this->model->findOrFail($id);

            $this->deleteImage($contact->image);
            $contact->delete($contact);

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
