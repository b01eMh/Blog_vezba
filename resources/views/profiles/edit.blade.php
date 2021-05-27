@extends('layouts.app')

@section('content')
<div class="flex w-10/12">
    <x-dashboard-side-links />
    <div class="flex-1">
        <div class="w-full mt-10 sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Profile
                </header>
                <div class="w-full flex justify-between space-x-4 p-6">
                    <div class="w-4/12 flex justify-center">
                        <img src="{{ $profile->profilePicture() }}" class="rounded-full object-cover h-48 w-48" alt="profile picture">
                    </div>
                    <div class="flex-1">
                        <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-4">
                                <label class="label">Name</label>
                                <h2 class="leading-8 px-3">{{ $profile->name }}</h2>
                            </div>
                            <div class="mt-4">
                                <label class="label">Email</label>
                                <h2 class="leading-8 px-3">{{ $profile->email }}</h2>
                            </div>
                            <div class="mt-4">
                                <label class="label">Username</label>
                                <input
                                  name="username"
                                  class="w-full bg-white mt-2 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 @error('username') border-red-500 @enderror"
                                  value="{{ old('username') ?? $profile->username }}"
                                  autocomplete="off">
                                @error('username')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label class="label">City</label>
                                <input
                                  name="city"
                                  class="w-full bg-white mt-2 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 @error('city') border-red-500 @enderror"
                                  value="{{ old('city') ?? $profile->city }}"
                                  autocomplete="off">
                                @error('city')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label class="label">Address</label>
                                <input
                                  name="address"
                                  class="w-full bg-white mt-2 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 @error('address') border-red-500 @enderror"
                                  value="{{ old('address') ?? $profile->address }}"
                                  autocomplete="off">
                                @error('address')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label id="gender" class="label">Gender</label>
                                <select 
                                    name="gender" 
                                    class="w-full bg-white rounded border mt-2 py-2 px-3 border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8" name="gender" id="gender">
                                    <option value="">Choose</option>
                                    <option value="male" {{ $profile->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $profile->gender === 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label class="inline-flex items-center text-sm text-gray-700" for="is_admin">
                                    <input type="checkbox" name="is_admin" id="is_admin" class="form-checkbox" value="1" {{ $profile->is_admin ? 'checked' : '' }}>
                                    <span class="ml-2">Admin</span>
                                </label>
                            </div>

                            <div class="mt-4">
                                <label class="w-40 flex flex-col items-center px-4 py-4 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-blue-200 cursor-pointer">
                                    <span class="text-base text-gray-700 font-bold">
                                        Select a picture
                                    </span>
                                    <input type="file" name="profile_pic" class="hidden">
                                </label>
                                @error('profile_pic')
                                    <p class="text-red-500 text-sm italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="py-5 px-6 bg-green-500 hover:bg-green-600 text-white rounded-lg focus:outline-none">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection