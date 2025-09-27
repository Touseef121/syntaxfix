@extends('layouts.app')

@section('title', "Settings")

@section('sidebar')
<span></span>
@endsection

@section('content')
<div>
    <div class="max-w-4xl mx-auto">

        <!-- Back Button -->
        <a href="{{route('user.profile',Auth::user()->id)}}" class="inline-flex items-center gap-2 mb-4 py-2 px-3 border border-[1px] border-themecolor text-sm font-medium rounded-md bg-transparent hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-ring">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Back to profile
        </a>

        <h1 class="text-3xl font-bold text-themecolor mb-5">Settings</h1>

        @livewire('forum.user.user-setting', ['id' => $id])

    </div>
</div>
@endsection
