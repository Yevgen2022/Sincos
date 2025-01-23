@extends('layouts.app')

@section('content')

    <div>
        @include('partials.Admin.adminNav')
        <main class="py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                @yield('adminContent')
            </div>
        </main>
    </div>
@endsection