@extends('layouts.app')

@section('content')
<div class="w-full mt-10 sm:px-6">
    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
        <header class="flex justify-between items-center font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
            Categories
            <a href="{{ route('categories.create') }}" class="block bg-blue-400 hover:bg-blue-500 px-3 py-2 rounded-lg">Add New</a>
        </header>
        <div class="w-full p-6">
            <table class="table-auto w-full">
                <thead class="border-b text-left">
                    <tr>
                        <th>Name</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="h-10">
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="px-3 py-2 inline-block bg-indigo-400 hover:bg-indigo-500 rounded-md" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 inline-block bg-red-400 text-white hover:bg-red-500 rounded-md">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection