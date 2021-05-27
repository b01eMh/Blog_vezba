@extends('layouts.app')

@section('content')
<div class="flex w-10/12">
    <x-dashboard-side-links />
    <div class="flex-1">
        <div class="w-full mt-10 sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
                <header class="flex justify-between items-center font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h1>Profile</h1>
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="block bg-blue-400 hover:bg-blue-500 px-3 py-2 rounded-lg">Edit profile</a>
                </header>
                <div class="w-full flex justify-between space-x-4 p-6">
                    <div class="w-4/12 flex justify-center">
                        <img src="{{ $profile->profilePicture() }}" class="rounded-full object-cover h-48 w-48" alt="profile picture">
                    </div>
                    <div class="flex-1">
                        <div class="mt-4">
                            <label class="label text-cool-gray-500 font-medium text-lg">Name:</label>
                            <h2 class="text-gray-800 font-semibold text-lg mt-2">{{ $profile->name }}</h2>
                        </div>
                        <div class="mt-4">
                            <label class="label text-cool-gray-500 font-medium text-lg">Email:</label>
                            <h2 class="text-gray-800 font-semibold text-lg mt-2">{{ $profile->email }}</h2>
                        </div>
                        <div class="mt-4">
                            <label class="label text-cool-gray-500 font-medium text-lg">User name:</label>
                            <h2 class="text-gray-800 font-semibold text-lg mt-2">{{ $profile->username }}</h2>
                        </div>
                        <div class="mt-4">
                            <label class="label text-cool-gray-500 font-medium text-lg">City:</label>
                            <h2 class="text-gray-800 font-semibold text-lg mt-2">{{ $profile->city }}</h2>
                        </div>
                        <div class="mt-4">
                            <label class="label text-cool-gray-500 font-medium text-lg">Address:</label>
                            <h2 class="text-gray-800 font-semibold text-lg mt-2">{{ $profile->address }}</h2>
                        </div>
                        <div class="mt-4">
                            <label class="label text-cool-gray-600 font-medium text-lg">Gender:</label>
                            <h2 class="text-gray-800 font-semibold text-lg mt-2">{{ $profile->gender }}</h2>
                        </div>
                        <div class="mt-4">
                            <label class="label text-cool-gray-600 font-medium text-lg">Admin</label>
                            <h2 class="text-gray-800 font-semibold text-lg mt-2">
                                {{ $profile->is_admin ? 'Yes' : 'No' }}
                            </h2>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection