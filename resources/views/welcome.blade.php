@extends('layouts.welcome')

@section('content')
<div class="w-9/12 mx-auto mt-6">

    <div class="border rounded-md overflow-hidden mb-6">
        <img class="lg:h-48 md:h-36 w-full rounded-md object-cover object-center" src="" alt="blog" />
        <div class="p-6">
            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
            <h1 class="text-4xl font-medium text-gray-900 mb-3">Test title</h1>
            <p class="leading-relaxed mb-3 text-lg">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae dicta similique corrupti amet accusantium quo distinctio.</p>
            <div class="flex items-center flex-wrap">
                <a href="#" class="text-indigo-500 bg-gray-200 py-3 px-4 cursor-pointer rounded-lg hover:bg-gray-300 inline-flex items-center md:mb-2 lg:mb-0"
                    >Read More
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="bg-gray-100 px-6 py-3 border-t">
            <h3 class="text-gray-600 text-base">Posted on 12 June, 2021 by <a href="#" class="text-blue-500 hover:text-blue-800 hover:underline">Bootstrap</a></h3>
        </div>
    </div>
</div>

<!-- right column -->
<div class="flex-col w-3/12 space-y-6 mt-6">
    <div class="border rounded-md py-4">
        <h1 class="text-2xl font-medium border-b pl-6 pb-4">Categories</h1>
        <ul class="pt-4 px-6 flex flex-col space-y-2">
            <li>
                <a href="#" class="text-blue-500 hover:text-blue-800 hover:underline">Web Design</a>
            </li>
            <li>
                <a href="#" class="text-blue-500 hover:text-blue-800 hover:underline">Html</a>
            </li>
            <li>
                <a href="#" class="text-blue-500 hover:text-blue-800 hover:underline">Freebies</a>
            </li>
            <li>
                <a href="#" class="text-blue-500 hover:text-blue-800 hover:underline">JavaScript</a>
            </li>
            <li>
                <a href="#" class="text-blue-500 hover:text-blue-800 hover:underline block">Css</a>
            </li>
        </ul>
    </div>
    <div class="border rounded-md py-4">
      <h1 class="text-2xl font-medium border-b pl-6 pb-4">Widget</h1>
      <p class="pt-4 px-6">Lerem ispom dummy text.Lerem ispom dummy text.Lerem ispom dummy text.</p>
    </div>
</div>

@endsection