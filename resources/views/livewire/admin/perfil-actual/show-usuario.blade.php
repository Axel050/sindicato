<div  class="  flex justify-center  w-full fullscreen items-center bg-gray-50 relative" >

      <x-action-message on="UserAdminUpdated" class="bg-orange-500  border-orange-700 absolute top-0 left-0 z-10" >
            Usuario actualizado con exitó.</x-action-message>               
              
    <div class="flex  flex-col justify-center items-center    mx-auto h-fit lg:w-auto w-[95%] border shadow-lg">
                      
          <h2 class="lg:text-2xl text-xl mb-8  w-full text-center py-1  border-b border-gray-300 text-white"  style="{{$bg}}">
                {{$title  }} perfil
          </h2>
          
          <form class="flex flex-col max-w-[1200px] mx-auto w-full  pb-4  mb-0  lg:p-6 p-2  rounded-lg overflow-y-auto max-h-[85vh] " 
            wire:submit={{$method}} >

              <div class="border- border-gray-300 lg:shadow-md mb-6 rounded-lg bg-white">
            
                  <div class="grid lg:grid-cols-4 grid-cols-1 px-4 pb-4  space-y-2 space-x-4 pt-0 [&>div]:flex [&>div]:flex-col [&>div]:justify-end [&>div]:relative bg-reen-200 lg:shadow-md"> 

                        <div class=" -red-200  ml-4 ">
                          <x-label for="name">Nombre</x-label>
                            <input  class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                              wire:model="name" {{ $method == 'show' ? 'disabled' : '' }}/>
                            <x-input-error for="name"   class=" absolute top-full py-0 leading-[12px] text-xs"/>
                        </div>                                

                        <div class=" -green-200 ">
                          <x-label for="apellido">Apellido</x-label>
                              <input  class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                wire:model="apellido"  {{ $method == 'show' ? 'disabled' : '' }}/>
                              <x-input-error for="apellido"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                        </div>
                                                                                                                              
                        <div >
                          <x-label for="">Teléfono</x-label>
                              <input  class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                wire:model="telefono"  {{ $method == 'show' ? 'disabled' : '' }}/>
                            <x-input-error for="telefono"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                        </div>
                        
                          <div>
                          <x-label for="">Email</x-label>
                              <input  class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                wire:model="email"  {{ $method == 'show' ? 'disabled' : '' }}/>
                            <x-input-error for="email"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                        </div>
                                            
                        @if ($method=="edit")                        
                            <div>
                              <x-label for="">Password</x-label>
                              <input  class="h-7 rounded-lg mr-2" wire:model="password"  {{ $method == 'show' ? 'disabled' : '' }}/>
                              <x-input-error for="password"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                            </div>
                            <div>
                              <x-label for="">Confirmación Password</x-label>
                              <input  class="h-7 rounded-lg mr-2" wire:model="password_confirmation"  {{ $method == 'show' ? 'disabled' : '' }}/>
                              <x-input-error for="password_confirmation"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                            </div>
                        @endif

                 </div> 
              </div> 
        
              <div class="flex justify-center gap-x-12 mt-6 mb-2"> 
            
                  @if ($method == "edit")
                      <button type="button" wire:click="option('show')"
                      class="px-6 py-1.5 bg-red-500 text-white w-fit  rounded-lg hover:bg-red-600">Cancelar  
                      </button >                      
                      <button   class="px-6 py-1.5 bg-green-500 text-white w-fit  rounded-lg hover:bg-green-600" >Guardar</button>
                  @else
                      <button   type="button"  class="px-6 py-1.5 bg-green-500 text-white w-fit  rounded-lg hover:bg-green-600" wire:click="option('edit')">Editar</button>
                  @endif
              </div>
                      
          </form> 
                    
      </div>
</div>