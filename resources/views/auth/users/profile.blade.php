<!-- resources/views/user/profile.blade.php -->
<x-auth>
    <div class="container mx-auto p-6 max-w-3xl bg-white shadow-lg rounded-xl dark:bg-gray-800 dark:shadow-gray-900 transition-colors duration-300">
        <div class="flex items-center space-x-6 mb-6">
            <!-- Profile Picture -->
            <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200 dark:bg-gray-700">
                <img src="{{ asset('storage/' . $user->image) }}" 
                     alt="Profile image" 
                     class="w-full h-full object-cover">
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                    {{ $user->first_name }} {{ $user->last_name }}
                </h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm">{{ $user->email }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <!-- First Name -->
            <div class="border-b border-gray-200 pb-4 dark:border-gray-700">
                <h2 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">First Name</h2>
                <p class="text-lg font-medium text-gray-800 dark:text-gray-100 mt-1">{{ $user->first_name }}</p>
            </div>

            <!-- Last Name -->
            <div class="border-b border-gray-200 pb-4 dark:border-gray-700">
                <h2 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Last Name</h2>
                <p class="text-lg font-medium text-gray-800 dark:text-gray-100 mt-1">{{ $user->last_name }}</p>
            </div>

            <!-- Email -->
            <div class="border-b border-gray-200 pb-4 dark:border-gray-700">
                <h2 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Email</h2>
                <p class="text-lg font-medium text-gray-800 dark:text-gray-100 mt-1">{{ $user->email }}</p>
            </div>

            <!-- Bio -->
            <div class="border-b border-gray-200 pb-4 dark:border-gray-700 col-span-2">
                <h2 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Bio</h2>
                <p class="text-lg font-medium text-gray-800 dark:text-gray-100 mt-1">{{ $user->bio }}</p>
            </div>
        </div>
        @auth
         <div class="flex items-center space-x-20 mt-5">
            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 mt-5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                  <a href="{{ route('users.edit', ['id' => $user->id ?? 1])}}">Edit profile</a>
                </span>
           </button>
           <!--delete form-->
           <form action="{{ route('users.delete', $user->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this profile. Profile deleted cannot be recovered')" >
            @csrf
            @method('DELETE')
               <button type="submit" class="relative inline-flex items-center justify-center
                p-0.5 mb-2 me-2 mt-5 overflow-hidden 
                text-sm font-medium text-gray-900 
                rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 
                group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white 
                dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                   <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Delete Profile
                   </span>
              </button>
           </form>
         </div>
         @endauth
    </div>

    <!---post section--->
    <section class="mt-20">
        <div class="Content w-full max-w-[1216px] mx-auto relative px-4 sm:px-6 md:px-8 lg:px-0">
            <h1 class="text-black dark:text-white text-2xl font-semibold">
                Latest posts
            </h1>
            <div class="max-w-4xl mx-auto p-5 bg-neutral-200 rounded-lg shadow-md dark:bg-gray-800 m-5">
                @if($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="transition-all border border-gray-200 hover:border-cyan-400 rounded-lg  p-10 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
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
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    <a href="{{ route('posts.index') }}">
                        more
                    </a>
                    </span>
                    </button>
                    @auth
                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                           <a href="{{ route('posts.create') }}">
                            Create Blog
                           </a>
                        </span>
                    </button>
                    @endauth
                    
            </div>
        </div>
    </section>

    
    <!-- Footer -->
    <div class="mt-20">
        @include('components.footer')
    </div>
</x-auth>
