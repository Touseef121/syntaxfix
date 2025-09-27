@extends('layouts.app')

@section('title', 'User Profile')

@section('sidebar')
<span></span>
@endsection

@section('content')
<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-2">

        <a href="{{route('home')}}" class="inline-flex items-center gap-2 mb-4 py-2 px-3 border border-[1px] border-themecolor text-sm font-medium rounded-md bg-transparent hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-ring">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Home
        </a>

        {{-- Profile Card Container --}}
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

            @livewire('forum.user.user-profile', ['id' => $id])
            
        </div>
    </div>
</div>
@endsection
