@extends('layouts.welcome')

@section('content')
<div class="w-9/12 mx-auto mt-6">
    <div class="border-b">
        <h1 class="text-5xl font-medium text-gray-900 mb-3">{{ $post->title }}</h1>
        <h3 class="text-xl my-6">By <a href="#" class="text-blue-500 text-xl hover:text-blue-800 hover:underline">{{ $post->user->name }}</a></h3>
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
                    <a href="#" class="text-blue-500 hover:text-blue-800 hover:underline">{{ $category->name }}</a>
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
@endsection
@section('comments')
<div class="container mx-auto mt-8">
    <div class="w-9/12">
        <h2 class="text-gray-900 text-lg mb-4 font-medium title-font">Leave a comment:</h2>
        <div class="relative mb-4">
          <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6"></textarea>
        </div>
        <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
        <!-- comments -->
        <div class="mt-6">
            <h1 class="text-xl font-medium mb-3">Commenter Name</h1>
            <p>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus
            </p>
        </div>
        <div class="my-6">
            <h1 class="text-xl font-medium mb-3">Commenter Name</h1>
            <p>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus
            </p>
        </div>
    </div>
</div>
@endsection