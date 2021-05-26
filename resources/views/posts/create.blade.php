@extends('layouts.app')

@section('content')
<div class="flex w-10/12">
    <x-dashboard-side-links />
    <div class="flex-1">
        <div class="w-full mt-10 sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ isset($post) ? 'Update a post' : 'Create a post' }}
                </header>
                <div class="w-full p-6">
                    <p class="text-gray-700">
                        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($post))
                                @method('PATCH')
                            @endif
                            {{-- Title --}}
                            <div class="my-4">
                                <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                <input class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 @error('name') border-red-500 @enderror"
                                name="title" type="text" id="title" value="{{ isset($post) ? $post->title : '' }}" autocomplete="off">
                                @error('title')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            {{-- Category --}}
                            <div class="mb-4">
                                <label for="category" class="leading-7 text-sm text-gray-600">Category</label>
                                <select name="category_id" id="category" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (isset($post))
                                                @if ($category->id === $post->category_id)
                                                    selected
                                                @endif
                                            @endif
                                            >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            {{-- Post image --}}
                            @if (isset($post))
                                <div>
                                    <img src="/storage/{{ $post->post_image }}" alt="post image">
                                </div>
                            @endif
                            <div class="my-2">
                                <label class="w-40 flex flex-col items-center px-4 py-4 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-blue-200 cursor-pointer">
                                    <span class="text-base text-gray-700 font-bold">
                                        Select a file
                                    </span>
                                    <input type="file" name="post_image" class="hidden">
                                </label>
                                @error('post_image')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            {{-- Body --}}
                            <div class="relative mb-4">
                                <label for="body" class="leading-7 text-sm text-gray-600">Body</label>
                                <textarea id="body" name="body" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6">{{ isset($post) ? $post->body : '' }}</textarea>
                                @error('body')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <button type="submit" class="py-5 px-3 bg-green-500 hover:bg-green-600 text-white rounded-lg focus:outline-none">
                                {{ isset($post) ? 'Update post' : 'Add post' }}
                            </button>
                        </form>
                    </p>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection