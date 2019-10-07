<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->serviceMenu();
        $this->topMenu();
    }

    public function serviceMenu() {
        View::composer('layouts.services_menu', function($view) {
            $view->with('services', \App\Service::where('parent_id', 0)->get());
        });
    }

    public function topMenu() {
        View::composer('layouts.top_menu', function($view) {
            $view->with('pages', \App\Page::where('parent_id', 0)->where('enable', '1')->get());
        });
    }
}