<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller {

  public function service($slug) {
    $service = Service::where('slug', $slug)->get();
    if ($service->count()) {
      if ($service[0]->parent_id === 0) {
        $services = Service::where('parent_id', $service[0]->id)->get();
        return view('pages.services', ['service' => $service, 'sub_services' => $services]);
      } else {
        return view('pages.service', compact('service'));
      }
    } else return '404';
  }
}