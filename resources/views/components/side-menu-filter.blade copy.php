<div class=" absolute  top-0 right-0  max-h-screen h-full overflow-y-auto  pt-4  transition-all duration-500 border-gray-300   border-r-2 bg-sky-400 z-50 "  
    :class="openFilter? 'lg:w-[300px] lg:min-w-[300px]  w-full  ' : 'w-0 '  "             
    x-cloak
        >  


        <button @click="openFilter = !openFilter" class="absolute top-3 left-3 rounded-full bg-white text-red-800 font-extrabold w-6 h-6"    >X</button>

    <div  class="w-full   g-green-200 flex justify-center  lg:mb-5 mb-4  mt-2 ">      
        <h2 class="text-2xl font-extrabold  w-full text-center p-0 ">Filtros<span class="text-cyan-700"></span></h2>
    </div>


      <ul class="flex  flex-col px-4  mt-2 text-gray-50  borde  [&>li]:cursor-pointer  text-sm ">        


    
          {{--  RANGO DE EDAD--}}
          <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-2"  
            x-data="  {open:false, desde: @entangle('desde') }"            
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"              
              x-init="open = (desde > 0); $watch('desde', value => { if (value > 0) open = true })"
                >
                <div  class = "flex  justify-start items-center py-1 ">
                                       
                      <span class="ml-2 lg:mr-8 " @click="open = !open">Por Rango de  Edad</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                 </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Entre
                     <input  type="number" wire:model="desde" min="0"
                     class="w-14  text-gray-700 rounded-md h-6 mx-1 text-xs"              
                     />
                     y 
                      <input  type="number" wire:model="hasta" min="0" class="w-14 text-gray-700 rounded-md h-6 ml-1 text-xs"    />

                   </div>
                </li>
             </ul>   
             
           </li>

           {{-- MES DE CUMPLE --}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false }"            
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"              
              
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Mes  de  cumpleaños</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Mes

              
                     <select   wire:model="mesCumple" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                         <option value="">Elija mes</option>
                          @php
                              $meses = [
                                  'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                  'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                              ];
                            @endphp
                        @foreach($meses as $index => $mes)
                            <option value="{{ $index + 1 }}">{{ $mes }}</option>
                        @endforeach                         
                     </select>
                   </div>
                </li>
             </ul>   
             
           </li>

           {{-- GENERO --}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open"> Por  Genero</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1  py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Sexo 


                     <select   wire:model="genero" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                         <option value="">Elija genero</option>                                                
                         <option value="hombre">Hombre</option>                        
                         <option value="mujer">Mujer</option>                        
                     </select>
                   </div>
                </li>
             </ul>   
             
           </li>

           
           <x-side-menu-filter-item title="Por Genero1">           
               -Sexo
               <select wire:model="genero" class="w-fit text-gray-700 rounded-md h-6 mx-1 text-xs py-0">
                   <option value="">Elija genero</option>                                                
                   <option value="hombre">Hombre</option>                        
                   <option value="mujer">Mujer</option>                        
               </select>           
           </x-side-menu-filter-item>

           {{-- Localidad --}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open"> Por Localidad</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1 py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Localidad 


                     <select   wire:model="selectLocalidad" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                         <option value="">Elija localidad</option>                                                
                          @foreach ($localidades as $localidad)                                                    
                            <option value="{{$localidad}}">{{$localidad}}</option>                                                      
                          @endforeach
                     </select>
                   </div>
                </li>
             </ul>   
             
           </li>

           {{-- Estado --}}           
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
           :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
           @click.outside="open = false"                            
           x-data="  {open:false}"     
           
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Estado</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}

    
    
            <ul class="flex flex-col  mt-1" x-show="open" >  



                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Estado 


                     <select   wire:model="estado" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                         <option value="">Elija estado</option>                                                                          
                         <option value="1">Activo</option>                                                                          
                         <option value="0">Inactivo</option>                                                                          
                          
                     </select>
                   </div>
                </li>
             </ul>   
    
             
           </li>

           {{-- EstaFecha afiliaciondo --}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Fecha afiliacion</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1  py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Fecha :
                     <input type="date"   wire:model="fechaAfiliacion" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" >
                   </div>
                </li>
             </ul>   
             
           </li>

           {{-- SECTOR--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 ">

                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Sector</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1 py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600" >
                  <div class="flex  text-sm items-center ml-1">
                     -Sector 
                     <select   wire:model="idSector" class="w-32  text-gray-700 rounded-md h-6 mx-1 text-xs py-0 pl-1" > 
                         <option value="">Elija sector</option>                          
                        @foreach($sectores as $sector)
                            <option value="{{$sector->id}}">{{ $sector->nombreSector }}</option>
                        @endforeach                         
                     </select>
                     
                   </div>
                </li>
             </ul>   
             
           </li>

           {{-- EMPRESA--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Empresa</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Empresa 
                     <select   wire:model="idEmpresa" class="w-32   text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                         <option value="">Elija empresa</option> 
                        @foreach($empresas as $empresa)
                            <option value="{{$empresa->id}}"> {{ $empresa->nombreEmpresa }}</option>
                        @endforeach                         
                     </select>
                     
                   </div>
                </li>
             </ul>   
             
           </li>

           {{-- SINDICATO--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 "> 
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Sindicato</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600" >
                  <div class="flex  text-sm items-center ml-1">
                     -Sindicato 
                     <select   wire:model="idGremio" class="w-32   text-gray-700 rounded-md h-6 mx-1 text-xs py-0 pl-1" > 
                         <option value="" >Elija sindicato</option> 
                        @foreach($gremios as $gremio)
                            <option value="{{$gremio->id}}"> {{ $gremio->nombreGremio }}</option>
                        @endforeach                         
                     </select>
                     
                   </div>
                </li>
             </ul>   
             
           </li>

           {{-- FECHA REGISTRO--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Fecha de Registro</span>
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Fecha 
                     <input type="date"   wire:model="fechaRegistro" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" >
                     
                   </div>
                </li>
             </ul>   
             
           </li>

           {{--9 CONYUGE--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Conyuge</span>
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Tiene:
                           <x-checkbox  wire:model="conyuge" value="1"  class="ml-2" name="conyuge"/>
                   </div>
                </li>
             </ul>   
             
           </li>

           {{-- CONYUGE NACIMIENTO--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Fecha Nacimiento Conyuge</span>
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">                     
                     -Fecha :
                     <input type="date"   wire:model="fechaNacConyuge" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0">
                   </div>
                </li>
             </ul>   
             
           </li>


           {{--8 HIJOS--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Hijos</span>
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Tiene:
                           <x-checkbox  wire:model="hijos" value="1"  class="ml-2" name="hijos"/>
                   </div>
                </li>
             </ul>   
             
           </li>

           {{--8 HIJOS SEXO--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Sexo Hijos</span>
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">
                     -Sexo:
                           <select   wire:model="hijosSexo" class="w-fit  text-gray-700 rounded-md h-6 mx-1 text-xs py-0" > 
                         <option value="">Elija genero</option>                                                
                         <option value="M">Hombre</option>                        
                         <option value="F">Mujer</option>                        
                     </select>
                   </div>
                </li>
             </ul>   
             
           </li>
           

           {{--8 HIJOS RANGO--}}
           <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-1"  
            x-data="  {open:false}"     
            :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
            @click.outside="open = false"                            
                >                                                
                <div  class = "flex  justify-start items-center py-1 
                "                            
                  >                  
                                       
                    <span class="ml-2 lg:mr-8 " @click="open = !open">Por Hijos  Edad</span>
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" 
                        @click="open = ! open"
                        >
                        <g id="next">
                          <g> 
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                    <li class="pl-2  mb-1   py-0 hover:tet-gray-300 hovershadow-md hover:sadow-sky-600
                  " >
                  <div class="flex  text-sm items-center ml-1">                     
                     -Entre
                     <input  type="number" wire:model="desdeHijo" min="0"
                     class="w-14  text-gray-700 rounded-md h-6 mx-1 text-xs"              
                     />
                     y 
                      <input  type="number" wire:model="hastaHijo" min="0" class="w-14 text-gray-700 rounded-md h-6 ml-1 text-xs"    />

                           
                   </div>
                </li>
             </ul>   
             
           </li>

                          
            
            
            
            <button class="bg-gray-600 rounded-lg px-3 py-1   lg:mt-10 mt-6  text-base hover:bg-gray-700 hover:font-semibold" 
            wire:click="filter" 
            @click="openFilter = !openFilter" 
            >Aplicar filtros</button>

            
          </ul>                                     


  
  
  
</div>


