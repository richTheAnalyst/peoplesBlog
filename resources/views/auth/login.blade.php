<x-auth>
    

    <form class="max-w-md mx-auto" method="POST" action="{{ route('login.store')}}">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="floating_email" class="block py-2.5 
            px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
            appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 
            focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_email" class="peer-focus:font-medium absolute 
            text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 
            top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
            peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
            peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Email address
            </label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full
             text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none
              dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
               focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="password" class="peer-focus:font-medium absolute text-sm 
            text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 
            top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4
             peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
             peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
             Password
            </label>
        </div>
        <button type="submit" class=" ml-40  mt-5 inline-flex items-center justify-center px-5 py-3 
        text-base font-medium text-center text-gray-900 border border-gray-300 
        rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700
         dark:hover:bg-gray-700 dark:focus:ring-gray-800">
         Login in
        </button>
      </form>
      
    </x-auth>