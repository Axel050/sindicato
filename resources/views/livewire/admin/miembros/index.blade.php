<div class="flex flex-col l:flex-row bg-amber-50 w-full fullscreen pt-2 lg:p-4 px-1 ">

  

    <div >
        <div >
              <div class="w-full flex lg:flex-row flex-col item-center justify-between order-4   lg:items-center  mx-auto bg-white lg:py-2  py-1 lg:px-6 px-2 rounded-md  shadow-md ">


                    <div  class="flex flex-col lg:w-1/3 w-full lg:order-1 order-2 mt-2 lg:mt-0 lg:mr-14 ">

                      <div class="flex  items-center">
                        <label for="query" class="text-sm lg:text-base text-gray-600 mr-3 mb-1">Buscar por:</label>

                        <div class="flex flex-col">

                          <div class="g-red-400 flex items-center "> 
                            <input class="h-3 w-3 checked:bg-green-600 checked:focus:outline-green-600 checked:focus:bg-green-600" wire:model.live="searchType" type="radio"  name="searchType" value="miembro"/><small class="text-xs ml-1 mr-2">Miembro</small> 
                            <input class="h-3 w-3 checked:bg-green-600 checked:focus:outline-green-600 checked:focus:bg-green-600  " wire:model.live="searchType" type="radio"  name="searchType" value="conyuge"/><small class="text-xs ml-1 mr-2">Conyuge</small>
                          <input class="h-3 w-3 checked:bg-green-600 checked:focus:outline-green-600 checked:focus:bg-green-600" wire:model.live="searchType" type="radio"  name="searchType" value="hijo"/><small class="text-xs ml-1 mr-2">Hijo</small>
                          
                        </div>
                        <hr class="my-1">

                        <div class="g-red-200 flex items-center mb-1"> 
                          <input class="h-3 w-3" wire:model.live="searchField" type="radio"  name="searchField" value="name"/><small class="text-xs ml-1 mr-2">Nombre</small> 
                          <input class="h-3 w-3" wire:model.live="searchField" type="radio"  name="searchField" value="apellido"/><small class="text-xs ml-1 mr-2">Apellido</small>
                          <input class="h-3 w-3" wire:model.live="searchField" type="radio"  name="searchField" value="documento"/><small class="text-xs ml-1 mr-2">Dni</small>
                        </div>

                      </div>
                    </div>
                      <input type="search" nombre="query" wire:model.live="query" class="h-6 py-0 rounded-md border border-gray-400 w-40 lg:w-48 mx-auto  ">
                    </div>
        
                    <div class=" flex lg:w-2/3  w-full justify-between lg:order-2 order-1 ">
                    

                      
                      <button class="border border-green-800 hover:text-gray-200 hover:bg-green-700 bg-green-600 lg:px-2 px-3 py-0.5 rounded-lg text-white text-sm lg:h-7 h-6 place-self-center flex items-center gap-x-2"   wire:click="option('save')" > 
                        <svg  width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                              <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                              <g id="SVGRepo_iconCarrier"> <path d="M7 12L12 12M12 12L17 12M12 12V7M12 12L12 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> <circle cx="12" cy="12" r="9" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                          </svg>
                          <span  class="lg:block hidden">
                            Agregar
                          </span>
                    </button>           

                    <button class="border border-teal-800 hover:text-gray-200 hover:bg-teal-800 bg-teal-700  lg:px-2 px-3 py-0.5 rounded-lg text-white text-sm lg:h-7 h-6 place-self-center flex items-center gap-x-2"    wire:click="exportar"> 
                        <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M719.8 651.8m-10 0a10 10 0 1 0 20 0 10 10 0 1 0-20 0Z" fill="#E73B37" /><path d="M512.1 64H172v896h680V385.6L512.1 64z m278.8 324.3h-280v-265l280 265zM808 916H216V108h278.6l0.2 0.2v296.2h312.9l0.2 0.2V916z" fill="#fff" /><path d="M280.5 530h325.9v16H280.5z" fill="#fff" /><path d="M639.5 530h90.2v16h-90.2z" fill="#E73B37" /><path d="M403.5 641.8h277v16h-277z" fill="#fff" /><path d="M280.6 641.8h91.2v16h-91.2z" fill="#E73B37" /><path d="M279.9 753.7h326.5v16H279.9z" fill="#fff" /><path d="M655.8 753.7h73.9v16h-73.9z" fill="#E73B37" />
                        </svg>
                          <span  class="lg:block hidden">
                            Exportar
                          </span>
                    </button>           

                    

                    {{-- columbns --}}
                    <div  x-data="{openColumn:false,title:''}" x-cloak @click.outside="openColumn = false">
                    <button @click="openColumn = ! openColumn"  class="lg:h-7 h-6  rounded-lg lg:px-2 px-3 py-0.5 flex justify-center items-center border border-blue-800 bg-blue-700  hover:bg-blue-800 text-white" > 
                      <svg width="20px" height="20px"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" >
                              <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                              <g id="SVGRepo_iconCarrier"> <path d="M3 9H21M3 15H21M9 9L9 20M15 9L15 20M6.2 20H17.8C18.9201 20 19.4802 20 19.908 19.782C20.2843 19.5903 20.5903 19.2843 20.782 18.908C21 18.4802 21 17.9201 21 16.8V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H6.2C5.0799 4 4.51984 4 4.09202 4.21799C3.71569 4.40973 3.40973 4.71569 3.21799 5.09202C3 5.51984 3 6.07989 3 7.2V16.8C3 17.9201 3 18.4802 3.21799 18.908C3.40973 19.2843 3.71569 19.5903 4.09202 19.782C4.51984 20 5.07989 20 6.2 20Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                          </svg>

                          <span  class="lg:block hidden ml-1">
                            Columnas
                          </span>
                    </button>
                    <x-side-menu-columns  :localidades="$localidades" :sectores="$sectores"  :empresas="$empresas" :gremios="$gremios" />
                  </div>
                    
                    
                    {{--  filtro--}}
                    <div  x-data="{openFilter:false,title:''}" x-cloak @click.outside="openFilter = false">
                    <button @click="openFilter = ! openFilter"  class="lg:h-7 h-6  rounded-lg lg:px-2 px-3 py-0.5 flex justify-center items-center border border-gray-200 bg-gray-200  hover:bg-gray-300 " > 
                      <svg width="20px" height="20px" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 3.58002H2C1.99912 5.28492 2.43416 6.96173 3.26376 8.45117C4.09337 9.94062 5.29 11.1932 6.73999 12.09C7.44033 12.5379 8.01525 13.1565 8.41062 13.8877C8.80598 14.6189 9.00879 15.4388 9 16.27V21.54L15 20.54V16.25C14.9912 15.4188 15.194 14.599 15.5894 13.8677C15.9847 13.1365 16.5597 12.5178 17.26 12.07C18.7071 11.175 19.9019 9.92554 20.7314 8.43988C21.5608 6.95422 21.9975 5.28153 22 3.58002Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      <span  class="lg:block hidden">
                      Filtrar
                      </span>
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



         @if ($mesCumple   || $desde  || $hasta || $genero ||$selectLocalidad || $estado ==='0' || $estado ==="1" || $fechaAfiliacion || $idSector   || $idEmpresa   || $idGremio || $fechaRegistro || $conyuge || $fechaNacConyuge || $hijos   || $hijosSexo   || $hastaHijo || $desdeHijo || $idRol)
        
         
         <div class="bg-white w-full mt-2 flex flex-col  pl-2 pb-0 rounded-md  shadow-md  ">

          
            
           <h3 class="mx-auto font-bold  mb-0">Filtros aplicados </h3>          
          
           <div class="flex   lg:gap-x-6 gap-x-2 justify-center  flex-wrap">


            @php
                $rol='';
                if ($idRol == "2" ) {
                    $rol="Pendiente";
                }
                elseif($idRol == "3"){
                  $rol="Miembro";
                }
            @endphp
            <x-button-active-filter 
                    title="Rol" 
                    value="{{ $rol}}" 
                    action="$set('idRol',0)" 
                    />
              
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

                {{--  AGERGAR SI SE MARCA LA CSAILLA HIJOS TAMBIEN MOSTRA CANTIDAD EVALUAR LOGICA  --}}
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
                        <x-table-miembros :usuarios="$usuarios" :selectedColumns="$selectedColumns" />                        
                    @else
                          <h3 class="w-full text-center py-2 px-3 rounded-md">Sin resultados </h3>                      
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
