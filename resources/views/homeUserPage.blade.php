@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-center items-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900">
            Hello dear {{ Auth::check() ? Auth::user()->name : 'Guest' }}
        </h2>
    </div>
@endsection
