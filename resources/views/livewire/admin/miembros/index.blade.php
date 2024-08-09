<div class="flex flex-col l:flex-row bg-amber-50 w-full fullscreen pt-2 lg:p-4 px-1 ">

  

    <div >
        <div >
              <div class="w-full flex lg:flex-row flex-col item-center justify-between order-4   lg:items-center  mx-auto bg-white lg:py-4  py-2 lg:px-6 px-2 rounded-md  shadow-md  ">


                    <div  class="flex flex-col lg:w-1/3 w-full lg:order-1 order-2 mt-2 lg:mt-0 lg:mr-14">

                      <div class="flex  items-center">
                        <label for="query" class="text-sm lg:text-base text-gray-600 mr-3 mb-1">Buscar por:</label>

                        <input class="h-3 w-3" wire:model.live="searchField" type="radio"  name="searchField" value="name"/><small class="text-xs ml-1 mr-2">Nombre</small> 
                        <input class="h-3 w-3" wire:model.live="searchField" type="radio"  name="searchField" value="apellido"/><small class="text-xs ml-1 mr-2">Apellido</small>
                         <input class="h-3 w-3" wire:model.live="searchField" type="radio"  name="searchField" value="documento"/><small class="text-xs ml-1 mr-2">Documento</small>
                      </div>
                      <input type="search" nombre="query" wire:model.live="query" class="h-6 py-0 rounded-md border border-gray-400 w-40 lg:w-48 mx-auto  ">
                    </div>
        
                    <div class=" flex lg:w-2/3  w-full justify-between lg:order-2 order-1">

                      
                      <button class="border border-green-800 hover:text-gray-200 hover:bg-green-700 bg-green-600 px-2 py-0.5 rounded-lg text-white text-sm lg:h-7 h-6 place-self-center flex items-center gap-x-2"   wire:click="option('save')" > 
                        <svg  width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                              <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                              <g id="SVGRepo_iconCarrier"> <path d="M7 12L12 12M12 12L17 12M12 12V7M12 12L12 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> <circle cx="12" cy="12" r="9" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                          </svg>
                          <span >
                            Agregar
                          </span>
                    </button>           

                    <button class="border border-teal-800 hover:text-gray-200 hover:bg-teal-800 bg-teal-700  px-2 py-0.5 rounded-lg text-white text-sm lg:h-7 h-6 place-self-center flex items-center gap-x-2"    > 
                        <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M719.8 651.8m-10 0a10 10 0 1 0 20 0 10 10 0 1 0-20 0Z" fill="#E73B37" /><path d="M512.1 64H172v896h680V385.6L512.1 64z m278.8 324.3h-280v-265l280 265zM808 916H216V108h278.6l0.2 0.2v296.2h312.9l0.2 0.2V916z" fill="#fff" /><path d="M280.5 530h325.9v16H280.5z" fill="#fff" /><path d="M639.5 530h90.2v16h-90.2z" fill="#E73B37" /><path d="M403.5 641.8h277v16h-277z" fill="#fff" /><path d="M280.6 641.8h91.2v16h-91.2z" fill="#E73B37" /><path d="M279.9 753.7h326.5v16H279.9z" fill="#fff" /><path d="M655.8 753.7h73.9v16h-73.9z" fill="#E73B37" />
                        </svg>
                          <span >
                            Exportar
                          </span>
                    </button>           
                    
                    
                    {{--  filtro--}}
                    <div  x-data="{openFilter:false,title:''}" x-cloak @click.outside="openFilter = false">
                    <button @click="openFilter = ! openFilter"  class="lg:h-7 h-6  rounded-lg p-1 m- flex justify-center items-center border border-gray-200 px-3 bg-gray-200  hover:bg-gray-300 " > 
                      <svg width="20px" height="20px" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1">
                        <path d="M22 3.58002H2C1.99912 5.28492 2.43416 6.96173 3.26376 8.45117C4.09337 9.94062 5.29 11.1932 6.73999 12.09C7.44033 12.5379 8.01525 13.1565 8.41062 13.8877C8.80598 14.6189 9.00879 15.4388 9 16.27V21.54L15 20.54V16.25C14.9912 15.4188 15.194 14.599 15.5894 13.8677C15.9847 13.1365 16.5597 12.5178 17.26 12.07C18.7071 11.175 19.9019 9.92554 20.7314 8.43988C21.5608 6.95422 21.9975 5.28153 22 3.58002Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Filtrar
                    </button>
                    <x-side-menu-filter  :localidades="$localidades" :sectores="$sectores"  :empresas="$empresas" :gremios="$gremios" />
                  </div>
                  
                  {{--  filtro--}}
                  
                </div>
                  
                  
              </div>

        @if ($method)        
            @livewire('admin.miembros.modal',[ "method" => $method,"id"=>$id])
        @endif

         </div>



         @if ($mesCumple   || $desde  || $hasta || $genero ||$selectLocalidad || $estado ==='0' || $estado ==="1" || $fechaAfiliacion || $idSector   || $idEmpresa   || $idGremio || $fechaRegistro || $conyuge || $fechaNacConyuge || $hijos   || $hijosSexo   || $hastaHijo || $desdeHijo )
        
         
         <div class="bg-white w-full mt-2 flex flex-col  pl-2 pb-0 rounded-md  shadow-md  ">

          
            
           <h3 class="mx-auto font-bold  mb-0">Filtros aplicados </h3>          
          
           <div class="flex   lg:gap-x-6 gap-x-2 justify-center  flex-wrap">

              
                @if ($desde || $hasta  )                                      
                  <button class="bg-gray-500 px-2 rounded-lg mt-2 hover:bg-gray-600 hover:text-gray-50 text-gray-100 items-center flex w-fit" wire:click="resetRango">
                    <span class="text-sm font-extrabold  pr-2">X</span> 
                    <span class="text-xs">Rango de edad :</span> <span class="font-semibold text-xs ml-0.5"> entre {{$desde}} y {{$hasta}}</span>
                  </button>
                @endif
                

                <x-button-active-filter 
                    title="Mes cumpleaños" 
                    value="{{  $this->getMonthName($mesCumple) }}" 
                    action="$set('mesCumple','')" 
                    />

                
                  <x-button-active-filter 
                    title="Genero" 
                    value="{{ $genero }}" 
                    action="$set('genero','')" 
                    />

                    <x-button-active-filter 
                    title="Localidad" 
                    value="{{ $selectLocalidad }}" 
                    action="$set('selectLocalidad','')" 
                    />
                                     


                @php
                    $estadoTexto = $estado === "1" ? 'Activo' : ($estado === "0" ? 'Inactivo' : '');
                @endphp
                <x-button-active-filter 
                    title="Estado" 
                    value="{{$estadoTexto }}"
                    action="$set('estado','')" 
                    />
                    
                
                <x-button-active-filter 
                    title="Fecha Afiliacion" 
                    value="{{$fechaAfiliacion }}"
                    action="$set('fechaAfiliacion','')" 
                    />

                       
                  <x-button-active-filter 
                      title="Sector"                     
                      value="{{$this->findSector($idSector)}}"
                      action="$set('idSector','')" 
                      />                    
                
                <x-button-active-filter 
                    title="Empresa"                     
                    value="{{$this->findEmpresa($idEmpresa)}}"
                    action="$set('idEmpresa','')" 
                    />
                    
                    <x-button-active-filter 
                    title="Sindicato"                     
                    value="{{$this->findGremio($idGremio)}}"
                    action="$set('idGremio','')" 
                    />
                    
                <x-button-active-filter 
                    title="Fecha Registro"  
                    value="{{$this->fechaRegistro}}"
                    action="$set('fechaRegistro','')" 
                    />
                    
                    <x-button-active-filter 
                    title="Conyugue"  
                    value="{{$conyuge  ? 'Si' : '' }}"
                    action="$set('conyuge','')" 
                    />
                    
                    <x-button-active-filter 
                        title="Fecha Nac Conyuge"                                          
                        value="{{ $fechaNacConyuge}}"
                        action="$set('fechaNacConyuge','')" 
                        />
                    
                <x-button-active-filter 
                    title="Hijos"  
                    value="{{$hijos  ? 'Si' : '' }}"
                    action="$set('hijos','')" 
                    />

                    @php
                    $valueHijosCant ='';
                        if($hijosSexo == 'M'){
                          $valueHijosCant ='Hombre ';
                        }
                        if($hijosSexo == 'F'){
                          $valueHijosCant ='Mujer ';
                        }
                    @endphp

                <x-button-active-filter 
                    title="Hijos sexo"                                          
                    value="{{ $valueHijosCant}}"
                    action="$set('hijosSexo','')" 
                    />

                    




                    @if ($desdeHijo || $hastaHijo  )                 
                       
                  <button class="bg-gray-500 px-2 rounded-lg mt-2 hover:bg-gray-600 hover:text-gray-50 text-gray-100 items-center flex w-fit"  wire:click="resetRangoHijo">
                    <span class="text-sm font-extrabold  pr-2">X</span> 
                    <span class="text-xs">Rango de edad hijo : </span>
                    <span class="font-semibold text-xs ml-0.5"> entre {{$desdeHijo}} y {{$hastaHijo}} </span>
                  </button>
                @endif
                     
                

          </div> 
          <div class="flex justify-center lg:space-x-6 space-x-3  text-sm mt-2  rounded-t-md bg-cyan-400 w-fit mx-auto lg:px-8 px-6 text-white">
              
                <span>Miembros: <strong>{{ $cantidad}}</strong></span>

                
                {{-- @if ($fechaNacConyuge || $conyuge) 
                <span>Conyuges: <strong>{{ $cantidad}}</strong></span>
                @endif --}}

                @if ($cantidadHijos) 
                <span>Hijos: <strong>{{ $cantidadHijos}}</strong></span>
                @endif

              </div>
          

         </div>

         @endif
         


          <div class="overflow-x-auto bg-white m-4 border-2 order-red-600 mx-auto rounded-md  shadow-md relative p-1">

            <x-action-message on="miembroCreated" class="bg-green-500   border-green-700 absolute left-0 z-10" >Miembro creado con exitó.</x-action-message> 
            <x-action-message on="miembroUpdated" class="bg-orange-500  border-orange-700 absolute left-0 z-10" >Miembro actualizado con exitó.</x-action-message> 
            <x-action-message on="miembroDeleted" class="bg-red-500  border-red-700 absolute left-0 z-10" >Miembro eliminado con exitó.</x-action-message> 
            <x-action-message on="miembroNotExits" class="bg-blue-500  border-blue-700 absolute left-0 z-10" >Miembro inexistente.</x-action-message> 
            
        
                                      <div class="min-w-full inline-block align-middle  ">
                                          <div class="overflow-hidden">

                                            @if (count($usuarios) )
                                                                                              
                                              <table class="min-w-full divide-y  divide-gray-400   p-1">  
                                                  <thead>

                                                    
                                                        
                                                    <tr class="bg-gray-100 relative text-gray-600 font-bold divide-x-2 [&>th]:pl-2 [&>th]:pr-1 [&>th]:lg:pl-4 [&>th]:text-start text-sm ">
                                                        
                                                      <th scope="col" class="py-1">
                                                        Nombre
                                                      </th>
                                                      
                                                      
                                                      <th scope="col">Apellido</th>

                                                      <th scope="col" >Documento</th>

                                                      <th scope="col" >Empresa</th>
                                                      
                                                      <th scope="col" >Sector</th>
                                                      
                                                      <th scope="col" >Rol</th>

                                                      <th scope="col" >Estado</th>
                                                                                                                
                                                        <th scope="col" class="lg:w-[190px] w-[90px]">Accion</th>
                                                        
                                                      </tr>
                                                  </thead>

                                                  <tbody class="divide-y divide-gray-200 text-gray-500  text-sm">

                                                    @foreach ($usuarios as $usuario)
                                                    <tr class="divide-x-2 [&>td]:pl-2 [&>td]:pr-1 [&>td]:lg:pl-4 [&>td]:text-start ">

                                                      <td class="py-1.5" >{{ $usuario->name }}-{{$usuario->id}}</td>

                                                      <td class="py-1.5" >{{ $usuario->apellido }}</td>

                                                      <td class="py-1.5" >{{ $usuario->documento }}</td>

                                                      <td class="py-1.5" >{{ $usuario->empresa?->nombreEmpresa }}</td>

                                                      <td class="py-1.5" >{{ $usuario->sector?->nombreSector }}</td>

                                                      <td class="py-1.5" >{{ $usuario->role?->name }}</td>
                                                      

                                                                                                            
                                                      <td  class="text-white">
                                                          @if ($usuario->estado)
                                                              <span class="bg-green-500 px-1 py-0.5 rounded-md">Activo</span>
                                                             @else
                                                              <span class="bg-red-300 px-1 py-0.5 rounded-md">Inactivo</span>
                                                          @endif 
                                                       </td>
                                                        
                                                      
                                                      <td >
                                                        <div class="flex justfy-end lg:gap-x-6 gap-x-4 text-white text-xs">

                                                        
                                                          <button 
                                                              class=" hover:text-gray-200  hover:bg-red-600 flex items-center py-0.5 bg-red-500 rounded-lg px-1 " wire:click="option('delete',{{$usuario->id}})">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                                                                </svg>                                                        
                                                              <span class="hidden lg:block">Eliminar</span>
                                                          </button>

                                                      <button class=" hover:text-gray-200 hover:bg-orange-600 flex items-center py-0.5 bg-orange-500 rounded-lg px-1 " wire:click="option('update',{{$usuario->id}})" >
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

                                              <h3 class="w-full text-center py-2 px-3 rounded-md">Sin resultados </h3>
                                              {{-- <h3 class="w-full text-center py-2 px-3 rounded-md">Sin resultados para "<strong>{{$query}} </strong>"</h3> --}}
                                              @endif
                                          </div>
                                                    
                                      </div>
                                    </div>
                                    
                                  @if (count($usuarios) )
                                      <div class="w-full  item-center justify-between lg:justify-center lg:gap-x-8 order-4  lg:flex-row lg:items-center lg:w-[75%] g-gray-50 bg-white mx-auto px-2 mb-8 mt-5">
                                        {{$usuarios->links()}}
                                      </div>
                                      @endif
                              </div>                              
            </div> <!-- end card -->


      </div>                         

</div> 
