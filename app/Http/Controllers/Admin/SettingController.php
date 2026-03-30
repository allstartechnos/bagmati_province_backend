<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

class SettingController extends BackendBaseController
{
    protected $model;
    protected $panel = 'Setting';
    protected $base_route = 'admin.setting.';
    protected $view_path = 'admin.setting.';
    protected $img_path = 'images/setting/';

    public function __construct()
    {
        $this->model = new Setting();
    }


    public function index()
    {
        $setting = $this->model->first();
        return view($this->__loadDataToView($this->view_path . 'index'), compact('setting'));
        return response()->json([
            'status' => 'success',
            'setting' => $setting,
            'isUpdate' => true,
        ]);
    }

    public function store(SettingRequest $request)
    {

        $data = $request->except('logo', 'fav_icon');



        $setting = $this->model->first();

        if ($setting) {
            if ($request->hasFile('logo')) {
                $this->deleteImage($setting->logo);
                $data['logo'] = $this->uploadImage($request->file('logo'), 'setting');
            }
            if ($request->hasFile('fav_icon')) {
                $this->deleteImage($setting->fav_icon);
                $data['fav_icon'] = $this->uploadImage($request->file('fav_icon'), 'setting');
            }
            $data['updated_by'] = auth()->id();
            $setting->update($data);
        } else {
            if ($request->hasFile('logo')) {
                $data['logo'] = $this->uploadImage($request->file('logo'), 'setting');
            }
            if ($request->hasFile('fav_icon')) {
                $data['fav_icon'] = $this->uploadImage($request->file('fav_icon'), 'setting');
            }
            $data['created_by'] = auth()->id();
            $this->model->create($data);
        }

        $message = $setting->wasRecentlyCreated
            ? 'Setting created successfully.'
            : 'Setting updated successfully.';


        return response()->json([
            'status' => 'success',
            'success_message' => $message,
            'setting' => $setting,
            'image_path' => asset($this->img_path) . '/',
            'isUpdate' => true,
        ]);
    }
}
