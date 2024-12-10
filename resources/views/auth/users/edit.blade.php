<x-auth>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-300">
        <h2 class="text-2xl font-semibold text-center mb-6">Update User Profile</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:ring-blue-500">
                @error('first_name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:ring-blue-500">
                @error('last_name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:ring-blue-500">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
                <textarea name="bio" required
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:ring-blue-500">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact</label>
                <input type="text" name="contact" value="{{ old('contact', $user->contact) }}" required
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:ring-blue-500">
                @error('contact')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profile Image</label>
                <input type="file" name="image"
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:ring-blue-500">
                @error('image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="w-full mt-6 px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-500">
                Update User
            </button>
        </form>
    </div>
</x-auth>
