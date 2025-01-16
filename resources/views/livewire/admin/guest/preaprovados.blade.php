<div class="flex flex-col bg-gray-50 fullscreen items-center "> 
    
    @if ($method)        
            @livewire('admin.guest.modal-preaprovado',[ "method" => $method,"id"=>$id,"idbeneficio"=>$idBeneficio])
    @endif

    <div class="flex bg-gray0 flex-wrap gap-2 lg:gap-4 justify-center pt-8 pb-4 w-full relative">

      

      {{-- @dump($beneficios->toArray()) --}}

          @foreach ($beneficios as $ben)
            

              @php
                          $noDisponible = $ben->estadoPendiente($id);
                          $shadow = $noDisponible ? "shadow-orange-500" : "shadow-green-500";
                @endphp
              
              {{-- @dump($ben->toArray()) --}}
              {{-- @dump(!$ben->estadoCBC($id)) --}}

              {{-- @if(!$ben->estadoCBC($id)) --}}
              @if($ben->pre($id))
              
              <div class="flex flex-col  lg:w-[32%] w-[48%] hover:bg-gray-200  relative cursor-pointer  shadow-md {{$shadow}}"
              x-data="{open:false}"   :class="open ? 'h-auto bg-gray-100 min-h-32' : 'h-24 bg-white' ">
                
                  <div class="min-h-20 " @click="open=!open">

                      <h3 class="text-lg font-semibold px-2 py-1 ">{{$ben->nombre}}</h3 >
                                                              
                      <p class="pl-2 pb-1 text-sm text-gray-500 " :class="!open ? '' : 'hidden' ">Verificar requerimientos</p>
                                                                  
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

                        
                <div x-show="open" class="bg-white  pb-4  flex flex-col text-sm flex-grow cursor-auto">
                  
                    @if ($ben->bannerBeneficio)
                  
                    <img src="{{ Storage::url($ben->bannerBeneficio) }}" class="h-32 w-fit mx-auto" >
                    
                    @else
                    <div class="h-32 flex bg-red200 items-center justify-center ">
                      <img src="{{ asset('logosindi.png') }}" class="h-24 w-fit " >                  
                    </div>
                    @endif

                    <div class="text-sm flex flex-col p-2">
                  
                        @if($ben->descripcion)
                            <h4 class="font-semibold m-1 mb-0">Descripcion :</h4>
                            <p  class="ml-2">{{$ben->descripcion}} </p>                      
                          @endif
                    
                    </div>

                                 
                    <p class="pl-2 pb-1 text-base text-gray-900  text-center pt-2 font-semibold" :class="! open ? 'hidden' : '' ">
                          Requerimientos
                      </p>
                      <hr class="h-2 text-gray-300 w-3/4 mx-auto">
                  
                  <ul class="list-disc list-inside  gap-y-2  mb-3 ">                
                        {{-- <x-action-message on="condicionReqUpdated" class="bg-orange-500  border-orange-700 absolut left-0 z-10" >Requeremiento actualizado con exitó.</x-action-message>                                         --}}
                      @php
                          $b=0;
                      @endphp

                      @foreach ($ben->beneficioCondiciones as  $key => $condicion)
                       
                                                  
                            @php
                                if ($condicion->estadoCondicionRequerida($id)?->estado == 1){
                                  $b++;
                                }
                            @endphp


                            {{-- @dump($condicion->estadoCondicionRequerida($id)->toArray()) --}}


                          <li class=" my-0.5 ml-4 flex justify-between pr-2"> 
                              <span >
                                - {{$condicion->condicionReq->nombreRequerimiento}} 
                              </span>
                              
                                @php
                                
                                    $m='';
                                    if ($condicion->condicionReq->nombreRequerimiento != "Datos actualizados"){                                      
                                      // $m="'methodReqPerfil',".$id;                                                                                     
                                    // }                                        
                                    // else{                                            
                                      $i=$condicion->estadoCondicionRequerida($id)?->id ?? "'x'"  ;
                                        // $m="'methodReq',".$condicion->estadoCondicionRequerida($id)?->id ;                                                                                      
                                        $m="'methodReq',".$i;                 
                                      
                                        }

                                 
                                @endphp


                                    @if ($condicion->estadoCondicionRequerida($id)?->estado == "1")
                                    
                                        
                                          @if ($condicion->condicionReq->nombreRequerimiento == "Datos actualizados")
                                              <button class="text-sm  text-green-600  border border-white hover:text-green-700 hover:border-green-700 rounded-lg px-1 flex" wire:click="$set({{$m}})">                                                                                
                                          @else
                                              <button class="text-sm  text-green-600  border border-white hover:text-green-700 hover:border-green-700 rounded-lg px-1 flex" >
                                            @endif
                                        
                                        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" >
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#23cf2f"/>
                                        </svg>                                        
                                          Aprobado
                                      </button>
                                        
                                    </button> 
                                      @elseif($condicion->estadoCondicionRequerida($id)?->estado == "2")
                                      
                                            @if ($condicion->condicionReq->nombreRequerimiento == "Datos actualizados")
                                              <button class="text-sm  text-orange-600  border border-white hover:text-orange-700 hover:border-orange-700 rounded-lg px-1 flex" wire:click="datos({{$id}},{{$condicion->idBeneficio}},{{$condicion->idCondicion}})">
                                          @else
                                              <button class="text-sm  text-orange-600  border border-white hover:text-orange-700 hover:border-orange-700 rounded-lg px-1 flex" wire:click="$set('methodReq',{{$i}})">
                                            @endif
                                                                                                    
                                        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" class="bg-orage-600">
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#ea580c"/>
                                        </svg>
                                          Pendiente
                                      </button>                                      
                                      @else


                                      {{-- <button class="text-sm  text-red-600  border border-white hover:text-red-700 hover:border-red-700 rounded-lg px-1 flex" wire:click="$set({{$m}})"> --}}

                                            @if ($condicion->condicionReq->nombreRequerimiento == "Datos actualizados")
                                              <button class="text-sm  text-red-600  border border-white hover:text-red-700 hover:border-red-700 rounded-lg px-1 flex" wire:click="datos({{$id}},{{$condicion->idBeneficio}},{{$condicion->idCondicion}})">                                                                                
                                          @else
                                              <button class="text-sm  text-red-600  border border-white hover:text-red-700 hover:border-red-700 rounded-lg px-1 flex" wire:click="$set('methodReq',{{$i}})">
                                            @endif

                                        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" class="bg-orage-600">
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#e00934"/>
                                        </svg>                                        
                                          Incompleto
                                      </button>
                                    @endif
                                {{-- @endif --}}
                                                                  
                          </li>

                          {{-- condicionReqUpdated --}}
                          @if ($methodReq)                                  
                            @livewire('admin.guest.requerimientos-modal',[ "method" => "update","id"=>$methodReq], key('methodReq-' . $key))
                          @endif

                          @if ($methodReqPerfil)                                  
                            @livewire('admin.guest.requerimientos-modal-user',
                                            [ "id"=>$idUse, "iduse"=>$idUse, "idben"=>$idBen, "idcon"=>$idCon ],
                                            key('methodReqPerfil-' . $idBen))
                          @endif

                        
                      @endforeach
                        
                   </ul>
                  <hr class="h-2 text-gray-300 w-3/4 mx-auto">                   
                    {{-- @dump([
                      "b" => $b,
                      "benccondi" => $ben->beneficioCondiciones->count(),
                    ]) --}}
                  @if ($b == $ben->beneficioCondiciones->count()) 
                  <button class="mx-auto px-6  py-0.5 bg-green-500 hover:bg-green-600 text-white rounded-lg justify-self-end self-end place-self-end mt-auto"
                  wire:click="solicitud({{$ben->id}},1)">Activar beneficio</button>                                  
                  @else
                  <p  class="mx-auto px-6  py-0.5 bg-orange-500  text-white rounded-lg justify-self-end self-end place-self-end mt-auto">
                    Requerimientos incompletos</p >
                  @endif
                  
                </div>

              </div>
              @endif
              
          @endforeach

    </div>
</div>
