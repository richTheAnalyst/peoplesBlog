<x-layout>

    <section class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit About Section</h1>

        @if (session('success'))
            <div class="text-green-500 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('about.update') }}">
            @csrf
            <div class="mb-4">
                <label for="mission" class="block text-sm font-medium text-gray-700">
                    Mission
                </label>
                <input type="text" id="mission" name="mission" value="{{ old('mission', $about->mission) }}" 
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                       border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                       dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                @error('mission')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Description
                </label>
                <textarea id="description" name="description" rows="4" 
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                          border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 
                          dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                          dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ old('description', $about->description) }}
                </textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" 
                    class="text-gray-900 hover:text-white border border-gray-800 hover:bg-cyan-900 
                    focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg 
                    text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 
                    dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 
                    dark:focus:ring-gray-800">
                Save Changes
            </button>
        </form>
    </section>

    @include('components.footer');
</x-layout>