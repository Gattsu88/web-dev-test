<x-guest-layout>
    <div class="relative py-16 bg-white overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Post</span>
                <h1>
                    <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ $post->title }}</span>
                </h1>
            </div>
            <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                <p>{!! nl2br(e($post->content)) !!}</p>
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <h4>Leave your comment..</h4>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post" data-parsley-validate autocomplete="off">
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
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="post_id" value="{{ $post->id }}" id="post_id">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info float-right" value="Create Comment">
                            </div>
                        </form><br><hr>

                        <h3>All Comments ({{ $post->allApprovedComments->count() }})</h3>
                        @if($post->allApprovedComments->count() > 0)
                            @include('post_replies', ['comments' => $post->parentApprovedComments, 'post_id' => $post->id])
                        @else
                            <h4>No comments for this post.</h4>
                        @endif
                    </div>
                </div><hr>
            </div>
        </div>        
    </div>
</x-guest-layout>