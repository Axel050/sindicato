   <div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
          <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('method',false)"></div>
                                                 
                <div  class=" bg-white border w border-gray-500   md:max-w-md  lg:w-1/3 w-[96%] x-auto  z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] overflow-y-auto " >
                    
                  <div class="bg-white  pb-6 text-gray-500  text-start ">
                        <div class="flex  flex-col justify-center items-center  ">                             
                    
                          <h2 class="lg:text-2xl text-xl mb-4  w-full text-center py-1  border-b border-gray-300 text-white"  style="{{$bg}}" >
                                  {{$title  }} rol
                            </h2> 

                              <form class="bg-red-80  w-full  flex flex-col gap-2 lg:text-lg  text-base lg:px-4 px-2 text-gray-200  [&>div]:flex [&>div]:justify-center pt-4 "  wire:submit={{$method}}  >    
                                
                                @if ($method =="delete") 
                                    <p class="text-center text-gray-600 lg:px-10 px-6">Esta seguro de eliminar el rol  </p>
                                    <p class="text-center text-gray-600"><strong >"{{$name}}" </strong>?</p>
                                @else


                                  <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto ">
                                    <label  class="w-full text-start text-gray-500  leading-[16px] text-base">Nombre </label>
                                    <div class="relative w-full">
                                      <input type="text" wire:model="name" class ="h-6 rounded-md border border-gray-400 w-full text-gray-500" />
                                      <x-input-error for="name"   class="absolute top-full py-0 leading-[12px]"/>
                                    </div>
                                  </div>
                                                                                
                                  
                                  <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto ">
                                    <label  class="w-full text-start text-gray-500 mt-2 leading-[16px] text-base">Descripcion</label>
                                    <div class="relative w-full">
                                      <textarea   wire:model="description"  class =" rounded-md border border-gray-400 w-full text-gray-500" >
                                      </textarea>
                                      <x-input-error for="description"   class="absolute top-full"/>
                                    </div>
                                  </div>

                                  {{-- <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto text-gray-500">
                                    <label  class="w-full text-start text-gray-500 mt-2 leading-[16px] text-base">Estado</label>
                                    <div class="relative w-full ">
                                        <select   wire:model.live="status" class="h-6 rounded-md border border-gray-400 w-full text-gray-500 text-sm py-0.5 ">
                                          <option value="0">Inactivo</option>
                                          <option value="1">Activo</option>
                                        </select>
                                      <x-input-error for="status"   class="absolute top-full"/>
                                    </div>
                                  </div> --}}

                                    @endif

                                    <div class="flex gap-6 justify-center lg:text-base text-sm"> 
                                      
                                      <button  type="button" class="bg-orange-600 hover:bg-orange-700 mt-4 rounded-lg px-2 lg:py-1 py-0.5 "
                                        wire:click="$parent.$set('method',false)">                                
                                        Cancelar
                                      </button >                                                                            
                                      <button  class="bg-green-600 hover:bg-green-700 mt-4 rounded-lg px-2 lg:py-1 py-0.5 flex text-center items-center "   >
                                          {{$btnText}}
                                      </button >     

                                    </div>
                                </form>                                          
                                

                          </div>            
                  </div>

            </div>
                                                        
  </div>
