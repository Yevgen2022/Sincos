@extends('layouts.app')

@section('content')

    <div>
        @include('partials.Admin.adminNav')
        <main class="py-10 lg:ml-72">
            <div class="px-4 sm:px-6 lg:px-8">
                @yield('adminContent')
            </div>
        </main>
    </div>
@endsection