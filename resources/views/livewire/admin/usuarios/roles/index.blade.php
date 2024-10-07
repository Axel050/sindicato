<div class="flex flex-col l:flex-row bg-amber-50 w-full fullscreen pt-2 lg:p-4 px-1 ">

    <div >
        <div class="">
              <div class="w-full flex item-center justify-between order-4  lg:flex-row lg:items-center  mx-auto bg-whit lg:py-4  py-2 px-6 rounded-md  shadow-md ">
                    <div  class="flex flex-col ">
                      <label for="query" class="text-sm lg:text-base text-gray-600 ">Buscar</label>
                      <input type="search" nombre="query" wire:model.live="query" class="h-7 rounded-md border border-gray-400 w-40 lg:w-48 ">
                    </div>
                        
                    <button class="border border-green-800 hover:text-gray-200 hover:bg-green-700 bg-green-600 px-2 py-0.5 rounded-lg text-white text-sm h-7 place-self-center flex items-center gap-x-2"   wire:click="option('save')" > 
                        <svg  width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                              <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                              <g id="SVGRepo_iconCarrier"> <path d="M7 12L12 12M12 12L17 12M12 12V7M12 12L12 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> <circle cx="12" cy="12" r="9" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                          </svg>
                          <span >Agregar</span>
                    </button>           
                                    
              </div>

         </div>
         
                   @if ($method && $method!="permisos")         
                        @livewire('admin.usuarios.roles.modal',[ "method" => $method,"id"=>$id])
                    @endif

                   @if ($method =="permisos")         
                        @livewire('admin.usuarios.roles.permisos',[ "method" => $method,"id"=>$id])
                    @endif

          <div class="overflow-x-auto bg-white m-4 border-2 order-red-600 mx-auto rounded-md  shadow-md relative ">

            <x-action-message on="permisosAdded" class="bg-green-500   border-green-700 absolute left-0 z-10" >Permisos actualizados con exitó.</x-action-message> 
            <x-action-message on="roleCreated" class="bg-green-500   border-green-700 absolute left-0 z-10" >Rol creado con exitó.</x-action-message> 
            <x-action-message on="roleUpdated" class="bg-orange-500  border-orange-700 absolute left-0 z-10" >Rol actualizado con exitó.</x-action-message> 
            <x-action-message on="roleDeleted" class="bg-red-500  border-red-700 absolute left-0 z-10" >Rol eliminado con exitó.</x-action-message> 
            <x-action-message on="roleNotExits" class="bg-blue-500  border-blue-700 absolute left-0 z-10" >Rol inexistente.</x-action-message> 
            
        
            <div class="min-w-full inline-block align-middle  ">
                <div class="overflow-hidden">

                  @if (count($roles) )
                                      
                  <table class="min-w-full divide-y  divide-gray-400   p-1">  
                      <thead>                                                                                
                        <tr class="bg-gray-100 relative text-gray-600 font-bold divide-x-2 [&>th]:pl-2 [&>th]:pr-1 [&>th]:lg:pl-4 [&>th]:text-start text-sm ">
                          <th scope="col" class="py-1">Id</th>
                          <th scope="col" >Nombre</th>
                          <th scope="col" >Descripcion</th>
                          {{-- <th scope="col" >Estado</th> --}}
                          <th scope="col" class="lg:w-[190px] w-[90px]">Accion</th>
                          </tr>
                      </thead>

                      <tbody class="divide-y divide-gray-200 text-gray-500  text-sm">

                        @foreach ($roles as $rol)
                        <tr class="divide-x-2 [&>td]:pl-2 [&>td]:pr-1 [&>td]:lg:pl-4 [&>td]:text-start ">

                          <td class="py-1.5" >{{ $rol->id }}</td>
                          <td class="py-1.5" >{{ $rol->name }}</td>
                          <td class="py-1.5" >{{ $rol->description }}</td>
                          {{-- <td  class="text-white">
                              @if ($rol->status)
                                  <span class="bg-green-500 px-1 py-0.5 rounded-md">Activo</span>
                                  @else
                                  <span class="bg-red-300 px-1 py-0.5 rounded-md">Inactivo</span>
                              @endif 
                            </td> --}}                                                      
                          <td >
                            <div class="flex justfy-end lg:gap-x-6 gap-x-4 text-white text-xs">

                                <button 
                                  class=" hover:text-gray-100  hover:bg-sky-950 flex items-center py-0.5 bg-sky-800 rounded-lg px-1 " wire:click="option('permisos',{{$rol->id}})">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                        <g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                                    </svg>                                                        
                                  <span class="hidden lg:block">Permisos</span>
                              </button>

                            
                                <button 
                                    class=" hover:text-gray-200  hover:bg-red-600 flex items-center py-0.5 bg-red-500 rounded-lg px-1 " wire:click="option('delete',{{$rol->id}})">
                                      <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                          <g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                                      </svg>                                                        
                                    <span class="hidden lg:block">Eliminar</span>
                                </button>

                              <button class=" hover:text-gray-200 hover:bg-orange-600 flex items-center py-0.5 bg-orange-500 rounded-lg px-1 " wire:click="option('update',{{$rol->id}})" >
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#ffffff"/>
                                  </svg>
                                <span class="hidden lg:block">Editar</span>
                              </button>
                          </div>
                        </td>
                      </tr>
                      @endforeach                          

                      </tbody>
                  </table>

                  @else
                    <h3 class="w-full text-center py-2 px-3 rounded-md">¡Sin resultados!</h3>
                  @endif
                  </div>
                                                    
                </div>
              </div>
              @if (count($roles) )
                  <div class="w-full  item-center justify-between lg:justify-center lg:gap-x-8 order-4  lg:flex-row lg:items-center lg:w-[75%] bg-gray-50 mx-auto px-2">
                    {{$roles->links()}}
                  </div>
                  @endif
          </div>                              
        </div> <!-- end card -->
            
      </div>
    </div> 