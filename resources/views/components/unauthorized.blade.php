<x-guest-layout >

  <div class="bg-gray-800 h-screen flex flex-col justify-center items-center"  >
            
    
    <img src="{{asset('logosindiN.png')}}" class="w-52  h-52 " >
    <h1 class="text-2xl font-bold mx-auto mt-8 text-gray-200">¡Acceso no autorizado!</h1>
    <a href="{{Route("dashboard")}}" class="text-gray-700 bg-gray-50 rounded-lg px-4 py-1 mt-12">Inicio</a>
  </div>
                        
                

</x-guest-layout>