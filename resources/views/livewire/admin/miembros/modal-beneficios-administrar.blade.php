   <div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
              <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('administrar',false)"></div>

              
                                   
                      <div  class=" bg-white border w border-gray-500   md:max-w-md  lg:w-1/3 w-[96%] x-auto  z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] overflow-y-auto " >
                          
                                                
                              <div class="bg-white  pb-6 text-gray-500  text-start ">
                                    <div class="flex  flex-col justify-center items-center  ">                             
                                          
                                          
                                          
                                          <h2 class="lg:text-2xl text-xl mb-4  w-full text-center py-1  border-b border-gray-300 text-white bg-green-500"  >                                          
                                              Administrar beneficio 
                                          </h2>                                            

                                          
                                          
                                          <form class="bg-red-80  w-full  flex flex-col items-center gap-2 lg:text-lg  text-base lg:px-4 px-2 text-gray-200  [&>div]:flex [&>div]:justify-center pt-2 "  wire:submit={{$method}} >                                                                                          
                                            
                                          
                                                                                          

                                              <div class="grid grid-cols-2    lg:w-2/3 w-[85%] mx-auto items-center">
                                                <label  class="w-full text-start text-gray-500  text-base ">Beneficio:</label>
                                                    <span class="w-full text-gray-700 text-sm ">{{$beneficio?->nombre}}</span>
                                                
                                              </div>

                                              <div class="grid grid-cols-2    lg:w-2/3 w-[85%] mx-auto items-center">
                                                <label  class="w-full text-start text-gray-500  text-base ">Afiliado:</label>
                                                    <span class="w-full text-gray-700 text-sm ">{{$miembro->name}}</span>
                                                
                                              </div>

                                              <div class="grid grid-cols-2    lg:w-2/3 w-[85%] mx-auto items-center">
                                                <label  class="w-full text-start text-gray-500  text-base ">Cantidad de usos:</label>
                                                    <span class="w-full text-gray-700 text-sm ">{{$beneficio->cantUsos}}</span>
                                                
                                              </div>

                                              <div class="grid grid-cols-2    lg:w-2/3 w-[85%] mx-auto items-center">
                                                <label  class="w-full text-start text-gray-500  text-base ">Usados:</label>
                                                
                                                
                                                    <span class="w-full text-gray-700 text-sm ">{{$beneficio->beneficioUsos->count()}}</span>
                                                
                                              </div>

                                              

                                              <table class="min-w-full divide-y  divide-gray-400   p-1 mt-2">  
                                                  <thead>                                                                                                            
                                                    <tr class="bg-gray-100 relative text-gray-600 font-bold divide-x-2 [&>th]:pl-2 [&>th]:pr-1 [&>th]:lg:pl-4 [&>th]:text-start text-sm ">                                                        
                                                      <th scope="col"  class="py-1">Fecha uso </th>                                      
                                                      <th scope="col" class="">Accion</th>                                                        
                                                    </tr>
                                                  </thead>

                                                  <tbody class="divide-y divide-gray-200 text-gray-500  text-sm">

                                                    
                                                    @foreach ($beneficio->beneficioUsos as $uso)
                                                    <tr class="divide-x-2 [&>td]:pl-2 [&>td]:pr-1 [&>td]:lg:pl-4 [&>td]:text-start font-bold">
                                                    
                                                        <td class="py-1.5" >{{$uso->fecha_uso}}</td>

                                                        <td class="py-1.5 text-white text-xs" >
                                                          <button    
                                                              class=" hover:text-gray-200  hover:bg-red-600 flex items-center py-0.5 bg-red-500 rounded-lg px-1 " wire:click="delete({{$uso->id}})">
                                                                <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                                              
                                              

                                                 @error('error')
                                                    <div class="text-red-500 text-xs">
                                                        {{ $message }}
                                                    </div>
                                                  @enderror
                                  
                                              

                                                <div class="flex gap-6 justify-center lg:text-base text-sm"> 
                                                  
                                                  <button  type="button" class="bg-orange-600 hover:bg-orange-700 mt-4 rounded-lg px-2 lg:py-1 py-0.5 "
                                                   wire:click="$parent.$set('administrar',false)">                                
                                                    Salir
                                                  </button >
                                                  
                                                  
                                                  <button class="bg-green-600 hover:bg-green-700 mt-4 rounded-lg px-4 lg:py-1 py-0.5 flex text-center items-center "
                                                  wire:click="save">                                                                                                      
                                                  Usar
                                                        
                                                </button >                        



                                                

                                                </div>
                                            </form>                                          
                                            

                                                                            </div>            
                              </div>

                        </div>
                                                        
  </div>