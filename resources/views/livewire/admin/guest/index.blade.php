<div class="flex flex-col bg-gray-50 fullscreen">
    <img src="{{asset('banner.jpg')}}" class="max-w-[1500px] w-full mx-auto">

    @if(auth()->user()->hasRole(['UsuarioPendienteRevision'])  )    
       <h2 class="text-center lg:text-2xl text-lg shadow-xl mt-8 mb-4 bg-white mx-auto lg:px-4 rounded-lg">Hola  <b>{{auth()->user()->name}}</b> una vez que se active su cuenta podra acceder a sus beneficios</h2>
    
    @else
    
    
    <div class=" w-full grid lg:grid-cols-2 grid-cols-1 pb-8">
      <h2 class="text-3xl text-center font-semibold py-2 mt-4 col-span-2 mb-8 text-sky-600 ">Beneficios </h2>
      
      
      <div class=" mx-auto rounded-lg w-3/4  bg-white shadow-md shadow-orange-400 hover:shadow-lg hover:shadow-orange-400 border-l-2 border-orange-400 lg:col-span-1  col-span-2 lg:mb-0 mb-8" >
        <div class="text-center py-4">
          <a href="{{Route('preaprovados')}}">
            <h3 class="text-2xl">{{$cantPre}}</h3>
            <h3 class="text-lg">Prepaprobados</h3>          
          </a>
        </div>
        

      </div>

      <div class=" mx-auto rounded-lg w-3/4  bg-white shadow-md shadow-green-500 hover:shadow-lg hover:shadow-green-500 border-l-2 border-green-500" >
        <div class=" text-center py-4">
          <a href="{{Route('activos')}}">
          <h3 class="text-2xl">{{$beneficiosAfi->count()}}</h3>
          <h3 class="text-lg">Activos</h3>          
          </a>
        </div>

      </div>

      
    @endif

</div>
