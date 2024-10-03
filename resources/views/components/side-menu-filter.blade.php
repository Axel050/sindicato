<div class=" absolute  top-0 right-0  max-h-screen h-full overflow-y-auto  pt-3  transition-all duration-500 border-gray-300   border-r-2 bg-sky-400 z-50 "  
    :class="openFilter? 'lg:w-[300px] lg:min-w-[300px]  w-full  ' : 'w-0 '  "             
    x-cloak
        >  


        <button @click="openFilter = !openFilter" class="absolute top-3 left-3 rounded-full bg-white text-red-800 font-extrabold w-6 h-6 hover:bg-gray-200 "    >X</button>

    <div  class="w-full   g-green-200 flex justify-center  mb-4  mt-2 ">      
        <h2 class="text-2xl font-extrabold  w-full text-center  ">Filtros<span class="text-cyan-700"></span></h2>
    </div>


      <ul class="flex  flex-col px-4  mt-2 text-gray-50  borde  [&>li]:cursor-pointer  text-sm ">        


        {{-- Rol --}}                     
           <x-side-menu-filter-item title="Por Rol">
               -Rol
               <select wire:model="idRol" class="w-fit text-gray-700 rounded-md h-6 mx-1 text-xs py-0">
                   <option value="0">Todos</option>                                                
                   <option value="3">Miembro</option>                        
                   <option value="2">Pendiente</option>                        
               </select>           
           </x-side-menu-filter-item>
    
          {{--  RANGO DE EDAD--}}
          <x-side-menu-filter-item title="Por Rango de Edad"> 
                -Entre
                <input  type="number" wire:model="desde" min="0" class="w-14  text-gray-700 rounded-md h-6 mx-1 text-xs" />
                 y 
                <input  type="number" wire:model="hasta" min="0" class="w-14 text-gray-700 rounded-md h-6 ml-1 text-xs"    />                          
          </x-side-menu-filter-item> 

           {{-- MES DE CUMPLE --}}
            <x-side-menu-filter-item title="Por Mes Cumpleaños"> 
                  -Mes              
                  <select   wire:model="mesCumple" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                      <option value="">Elija mes</option>
                      @php
                          $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                      @endphp
                    @foreach($meses as $index => $mes)
                        <option value="{{ $index + 1 }}">{{ $mes }}</option>
                    @endforeach                         
                  </select>                   
              </x-side-menu-filter-item>
              

           {{-- GENERO --}}                     
           <x-side-menu-filter-item title="Por Genero">
               -Sexo
               <select wire:model="genero" class="w-fit text-gray-700 rounded-md h-6 mx-1 text-xs py-0">
                   <option value="">Elija genero</option>                                                
                   <option value="hombre">Hombre</option>                        
                   <option value="mujer">Mujer</option>                        
               </select>           
           </x-side-menu-filter-item>

           {{-- Localidad --}}
           <x-side-menu-filter-item title="Por Localidad">                    
                  -Localidad 
                  <select   wire:model="selectLocalidad" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                      <option value="">Elija localidad</option>                                                
                      @foreach ($localidades as $localidad)                                                    
                        <option value="{{$localidad}}">{{$localidad}}</option>                                                      
                      @endforeach
                  </select>
            </x-side-menu-filter-item>
                   
            {{-- Estado --}}           
            <x-side-menu-filter-item title="Por Estado">                    
               -Estado 
                <select   wire:model="estado" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                    <option value="">Elija estado</option>                                                                          
                    <option value="1">Activo</option>                                                                          
                    <option value="0">Inactivo</option>                                                                                                    
                </select>
            </x-side-menu-filter-item >                                
            
            {{-- EstaFecha afiliaciondo --}}
            <x-side-menu-filter-item title="Por Fecha afiliacion">
              -Fecha :
              <input type="date"   wire:model="fechaAfiliacion" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" >
            </x-side-menu-filter-item >                    
                        
            {{-- SECTOR--}}
            <x-side-menu-filter-item title="Por Sector">                    
              -Sector 
              <select   wire:model="idSector" class="w-32  text-gray-700 rounded-md h-6 mx-1 text-xs py-0 pl-1" > 
                  <option value="">Elija sector</option>                          
                 @foreach($sectores as $sector)
                     <option value="{{$sector->id}}">{{ $sector->nombreSector }}</option>
                 @endforeach                         
              </select>
            </x-side-menu-filter-item >                    
           
            {{-- EMPRESA--}}
            <x-side-menu-filter-item title="Por Empresa">              
                -Empresa 
                <select   wire:model="idEmpresa" class="w-32   text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                    <option value="">Elija empresa</option> 
                  @foreach($empresas as $empresa)
                      <option value="{{$empresa->id}}"> {{ $empresa->nombreEmpresa }}</option>
                      @endforeach                         
                 </select>
            </x-side-menu-filter-item >                                                       
              
              {{-- SINDICATO--}}
              <x-side-menu-filter-item title="Por Sindicato">                    
                  -Sindicato 
                  <select   wire:model="idGremio" class="w-32   text-gray-700 rounded-md h-6 mx-1 text-xs py-0 pl-1" > 
                        <option value="" >Elija sindicato</option> 
                        @foreach($gremios as $gremio)
                          <option value="{{$gremio->id}}"> {{ $gremio->nombreGremio }}</option>
                          @endforeach                         
                    </select>
                 </x-side-menu-filter-item >                     
                                                
              {{-- FECHA REGISTRO--}}
              <x-side-menu-filter-item title="Por Fecha de Registro">                
                -Fecha 
                <input type="date"   wire:model="fechaRegistro" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" >
              </x-side-menu-filter-item >                                            
              
              {{--9 CONYUGE--}}
              <x-side-menu-filter-item title="Por Conyuge">                 
                -Tiene:
                <x-checkbox  wire:model="conyuge" value="1"  class="ml-2" name="conyuge"/>
              </x-side-menu-filter-item >                                  
              
              {{-- CONYUGE NACIMIENTO--}}
              <x-side-menu-filter-item title="Por Fecha Nacimiento Conyuge">           
                -Fecha :
                <input type="date"   wire:model="fechaNacConyuge" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0">
              </x-side-menu-filter-item>
              
              {{--8 HIJOS--}}
              <x-side-menu-filter-item title="Por Hijos">                 
                -Tiene:
                <x-checkbox  wire:model="hijos" value="1"  class="ml-2" name="hijos"/>
              </x-side-menu-filter-item>
                            
              {{--8 HIJOS SEXO--}}
              <x-side-menu-filter-item title="Por Sexo Hijos">                 
                    -Sexo:
                    <select   wire:model="hijosSexo" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                      <option value="">Elija genero</option>                                                
                      <option value="M">Hombre</option>                        
                      <option value="F">Mujer</option>                        
                    </select>
                </x-side-menu-filter-item>                   
                           
              {{--8 HIJOS RANGO--}}
              <x-side-menu-filter-item title="Por Hijos Edad">                 
                    -Entre
                    <input  type="number" wire:model="desdeHijo" min="0"
                    class="w-14  text-gray-700 rounded-md h-6 mx-1 text-xs"              
                    />
                    y 
                    <input  type="number" wire:model="hastaHijo" min="0" class="w-14 text-gray-700 rounded-md h-6 ml-1 text-xs"    />
              </x-side-menu-filter-item>                                                     
            
            
            <button class="bg-gray-600 rounded-lg px-3 py-1   lg:mt-10 mt-6  text-base hover:bg-gray-700 hover:font-semibold" 
            wire:click="filter" 
            @click="openFilter = !openFilter" 
            >Aplicar filtros</button>
            
          </ul>            
  
</div>


