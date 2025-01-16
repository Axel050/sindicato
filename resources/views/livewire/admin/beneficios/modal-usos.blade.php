<div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
      <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('listado',false)"></div>
                                                 
      <div  class=" bg-white border w border-gray-500   md:ma-w-[1000px]  lg:w-fit w-[96%]   z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] " >
                                                                    
            <div class="flex  flex-col justify-center items-center h-full ">
                                      
                <h2 class="text-xl mb-0  w-full text-center py-1  border-b border-cyan-700 text-white bg-cyan-600 px-1"   >
                    Listado usos <b>"{{$beneficio->nombre}}"</b>
                </h2>  

                <div class="flex flex-col max-w-[1200px] mx-auto w-full  pb-4  mb-0  lg:p-4 p-2  rounded-lg overflow-y-auto max-h-[85vh] bg-gray-50 " >
                                                                                                                
                <div class="flex mx-auto gap-x-8 mb-4">
                  <label>Desde <input type="date" wire:model.live="desde" class="rounded-lg h-6 text-sm px-1"></label>
                  <label>Hasta <input type="date" wire:model.live="hasta" class="rounded-lg h-6 text-sm px-1"></label>
                </div>
                {{-- @dump($usos->toArray()) --}}

                @if (count($usos))
                    <h3 class="text-center">Usos: {{$cant}}</h3>
                @endif
                
                 <table class="min-w-full divide-y  divide-gray-400   p-1 mb-4">  
                          <thead>
                            <tr class="bg-gray-100 relative text-gray-600 font-bold divide-x-2 [&>th]:pl-2 [&>th]:pr-1 [&>th]:lg:pl-4 [&>th]:text-start text-sm ">                                
                              <th scope="col" class="py-1">Nombre</th>                              
                              <th scope="col" >Apellido</th>                              
                              <th scope="col" >Email</th>
                              <th scope="col" >Telefono</th>                              
                              <th scope="col" >Dni</th>                              
                              <th scope="col" >Empresa</th>                              
                              <th scope="col" >Fecha uso</th>                              
                              <th scope="col" >Acción</th>                              
                               
                              </tr>
                          </thead>

                          <tbody class="divide-y divide-gray-200 text-gray-500  text-sm">
                            @foreach ($usos as $uso)                                
                            <tr>
                                  <td class="px-2 py-1">{{$uso->miembro?->name}}</td>                            
                                  <td class="px-2">{{$uso->miembro?->apellido}}</td>                            
                                  <td class="px-2">{{$uso->miembro?->email}}</td>                            
                                  <td class="px-2">{{$uso->miembro?->telefono}}</td>                            
                                  <td class="px-2">{{$uso->miembro?->documento}}</td>                            
                                  <td class="px-2">{{$uso->miembro?->empresa?->nombreEmpresa}}</td>                            
                                  <td class="px-2">{{$uso->fecha_uso}}</td>                                                                    
                                  <td class="px-2">                                    
                                    <button   title="Eliminar" type="button"
                                      class=" hover:text-gray-200  hover:bg-red-600 flex items-center py-0.5 bg-red-500 rounded-lg px-1 text-white text-xs" wire:click="del({{$uso->id}})">
                                        <svg width="20px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                                        </svg> 
                                      <span class="hidden lg:block">Eliminar</span>
                                  </button>
                                </td>                                                                    
                            </tr>
                            @endforeach
                          </tbody>
                 </table>




                  <div class="flex justify-center gap-x-12 mt-4">                     
                      <button type="button" wire:click="$parent.$set('listado',false)"                      
                          class="px-6 py-1.5 bg-red-500 text-white w-fit  rounded-lg hover:bg-red-600">Salir  
                      </button >                  
                  </div>
                  
                </div>                                          
                
            </div>            

       </div>


</div>
