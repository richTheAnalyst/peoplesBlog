<x-layout>
    <div class="max-w-3xl mx-auto p-10 bg-white rounded-lg shadow-md dark:bg-gray-900 mt-20">
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg mb-4">
        @endif
    
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-4">
            {{ $post->title }}
        </h1>
        
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg">
            {{ $post->content }}
        </p>

        @auth
         <!---edit button--->
        <a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Edit
        </a>
        <!---delete button--->
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" onclick="return confirm('Are you sure you want to delete this post?')">
                Delete
            </button>
        </form>
        @endauth
 
    </div>
    <div class="mt-20">
        @include( 'components.footer')
    </div>
    
</x-layout>
