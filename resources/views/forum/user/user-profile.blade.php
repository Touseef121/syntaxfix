@extends('layouts.app')

@section('title', 'User Profile')

@section('sidebar')
<span></span>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                @livewire('forum.user.user-profile',['id' => $id])
        </div>
    </div>
</div>
@endsection
