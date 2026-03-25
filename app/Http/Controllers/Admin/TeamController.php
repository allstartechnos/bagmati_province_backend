<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Our Team';
    protected $base_route = 'admin.team.';
    protected $view_path = 'admin.team.';
    protected $img_path = 'images/team/';

    public function __construct()
    {
        $this->model = new Team();
    }

    public function index()
    {
        $data = [];
        $data['team'] = $this->model->where('type', 'page')->first();
        $data['teams'] = $this->model->where('type', 'post')->orderBy('rank')->get();
        $data['trashed_count'] = $this->model->onlyTrashed()->count();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'rank' => 'nullable|unique:teams,rank'
        ]);


        $data = $request->except('image', 'banner');

        if ($request->type == 'page') {
            $team = $this->model->where('type', 'page')->first();

            if ($team) {


                if ($request->hasFile('image')) {
                    $this->deleteImage($team->image);
                    $data['image'] = $this->uploadImage($request->file('image'), 'team');
                }
                if ($request->hasFile('banner')) {
                    $this->deleteImage($team->banner);
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'team');
                }

                $team->update($data + [
                    'slug' => Str::slug($request['title']),
                    'updated_by' => auth()->user()->id,
                ]);

                return response()->json([
                    'success_message' => $this->panel . ' Page updated successfully',
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'team');
                }

                if ($request->hasFile('banner')) {
                    $data['banner'] = $this->uploadImage($request->file('banner'), 'team');
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
                    $data['image'] = $this->uploadImage($request->file('image'), 'team');
                }

                $user = $this->model->create($data + [
                    'type' => 'post',
                    'slug' => Str::slug($request->title),
                    'created_by' => auth()->user()->id
                ]);

                $data['teams'] = $this->model->where('type', 'post')->orderBy('rank')->get();

                return response()->json([
                    'success_message' => $this->panel . ' Post created successfully',
                    // 'url' => route($this->base_route . 'index'),
                    // 'reload' => true
                    'isUpdate' => true,
                    'html' => view($this->__loadDataToView($this->view_path . 'table'), compact('data'))->render()
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
        $team = $this->model->findOrFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'), compact('team'))->render();
    }

    public function edit($id)
    {
        $team = $this->model->findOrFail($id);
        $base_route = $this->base_route;

        return view($this->__loadDataToView($this->view_path . 'edit'), compact('team', 'base_route'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:teams,title,' . $id,
            'rank' => 'nullable|unique:teams,rank,' . $id
        ]);
        $data = $request->except('image');
        $team = $this->model->where('type', 'post')->findOrFail($id);

        try {

            if ($request->hasFile('image')) {
                $this->deleteImage($team->image);
                $data['image'] = $this->uploadImage($request->file('image'), 'team');
            }

            $team->update($data + [
                'type' => 'post',
                'slug' => $data['title'],
                'updated_by' => auth()->user()->id,
            ]);
            $data['teams'] = $this->model->where('type', 'post')->orderBy('rank')->get();
            $data['trashed_count'] = $this->model->onlyTrashed()->count();
            return response()->json([
                'success_message' => $this->panel . ' Post updated successfully',
                'url' => route($this->base_route . 'index'),
                'isUpdate' => true,
                // 'reload' => true,
                'total_count' => $data['trashed_count'],
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
        $team_id = $request['id'];

        $team = $this->model->find($team_id);
        $team->status = $team->status ? '0' : '1';
        $team->save();

        return response()->json([
            'success_message' => $this->panel . ' status changed successfully',
        ]);
    }

    public function destroy($id)
    {
        try {
            $team = $this->model->findOrFail($id);

            // $this->deleteImage($team->image);
            $team->delete($team);

            return response()->json([
                'success_message' => $this->panel . ' deleted successfully',
            ]);
            $trash = $this->model->onlyTrashed()->count();
        } catch (\Exception $e) {
            return response()->json([
                'error_message' => 'Something went wrong',
                // 'url' => route($this->base_route . 'index'),
                // 'reload' => true
                'trash' => $trash

            ]);
        }
    }

    public function softDelete()
    {
        $data['teams'] = $this->model->where('type', 'post')->onlyTrashed()->latest()->get();
        return view($this->__loadDataToView($this->view_path . 'trash'), compact('data'));
    }

    public function restore($id)
    {
        $team = $this->model->onlyTrashed()->find($id);
        $team->restore();
        return response()->json([
            'success_message' => $this->panel . ' Restore Successfully',
            'url' => route($this->base_route . 'index'),
            'reload' => true
        ]);
    }

    public function deletePermanent($id)
    {
        $team = $this->model
            ->withTrashed()
            ->where('type', 'post')
            ->findOrFail($id);

        if (!empty($team->image)) {
            $this->deleteImage($team->image);
        }

        $team->forceDelete();

        return response()->json([
            'success_message' => $this->panel . ' deleted permanently successfully',
        ]);
    }
}
