@extends('layouts.app')

@section('content')
<div class="w-full mt-10 sm:px-6">
    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
        <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
            {{ isset($category) ? 'Edit a category' : 'Create a category' }}
        </header>
        <div class="w-full p-6">
            <p class="text-gray-700">
                <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                    @csrf
                    @if (isset($category))
                        @method('PATCH')
                    @endif
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="my-4">
                            <input class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 @error('name') border-red-500 @enderror"
                            name="name" type="text" value="{{ isset($category) ? $category->name : '' }}" autocomplete="off">
                            @error('name')
                                <p class="text-red-500 text-sm italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button type="submit" class="py-5 px-3 bg-green-500 hover:bg-green-600 text-white rounded-lg focus:outline-none">
                            {{ isset($category) ? 'Update category' : 'Add category' }}
                        </button>
                    </div>
                </form>
            </p>
        </div>
    </section>
</div>
@endsection
