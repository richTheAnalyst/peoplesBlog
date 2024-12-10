<x-auth>
    <div>
        <!---author section--->
        <section class="mt-10">
            <div class="flex justify-center items-center min-h-screen bg-gray-100 p-6 -mt-20 -mb-60 dark:bg-gray-800 dark:text-gray-300">
                <div class="items-center gap-0 dark:bg-slate-700 p-2 w-full -mt-80 -mb-80 rounded-lg shadow-lg max-w-lg text-center">
                    <div class="AAuthor flex flex-col items-center gap-4">
                       
                        <img class="Image w-24 h-24 sm:w-32 sm:h-32 rounded-full shadow-md" 
                            src="{{ $author->image ? asset('storage/' . $author->image) : asset('images/default-author.png') }}" 
                            alt="Author Image" />
                        <div class="Author text-white-700 text-lg sm:text-xl font-semibold">
                            {{ $author->first_name }} {{ $author->last_name }}
                        </div>
                        <p class="text-white-600 text-sm sm:text-base font-light max-w-xs">{{ $author->bio }}</p>
                        <div class="Email text-blue-600 text-sm sm:text-base font-medium">
                            <a href="mailto:{{ $author->email }}">Mail me</a>
                            <h4>Contact: {{ $author->contact }}</h4>
                        </div>
                    </div>
                    <div class="Date text-white-500 text-xs sm:text-sm font-normal">
                        {{ $author->created_at->format('F d, Y') }}  <!-- Display the author's creation date -->
                    </div>
                </div>
            </div>
        </section>
    
        <section class="mt-60">
            <div class="Content w-full max-w-[1216px] mx-auto relative px-4 sm:px-6 md:px-8 lg:px-0">
                <h1 class="text-white text-2xl font-semibold">
                    Latest posts
                </h1>
    
                @if($posts->isEmpty())
                    <p class="text-white">No posts available yet</p>
                @else
                    <div class="max-w-4xl mx-auto p-5 bg-white rounded-lg shadow-md dark:bg-gray-800 m-5">
                        @foreach ($posts as $post)
                            <div class="p-10 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }} image" class="w-full h-48 object-cover mb-4 rounded-lg">
                                @endif
                                <a href="{{ route('posts.show', $post) }}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($post->content, 100) }}</p>
                            </div>
                        @endforeach
                        <a href="{{ route('posts.index') }}" class="inline-flex items-center mt-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </section>
    </div>
    <!---footer--->
    @include('components.footer')
</x-auth>
