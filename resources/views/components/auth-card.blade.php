<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 setBackground"
>
        <div class="setOverlay"></div>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="opacity: 1;z-index: 100; background-color: #fff">
        <div class=" flex flex-col sm:justify-center items-center p-6">
            {{ $logo }}
        </div>
        {{ $slot }}
    </div>
</div>
