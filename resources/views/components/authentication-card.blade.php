<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-5 bg-gray-100 dark:bg-gray-500">    
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-1 px-1 py-1 bg-white dark:bg-gray-600 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
