<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::latest('id')->paginate(10);

        return view('comments.index', compact('comments'));
    }

    /*public function create()
    {
        return view('comments.create');
    }

    public function store(CommentFormRequest $request)
    {
        $comment = new Comment;
        $message = "Comment added successfully!";

        if($request->isMethod('post')) {

            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->text = $request->text;
            $comment->save();
        }

        return redirect()->route('comment.index')->with('success', $message);
    }*/

    /*public function replyStore(Request $request)
    {
        $reply = new Comment;
        $reply->name = $request->name;
        $reply->email = $request->email;
        $reply->text = $request->text;
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }*/

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    public function update(CommentFormRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $message = "Comment updated successfully!";

        $data = $request->all();
        $comment->status = $data['status'];        
        $comment->moderated_by = $data['moderated_by'];

        $comment->update($data);

        // SEND EMAIL TO COMMENT OWNER AFTER ITS STATUS CHANGE TO APPROVED
        if($comment->status == 1) {
            $email = $request->email;
            $messageData = [
                'name' => $request->name,
                'email' => $request->email,
                'text' => $request->text
            ];

            Mail::send('emails.comment_owner', $messageData, function($message) use($email) {
                $message->to($email)->subject('Thanks for Your comment!');
            });
        }

        // SEND EMAIL TO COMMENT OWNER AFTER ITS COMMENT REPLY STATUS CHANGE TO APPROVED
        if($comment->status == 1 && $comment->parent_id != null) {
            $parentCommentName = $comment->parent->name;
            $parentCommentEmail = $comment->parent->email;
            $parentCommentText = $comment->parent->text;
            $messageData = [
                'parentCommentName' => $parentCommentName,
                'parentCommentEmail' => $parentCommentEmail,
                'parentCommentText' => $parentCommentText,
                'name' => $request->name,
                'email' => $request->email,
                'text' => $request->text
            ];

            Mail::send('emails.parent_comment_owner', $messageData, function($message) use($parentCommentEmail) {
                $message->to($parentCommentEmail)->subject('You have new reply on Your comment!');
            });
        }

        // SEND EMAIL TO POST/ARTICLE OWNER AFTER ITS COMMENT STATUS CHANGE TO APPROVED
        if($comment->status == 1) {
            $authorName = $comment->commentable->author->name;
            $authorEmail = $comment->commentable->author->email;
            $messageData = [
                'authorName' => $authorName,
                'authorEmail' => $authorEmail,
                'name' => $request->name,
                'email' => $request->email,
                'text' => $request->text
            ];

            Mail::send('emails.to_author', $messageData, function($message) use($authorEmail) {
                $message->to($authorEmail)->subject('You have new comment on Your post!');
            });
        }

        return redirect()->route('comment.index')->with('success', $message);
    }

    public function destroy($id)
    {
        Comment::destroy($id);

        return redirect()->route('comment.index')->with('success', 'Comment Deleted successfully!');
    }
}
