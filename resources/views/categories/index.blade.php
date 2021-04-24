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
                                <button onclick="showModal({{ $category->id }})" class="px-3 py-2 inline-block bg-red-400 text-white hover:bg-red-500 rounded-md">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
@section('modal')
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
@endsection
@section('scripts')
    <script>
        const modalBg = document.getElementById('modal-bg');
        const cancelBtn = document.getElementById('cancel-btn');
        const deleteForm = document.getElementById('delete-form');
        function showModal(id){
            deleteForm.action = '/categories/' + id;
            modalBg.classList.remove('hidden');
            cancelBtn.addEventListener('click', () => modalBg.classList.add('hidden'));
        }
    </script>
@endsection