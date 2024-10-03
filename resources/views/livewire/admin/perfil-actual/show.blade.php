<div  class=" flex justify-center w-full fullscreen items-center bg-gray-50 relative" >
  <x-action-message on="UserUpdated" class="bg-orange-500  border-orange-700 absolute top-0 left-0 z-10" >
                Perfil actualizado con exitó.</x-action-message> 
              
                  <div class="flex  flex-col justify-center items-center    mx-auto h-fit lg:w-auto w-[95%] border shadow-lg">
                                          
                            <h2 class=" text-xl mb-0  w-full text-center py-1  border-b border-gray-300 text-white font-semibold"  
                            style="{{$bg}}">                                          
                                {{$title  }} perfil
                              </h2>                                            
                                                                 
                              
                          <form class="flex flex-col max-w-[1200px] mx-auto w-full  pb-4  mb-0  lg:p-6 p-2  rounded-lg overflow-y-auto max-h-[85vh] " 
                            wire:submit={{$method}} 
                            >                                                                                                           

                            <div class="border- border-gray-300 lg:shadow-md mb-6 rounded-lg bg-white">
                            
                            <div class="grid lg:grid-cols-5 grid-cols-1 px-4 pb-4  space-y-2 space-x-4 pt-0 [&>div]:flex [&>div]:flex-col [&>div]:justify-end [&>div]:relative bg-reen-200 lg:shadow-md"> 


                                  <div class=" -red-200  ml-4 ">
                                    <x-label for="name">Nombre</x-label>
                                      <input wire:model="name" {{ $method == 'show' ? 'disabled' : '' }}
                                       class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                       />
                                      <x-input-error for="name"   class=" absolute top-full py-0 leading-[12px] text-xs"/>
                                  </div>

                                  

                                  <div class=" -green-200 ">
                                    <x-label for="apellido">Apellido</x-label>
                                        <input wire:model="apellido"  {{ $method == 'show' ? 'disabled' : '' }}
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                         />
                                        <x-input-error for="apellido"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div class="">
                                    <x-label for="">Documento</x-label>
                                        <input wire:model="documento"  {{ $method == 'show' ? 'disabled' : '' }}
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                        />
                                      <x-input-error for="documento"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    <x-label for="">Genero</x-label>
                                        <select wire:model="genero" class="h-7 rounded-lg mr-2 text-sm block py-0"    {{ $method == 'show' ? 'disabled' : '' }}  >
                                        <option value="">Elija un genero</option>
                                        <option value="hombre">Masculino</option>
                                        <option value="mujer">Femenino</option>
                                      </select>
                                      <x-input-error for="genero"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    <x-label for="">Fecha Nacimiento</x-label>
                                        <input type="date"  wire:model="fechaNac"  {{ $method == 'show' ? 'disabled' : '' }}
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                        />
                                      <x-input-error for="fechaNac"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>
                                  
                                  <div>
                                    <x-label for="">Dirección</x-label>
                                        <input wire:model="direccion"  {{ $method == 'show' ? 'disabled' : '' }}
                                         class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                          />
                                        <x-input-error for="direccion"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>
                                  <div >

                                    <x-label for="">Teléfono</x-label>
                                        <input  wire:model="telefono"  {{ $method == 'show' ? 'disabled' : '' }}
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                        />
                                      <x-input-error for="telefono"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    <x-label for="">Teléfono laboral</x-label>
                                        <input  wire:model="telefonoLaboral"  {{ $method == 'show' ? 'disabled' : '' }}
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                        />
                                      <x-input-error for="telefonoLaboral"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                    </div>

                                    <div>
                                    <x-label for="">Email</x-label>
                                        <input  wire:model="email"  {{ $method == 'show' ? 'disabled' : '' }}
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}" 
                                        />
                                      <x-input-error for="email"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>
                                  
                                  <div>
                                    <x-label for="">Localidad</x-label>
                                        <input  wire:model="localidad"  {{ $method == 'show' ? 'disabled' : '' }}
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                        />
                                      <x-input-error for="localidad"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                    </div>
                                    
                                    <div>
                                    <x-label for="">Fecha Afiliación</x-label>
                                        <input  type="date"  wire:model="fechaAfiliacion"  {{ $method == 'show' ? 'disabled' : '' }}
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                        />
                                      <x-input-error for="fechaAfiliacion"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    <x-label for="">Empresa</x-label>
                                    <select wire:model="empresaId" class="h-7 rounded-lg mr-2 text-sm block py-0"  {{ $method == 'show' ? 'disabled' : '' }}  >
                                      <option value="">Elija empresa</option>
                                      @foreach ($empresas as $empresa)
                                          
                                      <option value="{{$empresa->id}}">{{$empresa->nombreEmpresa}}</option>
                                      @endforeach
                                      </select>
                                      <x-input-error for="empresaId"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                    <div>
                                    <x-label for="">Sector</x-label>
                                    <select wire:model="sectorId" class="h-7 rounded-lg mr-2 text-sm block py-0"  {{ $method == 'show' ? 'disabled' : '' }}  > 
                                      <option value="">Elija sector</option>
                                      @foreach ($sectores as $sector)
                                          
                                      <option value="{{$sector->id}}">{{$sector->nombreSector}}</option>
                                      @endforeach
                                      </select>
                                      <x-input-error for="sectorId"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                    <div>
                                    <x-label for="">Sindicato</x-label>
                                    <select wire:model="gremioId" class="h-7 rounded-lg mr-2 text-sm block py-0"  {{ $method == 'show' ? 'disabled' : '' }}  >
                                      <option value="">Elija sindicato</option>
                                      @foreach ($gremios as $gremio)
                                          
                                      <option value="{{$gremio->id}}">{{$gremio->nombreGremio}}</option>
                                      @endforeach
                                      </select>
                                      <x-input-error for="gremioId"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>


                                  <div>
                                    <x-label for="">Legajo</x-label>
                                        <input   wire:model="legajo"  {{ $method == 'show' ? 'disabled' : '' }} 
                                        class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                        />
                                      <x-input-error for="legajo"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                    </div>

                                  
                                  

                                  <div>
                                    
                                    <x-label for="">Conyugue </x-label>
                                    <select wire:model.live="conyugue" class="h-7 rounded-lg mr-2 text-sm block py-0"  {{ $method == 'show' ? 'disabled' : '' }}  >
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                      </select>
                                      <x-input-error for="conyugue"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                                  </div>

                                  <div>
                                    
                                    <x-label for="">Hijos </x-label>
                                      <input    type="number" min="0" wire:model.live="hijos"  {{ $method == 'show' ? 'disabled' : '' }}  
                                      class="h-7 rounded-lg mr-2 {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"/> 
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
                            
                            {{-- CONYUGUES --}}
                            @if ($conyugue)             
                            
                            
                            <div class="flex flex-col  max-w-[1050px] mx-auto lg:w-fit w-[90%]  border-2 border-gray-300 pb-4 shadow-lg mb-3 rounded-lg">
                                  <h2 class="bg-emerald-700   w-full py-1 text-base font-semibold mb-4 pl-4 flex rounded-t-md text-white">
                                    <span>Conyugue</span>
                                    @if ($method == "edit")                                    
                                    <button  type="button" wire:click="$set('conyugue','0')" class="ml-auto mr-4 text-red-600 font-semibold hover:text-red-800 hover:font-bold text-xl">X</button>                                    
                                    @endif

                                  </h2>
                            <div class="grid lg:grid-cols-5 grid-cols-1 px-4">
                                  <div>
                                    <x-label for="">Nombre</x-label>
                                    
                                      <input  class="h-7 rounded-lg mr-2 lg:w-auto w-full {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                       wire:model="nombreConyugue"  {{ $method == 'show' ? 'disabled' : '' }}/>
                                      <x-input-error for="nombreConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>
                                  <div>
                                    <x-label for="">Apellido</x-label>
                                      <input  class="h-7 rounded-lg mr-2 lg:w-auto w-full {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                      wire:model="apellidoConyugue"  {{ $method == 'show' ? 'disabled' : '' }}/>
                                      <x-input-error for="apellidoConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>
                                  <div>
                                    <x-label for="">Documento</x-label>
                                      <input  class="h-7 rounded-lg mr-2 lg:w-auto w-full {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                      wire:model="documentoConyugue"  {{ $method == 'show' ? 'disabled' : '' }}/>
                                      <x-input-error for="documentoConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>
                                  <div class="flex flex-col">
                                    <x-label for="">Genero</x-label>
                                      <select wire:model="generoConyugue" class="h-7 rounded-lg mr-2 text-sm block py-0 lg:w-auto w-full"  {{ $method == 'show' ? 'disabled' : '' }}  >
                                        <option value="">Elija un genero</option>
                                        <option value="hombre">Hombre</option>
                                        <option value="mujer">Mujer</option>
                                      </select>
                                      <x-input-error for="generoConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>

                                  <div>
                                    <x-label for="">Fecha Nacimiento</x-label>
                                    <input type="date" class="h-7 rounded-lg mr-2 lg:w-auto w-full {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                    wire:model="fechaNacConyugue"  {{ $method == 'show' ? 'disabled' : '' }}/>
                                      <x-input-error for="fechaNacConyugue"   class=" top-full py-0 leading-[12px]"/>
                                  </div>

                            </div>
                            </div>
                            @endif

                                                {{-- HIJOS --}}    
                                                @for ($i = 0; $i < $hijos; $i++)
                                                
                                                <div class="flex flex-col  max-w-[1050px] mx-auto lg:w-fit w-[90%]  border-2 border-gray-300 pb-4 shadow-lg mb-3 rounded-lg">
                                                      <h2 class="bg-red-300 wfull py-1 text-base font-semibold mb-4 pl-4 flex rounded-t-md text-white">Hijo {{$i +1}}
                                                        
                                                        @if ($method == "edit")                                    
                                                              <button type="button" class="text-red-600 ml-auto mr-4 font-semibold hover:text-red-800 hover:font-bold text-xl"
                                                                wire:click="removeHijo({{ $i }})">X</button>
                                                          @endif
                      
                                                      </h2>

                                                <div class="grid lg:grid-cols-5 grid-cols-1 px-4 bg-re-200 ">

                                                  
                                                      <div>
                                                        <x-label for="">Nombre</x-label>                          
                                                          <input  class="h-7 rounded-lg mr-2 lg:w-auto w-full {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                                          wire:model="hijosData.{{ $i }}.nombre"  {{ $method == 'show' ? 'disabled' : '' }}/>
                                                          <x-input-error for="hijosData.{{$i}}.nombre"   class=" top-full py-0 leading-[12px]"/>
                                                          
                                                        </div>
                                                      

                                                      <div>
                                                        <x-label for="">Apellido</x-label>
                                                          <input type="text" class="h-7 rounded-lg mr-2 lg:w-auto w-full {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                                           wire:model="hijosData.{{ $i }}.apellido"  {{ $method == 'show' ? 'disabled' : '' }}/>
                                                          <x-input-error for="hijosData.{{$i}}.apellido"   class=" top-full py-0 leading-[12px]"/>
                                                      </div>
                                                      <div>
                                                        <x-label for="">Documento</x-label>
                                                          <input type="text" class="h-7 rounded-lg mr-2 lg:w-auto w-full {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                                           wire:model="hijosData.{{ $i }}.documento" {{ $method == 'show' ? 'disabled' : '' }} />
                                                          <x-input-error for="hijosData.{{$i}}.documento"   class=" top-full py-0 leading-[12px]"/>
                                                      </div>

                                                      <div class="bg--500 relative flex flex-col">
                                                        <x-label for="">Genero</x-label>
                                                        <select wire:model="hijosData.{{ $i }}.genero" class="h-7 rounded-lg mr-2 text-sm block py-0 lg:w-auto w-full"  {{ $method == 'show' ? 'disabled' : '' }}  >
                                                            <option value="">Elija un genero</option>
                                                            <option value="hombre">Hombre</option>
                                                            <option value="mujer">Mujer</option>
                                                          </select>
                                                          <x-input-error for="hijosData.{{$i}}.genero"   class=" top-full py-0 leading-[12px]"/>
                                                      </div>

                                                      <div >
                                                        <x-label for="">Fecha Nacimiento</x-label>
                                                          <input  type="date" wire:model="hijosData.{{ $i }}.fechaNac"  
                                                          class="h-7 rounded-lg  lg:w-auto w-full {{ $method == 'show' ? 'bg-gray-50 opacity-70 ' : '' }}"
                                                           {{ $method == 'show' ? 'disabled' : '' }}/>
                                                          <x-input-error for="hijosData.{{$i}}.fechaNac"   class=" top-full py-0 leading-[12px]"/>
                                                      </div>

                                                </div>
                                                </div>
                                                @endfor

                                                
                                              
                                                <div class="flex justify-center gap-x-12"> 
                                              
                                                  @if ($method == "edit")
                                                      <button type="button" wire:click="option('show')"
                                                      class="px-6 py-1.5 bg-red-500 text-white w-fit  rounded-lg hover:bg-red-600">Cancelar  

                                                      </button >
                                                      
                                                        <button   class="px-6 py-1.5 bg-green-500 text-white w-fit  rounded-lg hover:bg-green-600" wire:click="edit">Guardar</button>
                                                        @else

                                                        <button   type="button"  class="px-6 py-1.5 bg-green-500 text-white w-fit  rounded-lg hover:bg-green-600" wire:click="option('edit')">Editar</button>
                                                  @endif
                                                 </div>


                                              
                                    </form>                                          
                                            


                              </div>
                              </div>

                        

  
