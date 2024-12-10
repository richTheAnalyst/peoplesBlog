<x-layout>
    <div class="mt-20">
         <section class="bg-white dark:bg-slate-800 rounded-lg">
            <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-12">
                <a href="{{ route('posts.index') }}" class="inline-flex items-center justify-between px-1 py-1 pr-4 text-sm text-gray-700 bg-gray-100 rounded-full mb-7 dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">
                    <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span class="text-sm font-medium">check out the latest news</span>
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </a>
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-6xl dark:text-white">THE PEOPLES BLOG</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Here at the PEOPLES_BLOG we give individuals the opportunity to share their findings,
                     get help from other findings and making them free to achive and socialize
                </p>
                <div class="flex flex-col mb-8 space-y-4 lg:mb-16 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Learn more
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                        Watch intro video
                    </a>
                </div>
            </div>
        </section>

        <section class="mt-20 ">
            <div class="Content w-full max-w-[1216px] mx-auto relative px-4 sm:px-6 md:px-8 lg:px-0 ">
                @if ($latestPost)
                <img class="Image w-full h-auto sm:h-[400px] md:h-[500px] lg:h-[600px] object-cover rounded-xl" src="{{ asset('storage/' . $latestPost->image)}}" />
                  @endif          
              <div class="Content bg-neutral-200 dark:bg-gray-800 w-full max-w-md sm:max-w-[500px] p-6 sm:p-8 md:p-10 top-[300px] left-4 md:left-[64px] lg:top-[360px] absolute rounded-xl shadow border border-[#242535] flex flex-col gap-6">
                
                <!-- Heading section -->
                <div>
                    <div class="Heading flex flex-col gap-4">
                    <div class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                      <div class="Text text-black dark:text-white text-sm font-medium leading-tight">
                        <a href="{{ route('posts.show', $latestPost) }}">
                            READ POST
                        </a>
                    </div>
                    </div>
                    <div class="Title text-white text-2xl sm:text-3xl md:text-4xl font-semibold leading-tight">
                      @if($latestPost)
                        <div class="text-black dark:text-white">{{ $latestPost->title }}</div>
                      @else
                        Post title
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="ShortInfo flex items-center gap-4">
                    @if(isset($user))
                        <a href="{{ route('users.profile', ['id' => $user->id]) }}">
                            <div class="AAuthor flex items-center gap-3">
                                <img class="Image w-8 h-8 sm:w-9 sm:h-9 rounded-full" src="{{ asset('storage/' . $user->image) }}" alt="Dp"/>
                                <div class="Author text-[#97989f] text-sm sm:text-base font-medium text-black dark:text-white">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </div>
                            </div>
                        </a>
                    @endif
                  <div class="Date text-[#97989f] text-sm sm:text-base font-normal">
                    @if($latestPost)
                        <div class="text-black dark:text-white">{{ $latestPost->created_at->format('Y/M/d') }}</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
        </section>

        <!---post section--->
        <section class="mt-80">
            <div class="Content w-full max-w-[1216px] mx-auto relative px-4 sm:px-6 md:px-8 lg:px-0">
              <div class="max-w-4xl mx-auto p-5 bg-neutral-200 rounded-lg shadow-md dark:bg-gray-800 m-5">
                    <h1 class="text-black dark:text-white text-2xl font-bold p-2">
                        Latest posts
                    </h1>
                    @if($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="transition-all border border-gray-200 hover:border-blue-900 rounded-lg  p-10 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }} image" class="w-full h-48 object-cover mb-4 rounded-lg">
                                @endif
                                <a href="{{ route('posts.show', $post) }}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($post->content, 100) }}</p>
                                <div class="text-sm text-gray-500">
                                    Posted on {{ $post->created_at->format('Y/M/d') }}
                                </div>
                            </div>
                        @endforeach
                        
                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No posts available.</p>
                    @endif
                </div>
            </div>
        </section>

        <!---footer--->
        @include('components.footer')
    </div>
</x-layout>