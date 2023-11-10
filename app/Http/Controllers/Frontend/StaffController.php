<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class StaffController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search', false);
    $staffs = \App\Customer::where('status', 'ACTIVE')->orderBy('created_at', 'ASC')->get();
  
    $pageMeta = [
      'title' => 'Danh sách luật sư',
    ];

    return view('frontend.staffs.index', compact('staffs', 'pageMeta'));
  }

  public function show($slug)
  {
    $staffs = \App\Customer::where('status', 'ACTIVE')->orderBy('created_at', 'ASC')->get();
    $staff = \App\Customer::where('slug', $slug)->where('status', 'ACTIVE')->first();
    // dd($staff);
    $pageMeta = [
      'title' => $staff->seo_title == '' ? $staff->title : $staff->seo_title,
      'meta_description' => $staff->desc,
    ];

    return view('frontend.staffs.show', compact('staff','staffs', 'pageMeta'));
  }
}
