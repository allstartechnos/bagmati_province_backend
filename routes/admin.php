<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCreateController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\CategoryWisePageController;



Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    //Profile 
    Route::resource('profile', UserProfileController::class)->only(['index', 'store'])->names('profile');
    Route::post('update-password', [UserProfileController::class, 'updatePassword'])->name('update_password');
    Route::post('update-profile-photo', [UserProfileController::class, 'updateProfilePhoto'])->name('profile.upload_photo');

    //Setting
    Route::resource('setting', SettingController::class)->only(['index', 'store'])->names('setting');

    //Slider
    Route::resource('slider', SliderController::class);
    Route::get('slider-status', [SliderController::class, 'statusChanged'])->name('slider.status');

    //About Us
    Route::resource('about', AboutUsController::class);
    Route::get('about-status', [AboutUsController::class, 'statusChanged'])->name('about.status');

    //Our Team
    Route::resource('team', TeamController::class);
    Route::get('team-status', [TeamController::class, 'statusChanged'])->name('team.status');
    Route::get('team-trash', [TeamController::class, 'softDelete'])->name('team.soft_delete');
    Route::delete('team-delete/{id}', [TeamController::class, 'deletePermanent'])->name('team.permanent_delete');
    Route::put('team-restore/{id}', [TeamController::class, 'restore'])->name('team.restore');

    //Messages
    Route::resource('message', MessageController::class);
    Route::get('message-status', [MessageController::class, 'statusChanged'])->name('message.status');

    //Nepal Information
    Route::resource('information', InformationController::class);
    Route::get('information-status', [InformationController::class, 'statusChanged'])->name('information.status');

    //Our Legal Documents
    Route::resource('document', DocumentController::class);
    Route::get('document-status', [DocumentController::class, 'statusChanged'])->name('document.status');


    //This is for counter Clients  
    Route::resource('client', ClientController::class);
    Route::get('client-status', [ClientController::class, 'statusChanged'])->name('client.status');


    //Contact Us 
    Route::resource('contact', ContactController::class);

    //Category For Client  
    Route::resource('category', CategoryController::class);
    Route::get('category-status', [CategoryController::class, 'statusChanged'])->name('category.status');

    //Categorywise Page For Client 
    Route::resource('page', CategoryWisePageController::class);
    Route::get('page-status', [CategoryWisePageController::class, 'statusChanged'])->name('page.status');
});

Route::middleware(['auth', 'isSuperAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('admin-create', AdminCreateController::class)->names('admin_create');
});
