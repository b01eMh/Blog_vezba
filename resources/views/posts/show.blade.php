@extends('layouts.app')

@section('content')
<div class="container mx-auto flex justify-center space-x-4">
    <div class="w-9/12 mx-auto mt-6">
        <div class="border-b">
            <h1 class="text-5xl font-medium text-gray-900 mb-3">{{ $post->title }}</h1>
            <h3 class="text-xl my-6">By 
                <span class="font-medium text-gray-700 text-2xl">
                    {{ $post->user->name }}
                </span>
            </h3>
        </div>
        <div class="border-b text-gray-900 mb-8 py-6">
            <h3 class="text-gray-600 italic font-semibold">Posted on {{ $post->created_at->diffForHumans() }} </h3>
        </div>
        <div class="border-b">
            <img class="lg:h-48 md:h-36 w-full rounded-md object-cover object-center" src="{{ $post->showImage($post->post_image) }}" alt="blog picture" />
            <p class="leading-relaxed my-4">{{ $post->body }}</p>
        </div>
    </div>
    <!-- right column -->
    <div class="flex-col w-3/12 space-y-6 mt-6">
        @if ($categories->count() > 0)
        <div class="border rounded-md py-4">
            <h1 class="text-2xl font-medium border-b pl-6 pb-4">Categories</h1>
            <ul class="pt-4 px-6 flex flex-col space-y-2">
                @foreach ($categories as $category)
                    <li>
                        <a href="/category/{{ $category->id }}" class="text-blue-500 hover:text-blue-800 hover:underline">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="border rounded-md py-4">
            <h1 class="text-2xl font-medium border-b pl-6 pb-4">Widget</h1>
            <p class="pt-4 px-6">Lerem ispom dummy text.Lerem ispom dummy text.Lerem ispom dummy text.</p>
        </div>
    </div>
</div>
@endsection
@section('comments')
<div class="container mx-auto mt-8">
    <div class="w-9/12">
        <h2 class="text-gray-900 text-lg mb-4 font-medium title-font">Leave a comment:</h2>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="relative mb-4">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea
                name="body"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6"></textarea>
                @error('body')
                    <p class="text-red-500 text-sm italic mt-4">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-indigo-500 mb-3 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
        </form>
        <!-- comments -->
        @if ($comments->count() > 0)
            @foreach ($comments as $comment)
                <div class="my-3">
                    <h1 class="text-2xl font-medium mb-3">{{ $comment->author }} <span class="text-base text-gray-500">{{ $comment->created_at->diffForHumans() }}</span></h1>
                    <p>{{ $comment->body }}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
@section('footer')
    <footer class="bg-blue-900 h-32 flex justify-center items-center">
        <p class="text-gray-100 sm:text-left">© 2021 All Rights Reserved</p>
    </footer>
@endsection