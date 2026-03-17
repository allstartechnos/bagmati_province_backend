<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\AboutUs;
use App\Models\Message;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Document;
use App\Models\JobsDemand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::first();
        view()->share('setting', $setting);

        view()->share('clients', [
            'client' => Client::where('type', 'page')->first(),
            'clients' => Client::active()->where('type', 'post')->get(),
        ]);

        view()->share('contact', Contact::first());



        view()->share('documents', [
            'documents' => Document::active()->where('type', 'post')->get(),
            'document' => Document::where('type', 'page')->first(),
        ]);

        view()->share('albums', [
            'category' => Category::where('type', 'page')->first(),
            'categories' => Category::with('subCategories', 'pages')
                ->where('status', '0')
                ->whereNull('parent_id')
                ->where('type', 'post')
                ->orderBy('rank')
                ->get(),
        ]);



        
    }
}
