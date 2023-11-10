<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index()
  {
    //
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
    $validated = $request->validate([
      'name' => 'required|max:120',
      'phone' => 'required|numeric|digits:10',
      'email' => 'required|max:120',
      'address' => 'required|max:120',
      'content' => 'required|max:120',
      
    ]);

    $alert = [
      "type" => "success",
      "title" => __("Success"),
      "body" => __("Thank you for your contact, please wait for us to reply to you!")
    ];
    
    try {
      $feedback = new \App\Contact();
      $feedback->name = $request->name;
      $feedback->phone = $request->phone;
      $feedback->email = $request->email;
      $feedback->address = $request->address;
      $feedback->content = $request->content;
      $feedback->save();

      // dd( $feedback);
    }
    catch(\Exception $e){
      dd($e);
      $alert = [
        "type" => "error",
        "title" => __("Error"),
        "body" => __("Something went wrong, please try again later!")
      ];
    }

    return redirect()->back()->with('alert', $alert);
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
}
