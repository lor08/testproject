<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 14.03.17
 * Time: 13:43
 */

namespace App\Http\Controllers;


use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{

	public function getHome()
	{
		$posts = Post::whereStatus(1)->latest()->paginate(10);
		return view('front.home', compact('posts'));
	}

	public function getPost($id)
	{
		$post = Post::whereId($id)->with('comments')->first();
		if ($post){
			return view('front.post', compact('post'));
		}
		return abort(404, "Page not found");
	}

	public function addComment(Post $post, Request $request)
	{
		$errors = array();
		if (!$request->has('author'))
			$errors[] = "Field author not empty";
		if (!$request->has('content'))
			$errors[] = "Field content not empty";

		if (!count($errors)){
			$comment = new Comment($request->all());
			$comment->saveOrFail();

			$comments = $post->comments()->get();
			$postId = $post->id;
			$render = view('front.comments', compact('comments', 'postId'))->render();
			return response()->json(['message' => "OK", 'comments' => $render]);
		} else {
			return response()->json(['message' => "ERROR", 'errors' => implode("<br>", $errors)]);
		}

//		return redirect()->back();
//		dd($comment);
	}

}