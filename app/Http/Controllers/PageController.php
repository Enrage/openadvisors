<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;

class PageController extends Controller {
    public function index($slug) {
        $page = Page::where('slug', $slug)->get();
        if ($page->count()) {
            $services_list = [];
            if ($page[0]->slug == 'services') {
                $services_list = Service::select('id', 'title', 'slug')->where('parent_id', '!=', '0')->get();
            }
            return view('pages.page', compact('page', 'services_list'));
        } else return '404';
    }
}
