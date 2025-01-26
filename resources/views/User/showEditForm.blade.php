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
                    <input type="text" id="user_name" name="name" value="{{ old('name',$user->name)}}"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>




                <div class="mb-4">
                    <label for="change_password" class="inline-flex items-center">
                        <input type="checkbox" id="change_password" name="change_password" class="mr-2">
                        <span class="text-sm font-medium text-gray-700">Змінити пароль</span>
                    </label>
                </div>

                <div class="mb-4" id="password_field" style="display: none;">
                    <label for="user_password" class="block text-sm font-medium text-gray-700">New User Password</label>
                    <input type="password" id="user_password" name="password" value="{{ old('password') }}"
                           placeholder="Введіть новий пароль" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>





{{--                <div class="mb-4">--}}
{{--                    <label for="user_password" class="block text-sm font-medium text-gray-700">User Password</label>--}}
{{--                    <input type="text" id="user_password" name=password" value="{{ old('password',$user->password)}}"--}}
{{--                           placeholder="password is being created automatically"--}}
{{--                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"--}}
{{--                           disabled>--}}
{{--                    @error('password')--}}
{{--                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}









                <div class="mb-4">
                    <label for="user_email" class="block text-sm font-medium text-gray-700">User email</label>
                    <input type="email" id="user_email" name="email" value="{{ old('email',$user->email)}}"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="user_job" class="block text-sm font-medium text-gray-700">User job</label>
                    <textarea id="user_job" name="job"
                              class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('job',$user->job) }}</textarea>
                    @error('job')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="user_role" class="block text-sm font-medium text-gray-700">User role</label>
                    <input type="text" id="user_role" name="role" value="{{ old('role',$user->role)}}"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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


    @section('scripts')
        <script>
            // Отримуємо елементи
            const changePasswordCheckbox = document.getElementById('change_password');
            const passwordField = document.getElementById('password_field');

            // Функція для управління відображенням поля пароля
            changePasswordCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    passwordField.style.display = 'block'; // Покажемо поле пароля
                } else {
                    passwordField.style.display = 'none'; // Сховаємо поле пароля
                }
            });
        </script>
    @endsection

@endsection
