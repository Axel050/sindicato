<div class="flex flex-col bg-gray-50 fullscreen">
    {{-- <img src="{{asset('banner.jpg')}}" class="max-w-[1500px] w-full mx-auto"> --}}


        {{-- <div class="flex bg-red-100 flex-wrap gap-2 lg:gap-4 "> --}}
              <div class="flex bg-gra-100 flex-wrap gap-2 lg:gap-4 justify-center pt-8 pb-4 w-full relative">
            
          @foreach ($beneficios as $ben)

          <div class="flex flex-col  lg:w-[31%] w-[48%] hover:bg-gray-200  relative  shadow-md"
           x-data="{open:true}"  @click="open=!open"
          :class="open ? 'h-auto bg-gray-100' : 'h-20 bg-white' ">

            <h3 class="text-lg font-semibold p-2">{{$ben->beneficio->nombre}}</h3 >
              
            <p class="pl-2 pb-1">Pin nro: {{sprintf("%05d", $ben->id)}}</p>

              {{-- <span class="font-extrabold text-2xl absolute top-6 right-2":class="open ? 'rotate-90' : '' "> --}}

            <span class="font-extrabold text-2xl absolute top-6 right-2"
            :class="open ? 'rotate-90' : '' ">
          <svg  class="ml-auto mr-2" fill="#000000" height="15px" width="15px" version="1.1" id="XMLID_287_"  viewBox="0 0 24 24" xml:space="preserve" 
        {{-- :class="{ 'rotate-90': open }"  --}}
        >
          <g id="next">
            <g>
              <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
            </g>
          </g>
        </svg>
                    </span>

            <div x-show="open" class="bg-white  pb-4  flex flex-col flex-grow ">

              @if ($ben->beneficio->bannerBeneficio)
              
                <img src="{{ Storage::url($ben->beneficio->bannerBeneficio) }}" class="h-32 w-fit mx-auto" >
                
                @else
                <div class="h-32 flex bg-red200 items-center justify-center border">
                  <img src="{{ asset('Logosindi.png') }}" class="h-16 w-fit " >
                  <div class="flex flex-col ml-1">

                    <span class="bg-green-20">Beneficio </span>
                    <span class="bg-green-00">sin imagen.</span>
                  </div>
                </div>

                
              @endif
              
              <div class="flex   mt-auto p-3">

              

                <div class="flex  flex-col w-1/2 borer text-sm [&>div]:border-b [&>div]:border-gray-100 p-2">

                  <div class="flex ">
                    <label class="w-[85px]">Nombre:</label> <span class="font-semibold">{{$ben->afiliado->name}}</span> 
                  </div>

                  <div class="flex">
                    <label class="w-[85px]">Numero:</label> <span class="font-semibold">{{$ben->afiliado->id}}</span> 
                  </div>

                  <div class="flex ">
                    <label class="w-[85px] ">Documento:</label> <span class="font-semibold">{{$ben->afiliado->documento}}</span> 
                  </div>

                  <div class="flex">
                    <label class="w-[85px]">Empresa:</label> <span class="font-semibold">Empresa nombre</span> 
                  </div>

                  <div class="flex">
                    <label class="w-[85px]">Ingreso:</label> <span class="font-semibold">{{date('Y-m-d', strtotime($ben->afiliado->fechaAfiliacion))}}</span> 
                  </div>

                  <div class="flex">
                    <label class="w-[85px]">Cant usos:</label> <span class="font-semibold">{{$ben->beneficio->cantUsos}}</span> 
                  </div>

                  <div class="flex">
                    <label class="w-[85px]">Usados:</label> <span class="font-semibold">{{$ben->beneficio->beneficioUsos->count()}}</span> 
                  </div>

                  

                                  
                </div>

                <div class="flex justify-center items-center w-1/2 mx-auto">
                                    
                  @if ($ben->beneficio->cantUsos <= $ben->beneficio->beneficioUsos->count() )              
                      <p class="h-28 w-28 font-extrablod text-2xl border p-8 text-center align-middle bg-gray-100 flex items-center justify-center">No disponible</p>
                  @else
                  <a href="{{Route('miembro-beneficios', ['id' => $ben->afiliado, 'idB' => $ben->beneficio->id])}}" >
                  <p class="h-28 w-28 font-extrablod text-2xl border p-8 text-center align-middle bg-gray-100 flex items-center justify-center">QR</p>
                  </a>
                  @endif
                </div>
              
            </div>
            </div>
            </div>

              
          @endforeach



          
              
            </div>





        </div>
    
    

</div>
