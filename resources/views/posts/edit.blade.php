<x-layout>
    <div class="mt-10">
        <x-header>Update Post</x-header>
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:slate-900 rounded-lg">
        <form action="{{route('posts.update', $post)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-10">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                    Title
                </label>
                <input type="text" id="last_name" name="title"  class="
               @error('title') bg-red-50 border border-red-300 @else bg-gray-50 border-gray-300 @enderror
                 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" required />
                  @error('title')
                  <span class="text-red-500 text-sm mt-1">{{$message}}</span>
                  @enderror
            </div>
            <div class="mb-10">
                
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                    Content
                </label>
                <textarea id="message" rows="4" name="content"  class="block p-2.5 w-full text-sm text-gray-900
                 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
                 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Write your thoughts here..." required>
                </textarea>
                @error('title')
                  <div class="text-red-500 text-sm mt-1">{{$message}}</div>
                  @enderror

            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image:</label>
                <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)" 
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 
                              file:rounded-md file:border file:border-gray-300 file:text-sm 
                              file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
            </div>
            <div>
                <img id="imagePreview" src="" alt="Image Preview" class="hidden max-w-xs mt-3 rounded-md shadow-lg">
            </div>
           
            <div class="mb-6 mt-5">
                <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 mt-5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                      Update
                </span>
                </button>
                <!---delete button--->
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 mt-5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                          Delete
                        </span>
                   </button>
                </form>
                </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0]; // Get the selected file
            const preview = document.getElementById('imagePreview'); // Get the preview image element
    
            // Check if a file was selected and it's an image
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader(); // Create a FileReader object
                
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the image source to the file's data URL
                    preview.classList.remove('hidden'); // Show the image preview
                };
                
                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.src = ''; // Clear the preview if not an image
                preview.classList.add('hidden'); // Hide the image preview
            }
        }
    </script>
</x-layout>