<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index()
  {
    $banners = \App\Banner::where('status', 'ACTIVE')->limit(3)->get();
    $customers = \App\Customer::where('status', 'ACTIVE')->limit(6)->get();
    $services = \App\Service::where('status', 'ACTIVE')->orderBy('created_at', 'ASC')->limit(8)->get();
    $about = \TCG\Voyager\Models\Page::where('status', 'ACTIVE')->where('slug', 'about')->first();
    $contact_form = \TCG\Voyager\Models\Page::where('status', 'ACTIVE')->where('slug', 'lien-he-tu-van')->first();
    $posts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->where('category_id', '3')->limit(6)->orderBy('created_at', 'DESC')->get();
   
    return view('frontend.homepage.index', compact('posts','banners','about','customers','services', 'contact_form'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }

  /**
   * return redirect to contact blade.
   */
  public function contact()
  {
    return view('frontend.contact.index');
  }
}
