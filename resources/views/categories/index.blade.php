@extends('layouts.app')

@section('content')
<div class="flex w-10/12">
    <x-dashboard-side-links />
    <div class="flex-1">
        <div class="w-full mt-10 sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
                <header class="flex justify-between items-center font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Categories
                    @if (auth()->user()->isAdmin())
                        <a onclick="createModal()" class="block cursor-pointer bg-blue-400 hover:bg-blue-500 px-3 py-2 rounded-lg">Add New</a>
                    @endif
                </header>
                <div class="w-full p-6">
                    @if ($categories->count() > 0)
                        <table class="table-auto w-full">
                            <thead class="border-b text-left">
                                <tr>
                                    <th>Name</th>
                                    <th>Posts count</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="h-10">
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->posts->count() }}</td>
                                        @if (auth()->user()->isAdmin())
                                            <td>
                                                <a class="px-3 py-2 inline-block bg-indigo-400 hover:bg-indigo-500 hover:text-white rounded-md" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                            </td>
                                            <td>
                                                <button onclick="deleteModal({{ $category->id }})" class="px-3 py-2 inline-block text-white bg-red-400 hover:bg-red-500 rounded-md">Delete</button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                    <h1 class="text-center text-gray-700 text-2xl font-semibold">No categories, it will be soon.</h1>
                    @endif
                    
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@section('modal')
    <!-- delete modal -->
    <div id="modal-bg" class="fixed top-0 left-0 w-full h-screen bg-gray-700 bg-opacity-50 p-4 flex items-center hidden">
        <div class="bg-red-50 p-4 rounded flex items-start text-red-600 my-4 shadow-lg max-w-xl mx-auto">
            <div class="px-3">
                <h3 class="text-red-800 font-semibold tracking-wider">
                    Delete 
                </h3>
                <p class="py-4 text-red-700">
                    Are you sure you want to delete this category ?
                </p>
                <div class="flex space-x-6">
                    <form id="delete-form" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-900 font-semibold tracking-wider hover:underline focus:outline-none">Yes, delete</button>
                    </form>
                    <button id="cancel-btn" class="text-red-900 font-semibold tracking-wider hover:underline focus:outline-none">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- create modal -->
    <div id="modal-create" class="fixed top-0 left-0 w-full h-screen bg-gray-700 bg-opacity-50 p-4 flex items-center hidden">
        <div class="bg-red-50 p-4 rounded flex items-start text-red-600 my-4 shadow-lg max-w-xl mx-auto">
            <div class="px-3">
                <h3 class="text-green-800 text-2xl font-semibold tracking-wider">
                    Create 
                </h3>
                <p class="py-4 text-green-700">
                    Are you sure you want create this category ?
                </p>
                <div class="flex space-x-6">
                    <form id="create-form" action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="my-4">
                            <label id="name" class="label text-green-700">Name</label>
                            <input class="w-full bg-white mt-2 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 @error('name') border-green-500 @enderror"
                            name="name" id="name" type="text" value="" autocomplete="off">
                            @error('name')
                                <p class="text-green-500 text-sm italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button type="submit" class="py-5 px-3 bg-green-500 hover:bg-green-600 text-white rounded-lg focus:outline-none">
                            Add Category
                        </button> 
                        <button id="cancel-btn2" class="py-5 px-3 bg-red-500 hover:bg-red-600 text-white rounded-lg focus:outline-none">Cancel</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    const modalBg = document.getElementById('modal-bg');
    const cancelBtn = document.getElementById('cancel-btn');
    const deleteForm = document.getElementById('delete-form');

    const cancelBtn2 = document.getElementById('cancel-btn2');
    const modalCreate = document.getElementById('modal-create');
    const createForm = document.getElementById('create-form');

    function deleteModal(id){
        deleteForm.action = '/categories/' + id;
        modalBg.classList.remove('hidden');
        cancelBtn.addEventListener('click', () => modalBg.classList.add('hidden'));
    }
    
    function createModal(){
        modalCreate.classList.remove('hidden');
        cancelBtn2.addEventListener('click', () => modalCreate.classList.add('hidden'));
    }

</script>
@endsection