@extends('layouts.app')

@section('content')
<div class="flex w-10/12">
    <x-dashboard-side-links />
    <div class="flex-1">
        <div class="w-full mt-10 sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Comments
                </header>
                <div class="w-full p-6">
                    @if ($comments->count() > 0)
                        <table class="table-auto w-full">
                            <thead class="border-b text-left">
                            <tr>
                                <th>Body</th>
                                <th>Post</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr class="h-10">
                                        <td>{{ $comment->body }}</td>
                                        <td>
                                            <a href="{{ route('posts.show', $comment->post->id) }}"
                                                class="hover:text-blue-500 hover:underline">
                                                View Post
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-2 inline-block bg-red-400 text-white hover:bg-red-500 rounded-md">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1 class="text-center text-gray-700 text-2xl font-semibold">No comments, it will be soon.</h1>
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>
@endsection