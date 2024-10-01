<table class="min-w-full divide-y  divide-gray-400   p-1">  
                                                  <thead>

                                                    
                                                        
                                                    <tr class="bg-gray-100 relative text-gray-600 font-bold divide-x-2 [&>th]:px-2  [&>th]:text-start text-sm ">
                                                        
                                                      @if(in_array('id', $selectedColumns))
                                                      <th scope="col" >
                                                        ID
                                                      </th>
                                                      @endif

                                                      @if(in_array('name', $selectedColumns))
                                                      <th scope="col" >
                                                        Nombre
                                                      </th>
                                                      @endif
                                                      
                                                      @if(in_array('apellido', $selectedColumns))
                                                      <th scope="col">Apellido</th>
                                                      @endif
                                                      
                                                      @if(in_array('documento', $selectedColumns))
                                                      <th scope="col" >Dni</th>
                                                      @endif
                                                      
                                                      @if(in_array('empresa', $selectedColumns))
                                                      <th scope="col" >Empresa</th>
                                                      @endif                                                      
                                                      
                                                      @if(in_array('sector', $selectedColumns))
                                                      <th scope="col" >Sector</th>
                                                      @endif

                                                      @if(in_array('gremio', $selectedColumns))
                                                      <th scope="col" >Gremio</th>
                                                      @endif

                                                      @if(in_array('email', $selectedColumns))
                                                      <th scope="col" >Email</th>
                                                      @endif

                                                      @if(in_array('telefono', $selectedColumns))
                                                      <th scope="col" >Telefono</th>
                                                      @endif

                                                      @if(in_array('genero', $selectedColumns))
                                                      <th scope="col" >Genero</th>
                                                      @endif

                                                      @if(in_array('localidad', $selectedColumns))
                                                      <th scope="col" >Localidad</th>
                                                      @endif

                                                      @if(in_array('direccion', $selectedColumns))
                                                      <th scope="col" >Direccion</th>
                                                      @endif

                                                      @if(in_array('fechaNac', $selectedColumns))
                                                      <th scope="col" >Fecha Nac</th>
                                                      @endif

                                                      @if(in_array('fechaAfi', $selectedColumns))
                                                      <th scope="col" >Fecha Afiliacion</th>
                                                      @endif
                                                      


                                                      @if(in_array('rol', $selectedColumns))
                                                      <th scope="col" >Rol</th>
                                                      @endif
                                                      
                                                      @if(in_array('estado', $selectedColumns))
                                                      <th scope="col" >Estado</th>
                                                      @endif

                                                      @if(in_array('condicion', $selectedColumns))
                                                      <th scope="col" >Condicion</th>
                                                      @endif



                                                      @if(in_array('conyuge', $selectedColumns))
                                                      <th scope="col" >Conyuge</th>
                                                      @endif

                                                      @if(in_array('conyugeNom', $selectedColumns))
                                                      <th scope="col" >Conyuge Nombre</th>
                                                      @endif

                                                      @if(in_array('conyugeApe', $selectedColumns))
                                                      <th scope="col" >Conyuge Apellido</th>
                                                      @endif

                                                      @if(in_array('conyugeDni', $selectedColumns))
                                                      <th scope="col" >Conyuge Dni</th>
                                                      @endif


                                                      @if(in_array('hijosCant', $selectedColumns))
                                                      <th scope="col" >Hijo Cant</th>
                                                      @endif

                                                      @if(in_array('hijoNombre', $selectedColumns))
                                                      <th scope="col" >Hijo Nombre</th>
                                                      @endif

                                                      @if(in_array('hijoApellido', $selectedColumns))
                                                      <th scope="col" >Hijo Apellido</th>
                                                      @endif

                                                      @if(in_array('hijoDni', $selectedColumns))
                                                      <th scope="col" >Hijo dni</th>
                                                      @endif

                                                      @if(in_array('hijoGenero', $selectedColumns))
                                                      <th scope="col" >Hijo Genero</th>
                                                      @endif

                                                      @if(in_array('hijoEdad', $selectedColumns))
                                                      <th scope="col" >Hijo Edad</th>
                                                      @endif
                                                      
                                                      @if(in_array('accion', $selectedColumns))
                                                      <th scope="col" class="lg:w-[140px] w-[90px]">Accion</th>
                                                      @endif
                                                        
                                                      </tr>
                                                  </thead>

                                                  <tbody class="divide-y divide-gray-300 text-gray-500  text-sm">

                                                    @foreach ($usuarios as $usuario)
                                                    <tr class="divide-x-2 [&>td]:pl-2 [&>td]:pr-1 [&>td]:py-1  [&>td]:text-start ">

                                                      @if(in_array('id', $selectedColumns)) 
                                                        <td  >{{ $usuario->id }}</td> 
                                                      @endif

                                                      @if(in_array('name', $selectedColumns))
                                                        <td  >{{ $usuario->name }}</td>
                                                      @endif

                                                      @if(in_array('apellido', $selectedColumns)) 
                                                       <td  >{{ $usuario->apellido }}</td>
                                                       @endif
                                                      
                                                      @if(in_array('documento', $selectedColumns))
                                                      <td  >{{ $usuario->documento }}</td>
                                                      @endif

                                                      @if(in_array('empresa', $selectedColumns))
                                                      <td  >{{ $usuario->empresa?->nombreEmpresa }}</td>
                                                      @endif
                                                      
                                                      @if(in_array('sector', $selectedColumns))
                                                      <td  >{{ $usuario->sector?->nombreSector }}</td>
                                                      @endif

                                                      @if(in_array('gremio', $selectedColumns))
                                                      <td  >{{ $usuario->gremio?->nombreGremio }}</td>
                                                      @endif

                                                      @if(in_array('email', $selectedColumns))
                                                      <td  >{{ $usuario->email}}</td>
                                                      @endif

                                                      @if(in_array('telefono', $selectedColumns))
                                                      <td >{{ $usuario->telefono}}</td>
                                                      @endif

                                                      @if(in_array('genero', $selectedColumns))
                                                      <td >{{ $usuario->sexo}}</td>
                                                      @endif

                                                      @if(in_array('localidad', $selectedColumns))
                                                      <td >{{ $usuario->localidad}}</td>
                                                      @endif
                                                      
                                                      @if(in_array('direccion', $selectedColumns))
                                                      <td >{{ $usuario->direccion}}</td>
                                                      @endif

                                                      @if(in_array('fechaNac', $selectedColumns))
                                                      <td >
                                                        {{-- {{ $usuario->fNac}} --}}
                                                        {{ \Carbon\Carbon::parse($usuario->fNac)->format('Y-m-d') }}
                                                      </td>
                                                      @endif

                                                      @if(in_array('fechaAfi', $selectedColumns))
                                                      <td >{{ \Carbon\Carbon::parse($usuario->fechaAfiliacion)->format('Y-m-d') }}</td>
                                                      @endif

                                                      
                                                      
                                                      @if(in_array('rol', $selectedColumns))
                                                      <td >{{ $usuario->role?->name }}</td>
                                                      @endif
                                                      

                                                      
                                                      @if(in_array('estado', $selectedColumns))
                                                      <td  class="text-white">
                                                        @if ($usuario->estado)
                                                        <span class="bg-green-500 px-1 py-0.5 rounded-md">Activo</span>
                                                        @else
                                                        <span class="bg-red-300 px-1 py-0.5 rounded-md">Inactivo</span>
                                                        @endif 
                                                      </td>
                                                      @endif


                                                      @if(in_array('condicion', $selectedColumns))
                                                      <td >{{ $usuario->condicion?->nombreCondicion }}</td>                                                      
                                                      @endif

                                                      
                                                      @if(in_array('conyuge', $selectedColumns))                                                      
                                                      <td >                                                          
                                                          {{$usuario->conyuge?->exists() ? 'Sí' : 'No'}}
                                                      </td>
                                                      @endif

                                                      @if(in_array('conyugeNom', $selectedColumns))                                                      
                                                      <td >                                                          
                                                          {{$usuario->conyuge?->nombre}}                                                                                                                  
                                                      </td>
                                                      @endif

                                                      @if(in_array('conyugeApe', $selectedColumns))                                                      
                                                      <td >                                                          
                                                          {{$usuario->conyuge?->apellido}}                                                                                                                  
                                                      </td>
                                                      @endif

                                                      @if(in_array('conyugeDni', $selectedColumns))                                                      
                                                      <td >                                                          
                                                          {{$usuario->conyuge?->documento}}                                                                                                                  
                                                      </td>
                                                      @endif

                                                      @if(in_array('hijosCant', $selectedColumns))                                                      
                                                      <td >                                                                                                                
                                                        
                                                          
                                                          {{$usuario->hijos->count()}}
                                                          
                                                        
                                                      </td>                                                      
                                                      @endif

                                                      @if(in_array('hijoNombre', $selectedColumns))                                                      
                                                      <td >                                                                                                                
                                                        <ul class="divide-y  divide-gray-200 lg:ml-[-10px] ml-[-8px] ">
                                                          @foreach ($usuario->hijos as $hijo)
                                                          <li class="pl-2">{{$hijo->nombre}}</li>                                                                                                                    
                                                          @endforeach                                                          
                                                        </ul>
                                                      </td>                                                      
                                                      @endif

                                                      @if(in_array('hijoApellido', $selectedColumns))                                                      
                                                      <td >                                                                                                                
                                                        <ul class="divide-y  divide-gray-200 lg:ml-[-10px] ml-[-8px]">
                                                          @foreach ($usuario->hijos as $hijo)
                                                          <li class="pl-2">{{$hijo->apellido}}</li>                                                                                                                    
                                                          @endforeach                                                          
                                                        </ul>
                                                      </td>                                                      
                                                      @endif

                                                      @if(in_array('hijoDni', $selectedColumns))                                                      
                                                      <td >                                                                                                                
                                                        <ul class="divide-y  divide-gray-200  lg:ml-[-10px] ml-[-8px]">
                                                          @foreach ($usuario->hijos as $hijo)
                                                          <li class="pl-2">{{$hijo->dni}}</li>                                                                                                                    
                                                          @endforeach                                                          
                                                        </ul>
                                                      </td>                                                      
                                                      @endif

                                                      @if(in_array('hijoGenero', $selectedColumns))                                                      
                                                      <td >                                                                                                                
                                                        <ul class="divide-y  divide-gray-200  lg:ml-[-10px] ml-[-8px]">
                                                          @foreach ($usuario->hijos as $hijo)
                                                          <li class="pl-2">  {{ $hijo->sexo == "F" ? "Mujer" : ($hijo->sexo == "M" ? "Hombre" : "") }}</li>                                                                                                                    
                                                          @endforeach                                                          
                                                        </ul>
                                                      </td>                                                      
                                                      @endif

                                                      @if(in_array('hijoEdad', $selectedColumns))                                                      
                                                      <td >                                                                                                                
                                                        <ul class="divide-y  divide-gray-200  lg:ml-[-10px] ml-[-8px]">
                                                          @foreach ($usuario->hijos as $hijo)
                                                           @php
                                                                $birthDate = new DateTime($hijo->fNac);
                                                                $currentDate = new DateTime();
                                                                $age = $currentDate->diff($birthDate)->y;
                                                            @endphp
                                                            <li class="pl-2">
                                                                {{ $age }} años                         
                                                            </li>
                                                          @endforeach                                                          
                                                        </ul>
                                                      </td>                                                      
                                                      @endif
                                                        
                                                      


                                                      @if(in_array('accion', $selectedColumns))
                                                      <td >
                                                        <div class="flex justfy-end lg:gap-x-4 gap-x-2 text-white text-xs">

                                                        
                                                          <button 
                                                              class=" hover:text-gray-200  hover:bg-red-600 flex items-center py-0.5 bg-red-500 rounded-lg px-1 " wire:click="option('delete',{{$usuario->id}})"  title="Eliminar">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                                                                </svg>                                                        
                                                              {{-- <span class="hidden lg:block">Eliminar</span> --}}
                                                          </button>

                                                      <button class=" hover:text-gray-200 hover:bg-orange-600 flex items-center py-0.5 bg-orange-500 rounded-lg px-1 " wire:click="option('update',{{$usuario->id}})" title="Editar">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#ffffff"/>
                                                          </svg>
                                                        {{-- <span class="hidden lg:block">Editar</span> --}}
                                                      </button>

                                                      <a href="{{Route('miembro-beneficios',$usuario->id)}}" class="  hover:bg-green-600 flex items-center py-0.5 bg-green-500 rounded-lg px-1 "  title="Asignar beneficio">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                                              <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                              <g id="SVGRepo_iconCarrier"> <path d="M15.197 3.35462C16.8703 1.67483 19.4476 1.53865 20.9536 3.05046C22.4596 4.56228 22.3239 7.14956 20.6506 8.82935L18.2268 11.2626M10.0464 14C8.54044 12.4882 8.67609 9.90087 10.3494 8.22108L12.5 6.06212" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"/> <path d="M13.9536 10C15.4596 11.5118 15.3239 14.0991 13.6506 15.7789L11.2268 18.2121L8.80299 20.6454C7.12969 22.3252 4.55237 22.4613 3.0464 20.9495C1.54043 19.4377 1.67609 16.8504 3.34939 15.1706L5.77323 12.7373" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"/> </g>
                                                              </svg>                                                        
                                                            </a>
                                                      </div>
                                                    </td>
                                                    @endif
                                                  </tr>
                                                  @endforeach

                                                      

                                                  </tbody>
                                              </table>
