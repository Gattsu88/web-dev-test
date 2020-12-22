<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Models\News;
use App\Models\Post;
use App\Models\Comment;
use Session;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function home()
    {
        $posts = Post::with(['comments' => function($query) {            
            $query->where('status', 1); // ONLY APPROVED COMMENTS
        }])->latest('id')->take(4)->get();

        $news = News::with(['comments' => function($query) {            
            $query->where('status', 1); // ONLY APPROVED COMMENTS
        }])->latest('id')->take(4)->get();

        return view('home', compact('posts', 'news'));
    }

    public function posts()
    {
        $posts = Post::with(['comments' => function($query) {
            $query->where('status', 1); // ONLY APPROVED COMMENTS
        }])->latest('id')->paginate(6);

        return view('posts', compact('posts'));
    }

    public function news()
    {
        $news = News::with(['comments' => function($query) {
            $query->where('status', 1); // ONLY APPROVED COMMENTS
        }])->latest('id')->paginate(6);

        return view('news', compact('news'));
    }

    public function postShow($id)
    {   
        $post = Post::findOrFail($id);

        return view('post', compact('post'));
    }

    public function newsShow($id)
    {
        $article = News::findOrFail($id);        

        return view('article', compact('article'));
    }

    // CREATE NEW COMMENT ON POST
    public function postCommentCreate(CommentFormRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->comments()->save(new Comment([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text
        ]));

        Session::flash('success', 'Success! Your comment is awaiting approval!');
        return redirect()->route('post.show', ['id' => $id]);
    }

    // CREATE NEW COMMENT REPLY ON POST
    public function postCommentReplyCreate(CommentFormRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->comments()->save(new Comment([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'parent_id' => $request->comment_id
        ]));
        
        Session::flash('success', 'Success! Your comment is awaiting approval!');
        return redirect()->route('post.show', ['id' => $id]);
    }

    // CREATE NEW COMMENT ON NEWS
    public function newsCommentCreate(CommentFormRequest $request, $id)
    {
        $article = News::findOrFail($id);
        $article->comments()->save(new Comment([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text
        ]));

        Session::flash('success', 'Success! Your comment is awaiting approval!');
        return redirect()->route('news.show', ['id' => $id]);
    }

    // CREATE NEW COMMENT REPLY ON NEWS
    public function newsCommentReplyCreate(CommentFormRequest $request, $id)
    {
        $article = News::findOrFail($id);
        $article->comments()->save(new Comment([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'parent_id' => $request->comment_id
        ]));

        Session::flash('success', 'Success! Your comment is awaiting approval!');
        return redirect()->route('news.show', ['id' => $id]);
    }
}