@extends('layouts.app')

@section('content')
<div class="flex w-10/12">
    <x-dashboard-side-links />
    <div class="flex-1">
        <div class="w-full mt-10 sm:px-6">
        
            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
        
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Dashboard
                </header>
        
                <div class="w-full p-6">
                    <p class="text-gray-700">
                        <h1 class="mb-4">Welcome.</h1>
                        <p>You are logged as <span class="font-semibold italic">{{ auth()->user()->name }}</span></p>
                    </p>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
