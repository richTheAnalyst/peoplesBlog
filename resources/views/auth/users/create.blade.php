<x-auth>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl dark:text-white font-semibold text-center mb-10">
            ADD BLOGGER
        </h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">
                    First Name
                </label>
                <input type="text" id="first_name" name="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 
                bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('first_name') }}">
                @error('first_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 
                bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('last_name') }}">
                @error('last_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 
                bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password Field --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 
                bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Confirm Password Field --}}
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 
                bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea id="bio" name="bio"  class="block p-2.5 w-full text-sm text-gray-900
                bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
                focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="4">{{ old('bio') }}</textarea>
                @error('bio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input type="text" id="contact" name="contact" class="block py-2.5 px-0 w-full text-sm text-gray-900 
                bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('contact') }}">
                @error('contact')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Admin Role Option 
            <div class="mb-4">
                <label for="is_admin" class="block text-sm font-medium text-gray-700">Admin</label>
                <input type="checkbox" id="is_admin" name="is_admin" class="mt-1" {{ old('is_admin') ? 'checked' : '' }}>
                <span class="text-sm text-gray-500">Check if the user should have admin privileges</span>
                @error('is_admin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>--}}

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="inline-flex items-center mt-5 px-6 py-3 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Save User
            </button>
        </form>
    </div>
</x-auth>
