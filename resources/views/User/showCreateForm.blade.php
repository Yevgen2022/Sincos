@extends('admin.index')
@section('adminContent')

    <div class="flex items-start justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6 mt-10">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Add User</h2>


            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-4">
                    <label for="user_name" class="block text-sm font-medium text-gray-700">User Name</label>
                    <input type="text" id="user_name" name="name" value="{{ old('name')}}"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="user_password" class="block text-sm font-medium text-gray-700">User Password</label>
                    <input type="text" id="user_password" name=password" value="{{ old('password')}}"
                           placeholder="password is being created automatically"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           disabled>
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="user_email" class="block text-sm font-medium text-gray-700">User email</label>
                    <input type="email" id="user_email" name="email" value="{{ old('email')}}"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="user_job" class="block text-sm font-medium text-gray-700">User job</label>
                    <textarea id="user_job" name="job"
                              class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('job') }}</textarea>
                    @error('job')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="user_role" class="block text-sm font-medium text-gray-700">User role</label>
                    <select id="user_role" name="role_id"
                            class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select a role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Store
                    </button>
                    <a href="{{ route('admin.user') }}"
                       class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>


    {{--    @if(session('success'))--}}
    {{--        <script>--}}
    {{--            alert("{{ session('success') }}");--}}
    {{--        </script>--}}
    {{--    @endif--}}

@endsection
