@extends('layouts.app')

@section('title', 'Create New Forum')

@section('sidebar')
<span></span>
@endsection

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex p-2">
        <div class="flex items-center border py-1 px-3 rounded-2xl space-x-2 hover:bg-gray-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>

            <a href="{{route('home')}}" class="text-themecolor">Home</a>
        </div>
    </div>
    @livewire('forum.create')
</div>
@endsection
