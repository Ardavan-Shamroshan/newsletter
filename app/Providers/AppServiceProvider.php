<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Entities\Notification;
use Modules\League\Entities\TeamResult;
use Modules\Post\Entities\Post;
use Modules\PostCategory\Entities\PostCategory;
use Modules\Setting\Entities\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
//        $this->app->bind('path.public', function() {
//            return base_path().'/../public_html';
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
//        Auth::loginUsingId(1);


        // create @admin, @endadmin directives
        Blade::directive('admin', function () {
            return "<?php if(auth()->guard()->check() && auth()->user()->user_type == 1): ?>";
        });
        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });

        // view composer


        // home head-tag
        view()->composer(['home::layouts.head-tag', 'home::layouts.footer'], function ($view) {
            $view->with('setting', Setting::query()->first());
        });

        // home header
        view()->composer('home::layouts.header', function ($view) {
            // All active categories
            $view->with('categories', PostCategory::query()->where('status', 1)->get());
            // 3 latest posts
            $view->with('latestPosts', Post::query()->where('status', 1)->latest()->take(3)->get());
            // setting
            $view->with('setting', Setting::query()->first());
        });

        // home right sidebar
        view()->composer('home::layouts.mobile-menu', function ($view) {
            // hot posts
            $view->with('hotPosts',  // hot posts
                Post::query()
                    ->where(['status' => 1])
                    ->latest()
                    ->take(8)
                    ->get()
            );
        });

    }
}
