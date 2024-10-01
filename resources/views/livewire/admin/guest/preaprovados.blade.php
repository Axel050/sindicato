<div class="flex flex-col bg-gray-50 fullscreen items-center ">    
    
    @if ($method)        
            @livewire('admin.guest.modalpre-aprovado',[ "method" => $method,"id"=>$id,"idbeneficio"=>$idBeneficio])
    @endif


    <div class="flex bg-gray0 flex-wrap gap-2 lg:gap-4 justify-center pt-8 pb-4 w-full relative">

      <x-action-message on="solicitudCreated" class="bg-green-500   border-green-700 absolute left-0 top-0 z-10" >Solicitud creada con exitó.</x-action-message> 
      <x-action-message on="solicitudCancel" class="bg-orange-500   border-orange-700 absolute left-0 top-0 z-10" >Solicitud cancelda con exitó.</x-action-message> 

          @foreach ($beneficios as $ben)
            

          
          @if(!$ben->estadoC($id))
          <div class="flex flex-col  lg:w-[32%] w-[48%] hover:bg-gray-200  relative  shadow-md"
          x-data="{open:true}"   :class="open ? 'h-auto bg-gray-100 min-h-32' : 'h-24 bg-white' "
          
          {{-- style="background-image: url('{{ asset('banner.jpg') }}');
           background-size: cover;
           background-position: center center;
           background-repeat: no-repeat;
           height: 200px;" --}}
           >
                    

            
              <div class="min-h-20 " @click="open=!open">

                <h3 class="text-lg font-semibold px-2 py-1 ">{{$ben->nombre}}</h3 >
                  
                                    
                  <p class="pl-2 pb-1 text-sm text-gray-500 "
                  :class="!open ? '' : 'hidden' ">Verificar requerimientos</p>
                  
                  
                  
                  <span class="font-extrabold text-2xl absolute top-6 right-2":class="open ? 'rotate-90' : '' ">

                    <svg  class="ml-auto mr-2" fill="#000000" height="15px" width="15px" version="1.1" id="XMLID_287_"  viewBox="0 0 24 24" xml:space="preserve" >
                      <g id="next">
                        <g>
                        <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                      </g>
                      </g>
                      </svg>
                  </span>

                    
                  </div>

                    
            <div x-show="open" class="bg-white  pb-4  flex flex-col text-sm flex-grow">

              {{-- @if ($ben->bannerBeneficio)
              <img src="{{ Storage::url($ben->bannerBeneficio) }}" class="h-32 w-fit mx-auto" >
              @endif --}}
                @if ($ben->bannerBeneficio)
              
                <img src="{{ Storage::url($ben->bannerBeneficio) }}" class="h-32 w-fit mx-auto" >
                
                @else
                <div class="h-32 flex bg-red200 items-center justify-center border">
                  <img src="{{ asset('Logosindi.png') }}" class="h-16 w-fit " >
                  <div class="flex flex-col ml-1">

                    <span class="bg-green-20">Beneficio </span>
                    <span class="bg-green-00">sin imagen.</span>
                  </div>
                </div>
                @endif

              
              

              <p class="pl-2 pb-1 text-base text-gray-900  text-center pt-2 font-semibold"
                  :class="! open ? 'hidden' : '' ">
                  Requerimientos</p>
                  <hr class="h-2 text-gray-300 w-3/4 mx-auto">

              

              <ul class="list-disc list-inside  gap-y-2  mb-3 ">                

                  @php
                      $b=0;
                  @endphp

                @foreach ($ben->beneficioCondiciones as $condicion)
                                             
                    @php
                    if ($condicion->estadoCondicionRequerida($id)){
                      $b++;

                    }

                      @endphp
                      
                  
                    
                  <li class=" my-0.5 ml-4 flex justify-between pr-2"> 
                        
                        
                    
                      <span >
                        - {{$condicion->condicionReq->nombreRequerimiento}}  
                      </span>
                      
                      {{-- Verificar si el estado de la condición pertenece al miembro --}}                        

                        @if ($b)                  

                            @if ($condicion->estadoCondicionRequerida($id)?->estado)
                            <span class="text-sm font-semibold text-green-600 self-end place-self-end justify-self-end ">
                              Aprobado    
                            </span>
                            
                            @else
                            <span class="text-sm  text-orange-600 ">
                                Pendiente
                            </span>
                            @endif
                        @endif
                            
                          
                  </li>
                  
                @endforeach
              </ul>
              <hr class="h-2 text-gray-300 w-3/4 mx-auto">
              
                

              
                
                
              @if ($b)                  
              <button class="mx-auto px-6  py-0.5 bg-orange-500 hover:bg-orange-600 text-white rounded-lg justify-self-end self-end place-self-end mt-auto"
              wire:click="solicitud({{$ben->id}},0)">Cancelar solicitud </button>                                  
              @else
              <button class="mx-auto px-6  py-0.5 bg-green-500 hover:bg-green-600 text-white rounded-lg justify-self-end self-end place-self-end mt-auto"
              wire:click="solicitud({{$ben->id}},1)">Solicitar beneficios</button>                                  
              @endif
                                              


              
            </div>


          </div>
          @endif

              
          @endforeach



          
              
            </div>





        </div>
    
    

</div>
