<x-layout>

    <!----about data--->
<section class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">About PEOPLES_BLOG</h1>
        
        <div class="max-w-4xl mx-auto space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Our Mission</h2>
                <p class="text-gray-700 dark:text-gray-300">
                    PEOPLES_BLOG is a platform dedicated to sharing diverse perspectives, 
                    inspiring stories, and connecting writers from all walks of life as 
                    enabling them so market thier products for people to view, buy and sell.
                </p>
            </div>
    
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Who We Are</h2>
                <p class="text-gray-700 dark:text-gray-300">
                    Founded with a passion for storytelling, PEOPLES_BLOG provides a space 
                    for individuals to express their thoughts, experiences as well as making affiliate market
                     easy and accessible to everyone.
                </p>
            </div>
</section>


    




<!--contact submission form--> 
<form class="max-w-sm mx-auto" method="POST" action="{{ route('contact.store') }}">
    @csrf
    <h4 class="font-bold text-center p-4 text-2xl">
        Contact Us
    </h4>
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
        <label for="contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
        <input type="text" id="contact" name="contact" class="block py-2.5 px-0 w-full text-sm text-gray-900 
        bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('contact') }}">
        @error('contact')
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

    <div class="mb-4">
        <label for="bio" class="block text-sm font-medium text-gray-700">Your Agender</label>
        <textarea id="bio" name="bio"  class="block p-2.5 w-full text-sm text-gray-900
        bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
        focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="4">{{ old('bio') }}</textarea>
        @error('bio')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="text-gray-900 hover:text-white 
    border border-gray-800 hover:bg-cyan-900 focus:ring-4 focus:outline-none 
    focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
     me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 
     dark:focus:ring-gray-800">
        Submit
    </button>
   
</form>
  
    @include('components.footer')
</x-layout>