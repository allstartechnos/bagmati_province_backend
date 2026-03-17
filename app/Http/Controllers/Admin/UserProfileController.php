<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;

class UserProfileController extends BackendBaseController
{

    protected $model;
    protected $panel = 'Profile';
    protected $base_route = 'admin.profile.';
    protected $view_path = 'admin.profile.';
    protected $img_path = 'images/profile/';

    public function __construct()
    {
        $this->model = new Profile();
    }


    public function index()
    {
        $profile = $this->model->where('user_id', auth()->user()->id)->first();

        return view($this->__loadDataToView($this->base_route . 'index'), compact('profile'));

        return response()->json([
            'status' => 'success',
            'profile' => $profile,
            'isUpdate' => true,
        ]);
    }

    public function store(ProfileRequest $request)
    {

        $data = $request->except('image');
        $data['user_id'] = auth()->user()->id;


        $oldprofile = $this->model->where('user_id', auth()->user()->id)->first();

        $image_folder = Str::lower($this->panel);

        if ($request->hasFile('image')) {
            //delete Old image
            if ($oldprofile && $oldprofile->image) {
                $this->deleteImage($oldprofile->image);
            }
            $data['image'] = $this->uploadImage($request->file('image'), $image_folder);
        }

        $profile = $this->model->updateOrCreate(
            ['user_id' => auth()->id()],
            array_merge($data, [
                $this->model->where('user_id', auth()->id())->exists()
                    ? 'updated_by'
                    : 'created_by' => auth()->id(),
            ])
        );

        $profile->id = $profile->user_id;

        $user = User::find($profile->id);
        $user->name = $request->name;
        $user->username = Str::lower($request->username);
        $user->save();

        $user_profile = $this->model->with('user:id,username,name')->where('user_id', auth()->user()->id)->first();


        return response()->json([
            'status' => 'success',
            'success_message' => 'Profile updated successfully.',
            'profile' => $user_profile,
            'image_path' => asset($this->img_path) . '/',
            'isUpdate' => true,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', function ($attribute, $value, $fail) {
                if (! Hash::check($value, auth()->user()->password)) {
                    $fail('Old Password didn\'t match.');
                }
            }],
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password|min:5'
        ]);

        $user = auth()->user();



        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'success_message' => 'Password updated successfully.',
        ]);
    }
}
