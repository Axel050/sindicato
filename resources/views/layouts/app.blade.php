<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <script>
          document.addEventListener('alpine:init', () => {
          Alpine.data('imageUploader', (initialImage) => ({
            image: initialImage,
            isImageLoaded: !!initialImage,

          

        updateImage(event) {
            this.isImageLoaded = true;
            this.image = URL.createObjectURL(event.target.files[0]);            
        },

        clearImage() {
            this.image = '';
            this.isImageLoaded = false;
            this.$refs.fileInput.value = ''; // Clear the file input value
        }


    }));
});


        </script>

    </head>
    <body class="font-sans antialiased">
        <x-banner />

                <div class="bg-amber-50 flex " x-data="{openSide:true,title:''}"  x-cloak>
            
            <x-side-menu />

             <div class="transition-all duration-500  overflow-y-auto w-full ">
                                     
              <nav  class=" sticky top-0 z-50 ">
                <div class="  w-full h-12 sticky top-0 right-0 z-40 flex items-center border-b-2 border-gray-300 bg-sky-500"  >
                {{-- <div class="  w-full h-12 sticky top-0 right-0 z-40 flex items-center border-b-2 border-gray-300" style="background-color:#0099CC"> --}}
                  <button @click="openSide = ! openSide"  class="h-6-w-6 bg-gray-50 rounded-full p-1 m-2 flex justify-center items-center border border-gray-200" 
                  >

                    {{-- <span :class="openSide? 'lg:hidden block' : 'lg:block hidden'  "  x-cloak> --}}
                    <span :class="openSide? 'block lg:hidden' : 'hidden lg:block'   "  x-cloak>
                      <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </span>
                    {{-- <span :class="openSide? 'lg:block  hidden w-6 h-6 font-bold' : 'lg:hidden  block w-6 h-6'  " x-cloak>X</span> --}}
                    <span :class="openSide?  'hidden  w-6 h-6 lg:block' : 'lg:hidden block  w-6 h-6 font-bold'   " x-cloak>X</span>

                   </button>
                    @if (isset($headerT))
                    <h1  class="lg:text-2xl text-lg lg:ml-8 ml-4  font-semibold text-gray-100">{{$headerT}}</h1>                  
                    @endif
                  
                    <div class="flex justify-end ml-auto mr-4 bg-gray-100">
                      <x-dropdownlog />                      
                    </div>                                  
                  </div>
                                
              </nav>
                            
              <!-- Page Content -->
              <main class="bg-gray-50">                                
                {{ $slot }}
              </main>

            </div>
        </div>

        @stack('modals')
        
        @livewireScripts
        @stack('js')
        
@stack('sc')        
    </body>
</html>
