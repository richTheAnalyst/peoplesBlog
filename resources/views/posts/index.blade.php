<x-layout>
    <div class="mt-2 p-10 ">
    <x-header>BLOG</x-header>
   </div>
    <section>
        @auth
        <div  class="items-center justify-between">
            <a href="{{ route('posts.create') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
            font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 
            dark:focus:ring-blue-800"> 
            Create
        </a>
        </div>
        @endauth
    </section>

    <!---posts header--->
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
                    <a href="{{ route('posts.show', $latestPost) }}">READ POST</a>
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

        <!--all posts--->
    <div class="mt-80 mb-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="image post" class="w-full h-48 object-cover mb-4 rounded-lg">
                    @endif
                    <!---profile info--->
                <div class="ShortInfo flex items-center gap-4">
                    @if($post->user)
                        <a href="{{ route('users.profile', ['id' =>  $post->user->id]) }}">
                            <div class="AAuthor flex items-center gap-3">
                                <img class="Image w-8 h-8 sm:w-9 sm:h-9 rounded-full" src="{{ asset('storage/' . $post->user->image) }}" alt="Dp"/>
                                <div class="Author text-[#97989f] text-sm sm:text-base font-medium text-black dark:text-white">
                                    {{ $post->user->first_name }} {{ $post->user->last_name }}
                                </div>
                            </div>
                        </a>
                    @endif
                  <div class="Date text-[#97989f] text-sm sm:text-base font-normal">
                    @if($post)
                        <div class="text-black dark:text-white">{{ $post->created_at->format('Y/M/d') }}</div>
                    @endif
                  </div>
                </div>
                <!---end of profile info--->
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit( $post->content, 100) }}</p>
                    <a href="{{ route('posts.show', $post) }}">
                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Read Post
                            </span>
                            </button>
                    </a>

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
            @endforeach
        </div>
    </div>
    @include('components.footer')
</x-layout>

    
