@foreach($comments as $comment)
    <div @if($comment->parent_id != null) style="margin-left:40px;" @endif class="parent">
        <p><strong>{{ $comment->name }}</strong>, {{ $comment->created_at->diffForHumans() }}
            <button type="button" class="btn btn-warning float-right replyButton" data-commentId="{{ $comment->id }}">Reply</button><br><br>
        {{ $comment->text }}</p>        
        <form method="post" action="{{ route('post.reply.store', $post->id) }}" class="replyForm" id="{{ $comment->id }}" data-parsley-validate autocomplete="off">
            @csrf
            <x-honeypot />

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name.." required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email.." required>
            </div>
            <div class="form-group">
                <label for="text">Description:</label>
                <textarea rows="5" class="form-control" name="text" id="text" placeholder="Enter your comment.." required></textarea>
            </div>
            <input type="hidden" name="post_id" id="post_id" value="{{ $post_id }}">
            <input type="hidden" name="comment_id" id="comment_id" value="{{ $comment->id }}">
            <div class="form-group">
                <button type="submit" class="btn btn-info float-right">Submit</button>
                <button type="cancel" class="btn btn-danger btn-sm float-right cancelButton">Close</button>                
            </div>
        </form><hr>
        @include('post_replies', ['comments' => $comment->replies])
    </div>
@endforeach