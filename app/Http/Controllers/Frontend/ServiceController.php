<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class ServiceController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search', false);
    $services = \App\Service::where('status', 'ACTIVE')->orderBy('created_at', 'ASC')->paginate(9);

    if ($search) {
      $services = $services->where('title', 'like', '%'.$search.'%');
    }

    $pageMeta = [
      'title' => 'Dịch vụ pháp luật',
    ];

    return view('frontend.services.index', compact('services', 'pageMeta'));
  }

  public function show($slug)
  {
    $services = \App\Service::where('status', 'ACTIVE')->orderBy('created_at', 'ASC')->limit(9)->get();
    $service = \App\Service::where('slug', $slug)->first();
    $posts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->where('category_id', '3')->limit(3)->orderBy('created_at', 'DESC')->get();

    $pageMeta = [
      'title' => $service->seo_title == '' ? $service->title : $service->seo_title,
      'meta_description' => $service->desc,
    ];

    return view('frontend.services.show', compact('service','services', 'posts', 'pageMeta'));
  }
}
