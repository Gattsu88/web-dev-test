<?php /*<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Comment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('comment.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                                <div class="sm:col-span-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        Name
                                    </label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="text" id="name" name="name" value="{{ old('name') ?? $comment->name ?? '' }}" class="{{ $errors->has('name') ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} block w-full pr-10 focus:outline-none sm:text-sm rounded-md">
                                        @error('name')
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        @enderror
                                    </div>
                                    @error('name')
                                    <p class="mt-2 text-sm text-red-600" id="name-error">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        Email
                                    </label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="text" id="email" name="email" value="{{ old('email') ?? $comment->email ?? '' }}" class="{{ $errors->has('email') ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} block w-full pr-10 focus:outline-none sm:text-sm rounded-md">
                                        @error('email')
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        @enderror
                                    </div>
                                    @error('email')
                                    <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        Comment Status
                                    </label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <select name="status" id="status" class="block w-full pr-10 focus:outline-none sm:text-sm rounded-md" style="width: 25%;">
                                            <option value="" checked>Choose:</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="text" class="block text-sm font-medium text-gray-700">
                                        Text
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="text" name="text" rows="10" class="{{ $errors->has('text') ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} shadow-sm block w-full sm:text-sm border-gray-300 rounded-md">{{ old('text') ?? $comment->text ?? '' }}</textarea>
                                    </div>
                                    @error('text')
                                    <p class="mt-2 text-sm text-red-600" id="text-error">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end">
                                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
*/ ?>