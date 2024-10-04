<div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
      <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('method',false)"></div>
                                                 
      <div  class=" bg-white border w border-gray-500   md:ma-w-[1000px]  lg:w-fit w-[96%]   z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] " >
                                                                    
              <div class="bg-ornge-200   text-gray-500  text-start ">
                  <div class="flex  flex-col justify-center items-center h-full ">
                                          
                            <h2 class="lg:text-2xl text-xl mb-0  w-full text-center py-1  border-b border-gray-300 text-white"  
                            style="{{$bg}}">                                          
                                {{$title  }} miembro
                              </h2>                                            
                                                                                                                              
                          <form class="flex flex-col max-w-[1200px] mx-auto w-full  pb-4  mb-0  lg:p-6 p-2  rounded-lg overflow-y-auto max-h-[85vh] " 
                            wire:submit={{$method}} 
                            >                                
                            @if ($method =="delete") 

                                <p class="text-center text-gray-600 lg:px-10 px-6">Esta seguro de eliminar el miembro  </p>
                                <p class="text-center text-gray-600 mb-6"><strong >"{{$name}}" </strong>?</p>
                                @else
                                                 

                            <div class="border- border-gray-300 shadow-l mb-6 rounded-lg bg-rd-200">
                            
                            <div class="grid lg:grid-cols-5 grid-cols-1 px-4 pb-4  space-y-2 space-x-4 pt-0 [&>div]:flex [&>div]:flex-col [&>div]:justify-end [&>div]:relative bg-reen-200 shadow-md"> 


                                  <div class=" -red-200  ml-4 ">
                                    <x-label for="name">Nombre</x-label>
                                      <input  class="h-7 rounded-lg mr-2" wire:model="name" />
                                      <x-input-error for="name"   class=" absolute top-full py-0 leading-[12px] text-xs"/>
                                  </div>

                                  

                                  <div class=" -green-200 ">
                                    <x-label for="apellido">Apellido</x-label>
                                        <input  class="h-7 rounded-lg mr-2" wire:model="apellido" />
                                        <x-input-error for="apellido"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div class="">
                                    <x-label for="">Documento</x-label>
                                        <input  class="h-7 rounded-lg mr-2" wire:model="documento" />
                                      <x-input-error for="documento"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    <x-label for="">Genero</x-label>
                                        <select wire:model="genero" class="h-7 rounded-lg mr-2 text-sm block py-0">
                                        <option value="">Elija un genero</option>
                                        <option value="hombre">Masculino</option>
                                        <option value="mujer">Femenino</option>
                                      </select>
                                      <x-input-error for="genero"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    <x-label for="">Fecha Nacimiento</x-label>
                                        <input type="date" class="h-7 rounded-lg mr-2" wire:model="fechaNac" />
                                      <x-input-error for="fechaNac"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>
                                  
                                  <div>
                                    <x-label for="">Dirección</x-label>
                                        <input  class="h-7 rounded-lg mr-2" wire:model="direccion" />
                                        <x-input-error for="direccion"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>
                                  <div >
                                    <x-label for="">Teléfono</x-label>
                                        <input  class="h-7 rounded-lg mr-2" wire:model="telefono" />
                                      <x-input-error for="telefono"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>
                                  <div>
                                    <x-label for="">Teléfono laboral</x-label>
                                        <input  class="h-7 rounded-lg mr-2" wire:model="telefonoLaboral" />
                                      <x-input-error for="telefonoLaboral"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                    </div>
                                    <div>
                                    <x-label for="">Email</x-label>
                                        <input  class="h-7 rounded-lg mr-2" wire:model="email" />
                                      <x-input-error for="email"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>
                                  
                                  <div>
                                    <x-label for="">Localidad</x-label>
                                        <input  class="h-7 rounded-lg mr-2" wire:model="localidad" />
                                      <x-input-error for="localidad"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                    </div>
                                    
                                    <div>
                                    <x-label for="">Fecha Afiliación</x-label>
                                        <input  type="date" class="h-7 rounded-lg mr-2" wire:model="fechaAfiliacion" />
                                      <x-input-error for="fechaAfiliacion"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    <x-label for="">Empresa</x-label>
                                    <select wire:model="empresaId" class="h-7 rounded-lg mr-2 text-sm block py-0">                
                                      <option value="">Elija empresa</option>
                                      @foreach ($empresas as $empresa)
                                          
                                      <option value="{{$empresa->id}}">{{$empresa->nombreEmpresa}}</option>
                                      @endforeach
                                      </select>
                                      <x-input-error for="empresaId"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                                  </div>

                                    <div>
                                    <x-label for="">Sector</x-label>
                                    <select wire:model="sectorId" class="h-7 rounded-lg mr-2 text-sm block py-0">                
                                      <option value="">Elija sector</option>
                                      @foreach ($sectores as $sector)
                                          
                                      <option value="{{$sector->id}}">{{$sector->nombreSector}}</option>
                                      @endforeach
                                      </select>
                                      <x-input-error for="sectorId"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                                  </div>

                                    <div>
                                    <x-label for="">Sindicato</x-label>
                                    <select wire:model="gremioId" class="h-7 rounded-lg mr-2 text-sm block py-0">                
                                      <option value="">Elija sindicato</option>
                                      @foreach ($gremios as $gremio)
                                          
                                      <option value="{{$gremio->id}}">{{$gremio->nombreGremio}}</option>
                                      @endforeach
                                      </select>
                                      <x-input-error for="gremioId"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                                  </div>


                                  <div>
                                    <x-label for="">Legajo</x-label>
                                        <input  class="h-7 rounded-lg mr-2" wire:model="legajo" />
                                      <x-input-error for="legajo"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                    </div>

                                  <div>
                                    
                                    <x-label for="">Condicion</x-label>
                                    <select wire:model.live="idCondicion" class="h-7 rounded-lg mr-2 text-sm block py-0">
                                        <option value="">Elija condicion</option>
                                        @foreach ($condiciones as $condicion)
                                            
                                        <option value="{{$condicion->id}}">{{$condicion->nombreCondicion}}</option>                                        
                                        @endforeach
                                      </select>
                                      <x-input-error for="idCondicion"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    
                                    <x-label for="">Rol </x-label>
                                    <select wire:model.live="idRol" class="h-7 rounded-lg mr-2 text-sm block py-0">                
                                        <option value="">Elija Rol</option>
                                        <option value="3">Miembro</option>
                                        <option value="2">Usuario pendiente revision</option>
                                      </select>
                                      <x-input-error for="idRol"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                                  </div>

                                  <div>
                                    
                                    <x-label for="">Estado </x-label>
                                    <select wire:model.live="estado" class="h-7 rounded-lg mr-2 text-sm block py-0">                
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                      </select>
                                      <x-input-error for="conyugue"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                                  </div>

                                  <div>
                                    
                                    <x-label for="">Conyugue </x-label>
                                    <select wire:model.live="conyugue" class="h-7 rounded-lg mr-2 text-sm block py-0">                
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                      </select>
                                      <x-input-error for="conyugue"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                                  </div>

                                  <div>
                                    
                                    <x-label for="">Hijos </x-label>
                                      <input    type="number" min="0" wire:model.live="hijos" class="h-7 rounded-lg mr-2"/>                               
                                  </div>

                                  <div>
                                    <x-label for="">Password</x-label>
                                      <input  class="h-7 rounded-lg mr-2" wire:model="password" />
                                      <x-input-error for="password"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>
                                  <div>
                                    <x-label for="">Confirmación Password</x-label>
                                      <input  class="h-7 rounded-lg mr-2" wire:model="password_confirmation" />
                                      <x-input-error for="password_confirmation"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>


                            </div> 
                            </div> 
                            
                            {{-- CONYUGUES --}}
                            @if ($conyugue)             
                            
                            
                            <div class="flex flex-col  max-w-[1050px] mx-auto lg:w-fit w-[90%]  border-2 border-gray-300 pb-4 shadow-lg mb-6 rounded-lg">
                                  <h2 class="bg-emerald-700   w-full py-1 text-lg font-semibold mb-4 pl-4 flex rounded-t-md text-white">
                                    <span>Conyugue</span>
                                    <button  type="button" wire:click="$set('conyugue','0')" class="ml-auto mr-4 text-red-600 font-semibold hover:text-red-800 hover:font-bold text-xl">X</button>
                                  
                                  </h2>
                            <div class="grid lg:grid-cols-5 grid-cols-1 px-4">
                                  <div>
                                    <x-label for="">Nombre</x-label>
                                      <input  class="h-7 rounded-lg mr-2 lg:w-auto w-full" wire:model="nombreConyugue" />
                                      <x-input-error for="nombreConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>
                                  <div>
                                    <x-label for="">Apellido</x-label>
                                      <input  class="h-7 rounded-lg mr-2 lg:w-auto w-full" wire:model="apellidoConyugue" />
                                      <x-input-error for="apellidoConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>
                                  <div>
                                    <x-label for="">Documento</x-label>
                                      <input  class="h-7 rounded-lg mr-2 lg:w-auto w-full" wire:model="documentoConyugue" />
                                      <x-input-error for="documentoConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>
                                  <div class="flex flex-col">
                                    <x-label for="">Genero</x-label>
                                      <select wire:model="generoConyugue" class="h-7 rounded-lg mr-2 text-sm block py-0 lg:w-auto w-full">
                                        <option value="">Elija un genero</option>
                                        <option value="hombre">Hombre</option>
                                        <option value="mujer">Mujer</option>
                                      </select>
                                      <x-input-error for="generoConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>

                                  <div>
                                    <x-label for="">Fecha Nacimiento</x-label>
                                    <input type="date" class="h-7 rounded-lg mr-2 lg:w-auto w-full" wire:model="fechaNacConyugue" />
                                      <x-input-error for="fechaNacConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>

                            </div>
                            </div>
                            @endif

                                                {{-- HIJOS --}}    
                                                @for ($i = 0; $i < $hijos; $i++)
                                                
                                                <div class="flex flex-col  max-w-[1050px] mx-auto lg:w-fit w-[90%]  border-2 border-gray-300 pb-4 shadow-lg mb-4 rounded-lg">
                                                      <h2 class="bg-red-300 wfull py-1 text-lg font-semibold mb-4 pl-4 flex rounded-t-md text-white">Hijo {{$i +1}}
                                                        
                                                        
                                                        <button type="button" class="text-red-600 ml-auto mr-4 font-semibold hover:text-red-800 hover:font-bold text-xl"
                                                      wire:click="removeHijo({{ $i }})">X</button>
                                                      </h2>

                                                <div class="grid lg:grid-cols-5 grid-cols-1 px-4 bg-re-200 ">

                                                  
                                                      <div>
                                                        <x-label for="">Nombre</x-label>                          
                                                          <input  class="h-7 rounded-lg mr-2 lg:w-auto w-full " wire:model="hijosData.{{ $i }}.nombre" />
                                                          <x-input-error for="hijosData.{{$i}}.nombre"   class=" top-full py-0 leading-[12px]"/>
                                                          
                                                        </div>
                                                      

                                                      <div>
                                                        <x-label for="">Apellido</x-label>
                                                          <input type="text" class="h-7 rounded-lg mr-2 lg:w-auto w-full" wire:model="hijosData.{{ $i }}.apellido" />
                                                          <x-input-error for="hijosData.{{$i}}.apellido"   class=" top-full py-0 leading-[12px]"/>
                                                      </div>
                                                      <div>
                                                        <x-label for="">Documento</x-label>
                                                          <input type="text" class="h-7 rounded-lg mr-2 lg:w-auto w-full" wire:model="hijosData.{{ $i }}.documento" />
                                                          <x-input-error for="hijosData.{{$i}}.documento"   class=" top-full py-0 leading-[12px]"/>
                                                      </div>

                                                      <div class="bg--500 relative flex flex-col">
                                                        <x-label for="">Genero</x-label>
                                                        <select wire:model="hijosData.{{ $i }}.genero" class="h-7 rounded-lg mr-2 text-sm block py-0 lg:w-auto w-full">
                                                            <option value="">Elija un genero</option>
                                                            <option value="M">Hombre</option>
                                                            <option value="F">Mujer</option>
                                                          </select>
                                                          <x-input-error for="hijosData.{{$i}}.genero"   class=" top-full py-0 leading-[12px]"/>
                                                      </div>

                                                      <div >
                                                        <x-label for="">Fecha Nacimiento</x-label>
                                                          <input  type="date" wire:model="hijosData.{{ $i }}.fechaNac"  class="h-7 rounded-lg  lg:w-auto w-full"/>
                                                          <x-input-error for="hijosData.{{$i}}.fechaNac"   class=" top-full py-0 leading-[12px]"/>
                                                      </div>

                                                </div>
                                                </div>
                                                @endfor


                                                @endif
                                              
                                                <div class="flex justify-center gap-x-12"> 
                                                  
                                                  <button type="button" wire:click="$parent.$set('method',false)"                      
                                                      class="px-6 py-1.5 bg-red-500 text-white w-fit  rounded-lg hover:bg-red-600">Cancelar  
                                                  </button >

                                                  <button   class="px-6 py-1.5 bg-green-500 text-white w-fit  rounded-lg hover:bg-green-600">{{$btnText}}</button>
                                                 </div>


                                              
                                    </form>                                          
                                            

                            </div>            
                              </div>

                        </div>
                                                        
  </div>
