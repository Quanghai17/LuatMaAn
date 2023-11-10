<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class PostController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search', false);
    $posts = \TCG\Voyager\Models\Post::orderBy('created_at', 'desc')->where('status', 'PUBLISHED')->paginate(12);

    if ($search) {
      $offers = $posts->where('title', 'like', '%' . $search . '%');
    }

    $pageMeta = [
      'title' => 'Bài viết - Tin tức',
    ];

    return view('frontend.posts.index', compact('posts', 'pageMeta'));
  }

  public function show($id)
  {
    $post = \TCG\Voyager\Models\Post::where('slug', $id)->first();
    $posts = \TCG\Voyager\Models\Post::orderBy('created_at', 'desc')->where('status', 'PUBLISHED')->paginate(3);
    $categories = \TCG\Voyager\Models\Category::get();
    $pageMeta = [
      'title' => $post->seo_title == '' ? $post->title : $post->seo_title,
      'meta_description' => $post->meta_description,
      'image' => $post->image
    ];

    return view('frontend.posts.show', compact('post', 'posts', 'pageMeta', 'categories'));
  }

  public function PostByCategory($slug)
  {
    $category = \TCG\Voyager\Models\Category::where('slug', $slug)->first();
    if ($category == null) {
      return redirect()->route('index');
    }
    $posts = \TCG\Voyager\Models\Post::where('category_id', $category->id)->where('status', 'published')->latest()->paginate(12);

    $pageMeta = [
      'title' => $category->name,
      'meta_description' => $category->name,
      'image' => setting('site.logo'),
    ];
    $title = $category->name;
    return view('frontend.posts.index', compact('posts', 'pageMeta', 'title'));
  }

  public function search(Request $request)
  {
    $key_form = $request->key;
    $key = str_replace(' ', '%', $key_form);
    $posts = \TCG\Voyager\Models\Post::where('title', 'LIKE', '%' . $key . '%')->paginate(6);
    return view('frontend.posts.index', [
      'posts' => $posts,

    ]);
  }
}
