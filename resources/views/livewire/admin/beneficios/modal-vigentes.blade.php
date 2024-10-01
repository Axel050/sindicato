   <div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
              <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('method',false)"></div>

              
                                   
                      <div  class=" bg-white border w border-gray-500   lg:max-w-2xl  lg:w-ft w-[96%] x-auto  z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] overflow-y-auto " >
                          
                                                
                              <div class="bg-white  pb-6 text-gray-500  text-start ">
                                    <div class="flex  flex-col justify-center items-center  ">                             
                                          
                                          
                                          
                                          <h2 class="lg:text-2xl text-xl mb-4  w-full text-center py-1  border-b border-gray-300 text-white"  style="{{$bg}}">
                                          
                                              {{$title}} solicitud 
                                          </h2>                                            

                                          
                                          
                                          <div class="bg-red-80  w-full  flex flex-col gap-2 lg:text-lg  text-base lg:px-8 px-2 text-gray-200 pt-4 ">                                                                                          
                                            
                                          
                                            @if ($method =="delete")

                                                <p class="text-center text-gray-600 lg:px-10 px-6">Esta seguro de eliminar la solicitud  al beneficio </p>
                                                <p class="text-center text-gray-600"><strong >"{{$nombre}}" </strong>?</p>
                                              @else


                                                
                                                  <table class="min-w-full divide-y  divide-gray-500   p-1 border bg-gray-50">  
                                                  <thead>
                                                
                                                      <tr class="bg-gray-200 relative text-gray-600 font-bold divide-x-2  divide-gray-300 text-sm ">
                                                        <th scope="col" class="py-1">Beneficio</th>
                                                        <th>Requeriento</th>
                                                        <th>Estado</th>
                                                        <th>Accion</th>                                                      
                                                    </tr>
                                                  </thead>
                                                  
                                                        <tbody class="divide-y divide-gray-200 text-gray-500  text-sm">

                                                    @foreach ($beneficios as $ben)
                                                    <tr class="divide-x-2 ">
                                                        
                                                        <td class=" pl-2 py-1">{{$ben->beneficio->nombre}} </td>                                                      
                                                        
                                                        <td class="pl-2">{{$ben->requerimiento->nombreRequerimiento}}</td>

                                                        <td  class="text-white text-xs px-2 text-center">
                                                          @if ($ben->estado)
                                                            <span class="bg-green-500 px-1 py-0.5 rounded-md">Aprobado</span>
                                                          @else
                                                            <span class="bg-red-300 px-1 py-0.5 rounded-md">Pendiente</span>
                                                          @endif
                                                       </td>                                                        

                                                       <td class="text-center px-2" >
                                                        <button type="button" wire:click="change({{$ben->id}})" 
                                                          class="bg-blue-500 hover:bg-blue-600 rounded-lg px-1 py-0.5 text-xs text-white">
                                                          Cambiar
                                                        </button>
                                                      </td>
                                                      </tr>
                                                      @endforeach

                                                    
                                                  </tbody>

                                                </table>

                                              

                                                                                                                                                                              
                                                @endif

                                                <div class="flex gap-6 justify-center lg:text-base text-sm"> 
                                                  
                                                  <button  type="button" class="bg-red-600 hover:bg-red-700 mt-4 rounded-lg px-4 lg:py-1 py-0.5 "
                                                   wire:click="$parent.$set('method',false)">                                
                                                    Salir
                                                  </button >

                                                  @if ($method == "delete")
                                                  <button  type="button" class="bg-green-600 hover:bg-green-700 mt-4 rounded-lg px-4 lg:py-1 py-0.5 "
                                                   wire:click="delete"> 
                                                    Eliminar
                                                  </button >

                                                  @endif
                                                  
                                                  
                                                 



                                                

                                                </div>
                                            </div>                                          
                                            

                                                                            </div>            
                              </div>

                        </div>
                                                        
  </div>