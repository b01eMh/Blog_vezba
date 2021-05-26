@extends('layouts.app')

@section('content')
<div class="container mx-auto flex justify-center space-x-4">
    <div class="w-9/12 mx-auto mt-6">
        @foreach ($posts as $post)
            <div class="border rounded-md overflow-hidden mb-6">
                <img class="lg:h-48 md:h-36 w-full rounded-md object-cover object-center" src="{{ $post->showImage($post->post_image) }}" alt="blog" />
                <div class="p-6">
                    <h1 class="text-4xl font-medium text-gray-900 mb-3">{{ $post->title }}</h1>
                    <h2 class="tracking-widest text-sm title-font font-medium text-gray-400 my-2">Category: {{ $post->category->name }}</h2>
                    <p class="leading-relaxed my-6 text-lg">{{ Str::limit($post->body, '50', ' ...') }}</p>
                    <div class="flex items-center flex-wrap">
                        <a href="{{ route('posts.show', $post->id) }}" 
                            class="text-indigo-500 bg-gray-200 py-3 px-4 cursor-pointer rounded-lg hover:bg-gray-300 inline-flex items-center md:mb-2 lg:mb-0"
                            >Read More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="bg-gray-100 px-6 py-3 border-t">
                    <h3 class="text-gray-600 text-base">Posted on {{ $post->created_at }} by 
                        <span class="font-medium text-lg">
                            {{ $post->user->name }}
                        </span>
                    </h3>
                </div>
            </div>
        @endforeach
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
@section('footer')
    <footer class="bg-blue-900 h-32 flex justify-center items-center mt-4">
        <p class="text-gray-100 sm:text-left">© 2021 All Rights Reserved</p>
    </footer>
@endsection