<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 14.03.17
 * Time: 16:09
 */

namespace App\Http\Controllers;


use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class BackendController extends Controller
{
	public function getHome()
	{
		$posts = Post::latest()->paginate(10);
		return view('admin.home', compact('posts'));
	}

	public function getPostForm(Post $post)
	{
		return view('admin.postForm', compact('post'));
	}

	public function createPost()
	{
		$post = new Post();
		return view('admin.postForm', compact('post'));
	}

	public function updatePost(Post $post, Request $request)
	{
		$attribute = $request->all();
		$attribute['status'] = isset($attribute['status']) ? 1 : 0;
		$post->updateOrCreate($attribute);
		return redirect()->route('admin');
	}

	public function deletePost(Post $post)
	{
		$post->comments()->delete();
		$post->delete();
		return redirect()->back();
	}

	public function getComments(Post $post)
	{
		$comments = $post->comments()->get();
		return view('admin.comments', compact('comments', 'post'));
	}

	public function getCommentForm(Comment $comment)
	{
		return view('admin.commentForm', compact('comment'));
	}

	public function updateComment(Comment $comment, Request $request)
	{
		$attribute = $request->all();
		$comment->update($attribute);
		$post = $comment->post()->first();
		if ($post){
			return redirect()->route('adminComments', $post->id);
		} else {
			return redirect()->back();
		}
	}

	public function deleteComment(Comment $comment)
	{
		$comment->delete();
		return redirect()->back();
	}

}