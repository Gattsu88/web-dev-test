<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Comments
        </h2>
        <?php /*<a href="{{ route('comment.create') }}" class="ml-3 font-semibold inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Add Comment
        </a>*/ ?>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!count($comments))
            <p class="text-center font-bold text-3xl">No comment found!</p>
            @else
            <div class="bg-white mb-8 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Comment By
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Text
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($comments as $comment)
                                        <tr class="{{ $loop->iteration % 2 ? 'bg-white' : 'bg-gray-50' }}">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $comment->name }}<br>
                                                {{ $comment->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ \Illuminate\Support\Str::limit($comment->text ?? '',90,' ...') }}
                                            </td>
                                            <td>
                                            @if($comment->status == 0)
                                                <span class="px-6 py-3 bg-blue-50 text-left text-xs font-bold text-gray-500 uppercase">Pending</span>
                                                @elseif($comment->status == 1)
                                                <span class="px-6 py-3 bg-green-50 text-left text-xs font-bold text-gray-500 uppercase">Approved</span>
                                                @else
                                                <span class="px-6 py-3 bg-red-50 text-left text-xs font-bold text-gray-500 uppercase">Rejected</span>
                                            @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('comment.edit', $comment->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form class="inline-block" action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="ml-4 text-indigo-600 hover:text-indigo-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ $comments->links() }}
            @endif
        </div>
    </div>
</x-app-layout>