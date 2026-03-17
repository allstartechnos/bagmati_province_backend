<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;

class DocumentController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Legal Documents';
    protected $base_route = 'admin.document.';
    protected $view_path = 'admin.document.';
    protected $img_path = 'images/document/';

    public function __construct()
    {
        $this->model = new Document();
    }

    public function index()
    {
        $data = [];
        $data['document'] = $this->model->where('type', 'page')->first();
        $data['documents'] = $this->model->where('type', 'post')->orderBy('rank')->get();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $document = $this->model->where('type', 'page')->first();

            if ($document) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($document->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'document');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($document->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'document');
                }

                $document->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'document');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'document');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'document');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);
                $data['documents'] = $this->model->where('type', 'post')->orderBy('rank')->get();
                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                    'data' => $data['documents']
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
        $document = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('document'))->render();
    }

    public function edit($id)
    {
        $document = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('document', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:documents,title,' . $id,
            'rank' => 'required|unique:documents,rank,' . $id
        ]);
        $data = $request->except('image');
        $document = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($document->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'document');
            }

            $document->update($data + [
                'type' => 'post',
                'slug' => $data['title'],
                'updated_by' => auth()->user()->id,
            ]);
            $data['documents'] = $this->model->where('type', 'post')->orderBy('rank')->get();
            return response()->json([
                'success_message' => $this->panel . ' Post created successfully',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'isUpdate' => true,
                'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render(),
                'data' => $data['documents']
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
        $document_id = $request['id'];

        $document = $this->model->find($document_id);
        $document->status = $document->status ? '0' : '1';
        $document->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $document = $this->model->findOrFail($id);

            $this->deleteImage($document->image);
            $document->delete($document);

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
