<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Http\Requests\CommentFormRequest;
use App\Models\News;
use App\Models\Comment;

class NewsController extends Controller
{
    public function comment(CommentFormRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->comments()->save(new Comment([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text
        ]));

        return redirect()->route('comment.show', ['id' => $id]);
    }

    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(PostFormRequest $request, $id = null)
    {
        auth()->user()->news()->updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'content' => $request->content,
            ]
        );

        return redirect()->route('news.index')->with('success', 'New Article Created!');
    }

    public function edit($id)
    {
        $article = News::findOrFail($id);

        return view('news.create', compact('article'));
    }

    public function destroy($id)
    {
        News::destroy($id);

        return redirect()->route('news.index')->with('success', 'Article Deleted!');
    }
}
