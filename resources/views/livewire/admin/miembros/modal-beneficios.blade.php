<div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
      <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('method',false)"></div>
                                                 
      <div  class=" bg-white border w border-gray-500   md:max-w-md  lg:w-1/3 w-[96%] x-auto  z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] overflow-y-auto " >
        
            <div class="bg-white  pb-6 text-gray-500  text-start ">
                  <div class="flex  flex-col justify-center items-center  ">                                                 
                        
                        <h2 class="lg:text-2xl text-xl mb-4  w-full text-center py-1  border-b border-gray-300 text-white"  style="{{$bg}}">
                            {{$title}} beneficio
                        </h2>                        
                        
                        <form class="bg-red-80  w-full  flex flex-col gap-2 lg:text-lg  text-base lg:px-4 px-2 text-gray-200  [&>div]:flex [&>div]:justify-center pt-2 "  wire:submit={{$method}} >
                                                  
                          @if ($method =="delete")
                              <p class="text-center text-gray-600 lg:px-10 px-6">Esta seguro de quitar el beneficio  </p>
                              <p class="text-center text-gray-600"><strong >"{{$this->beneficioM->beneficio->nombre}}" </strong>?</p>
                          @else

                            <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto ">
                              <label  class="w-full text-start text-gray-500  leading-[16px] text-base">Beneficio </label>

                              <div class="relative w-full">
                                <select  wire:model.live="idBeneficio" class ="h-7 py-0 rounded-md border border-gray-400 w-full text-gray-700 text-sm "    {{ $method == 'update' ? 'disabled' : '' }}>
                                  <option value="">Elija beneficio</option>
                                  @foreach ($beneficios as $beneficio)                                                    
                                  <option value="{{$beneficio->id}}">{{$beneficio->nombre}}</option>                                                        
                                  @endforeach
                                </select>                                                  
                                <x-input-error for="idBeneficio"   class="absolute top-full py-0 leading-[12px] text-xs"/>
                                <x-input-error for="beneficio_condicion"   class="absolute top-full py-0 leading-[12px] text-xs"/>                                                  
                                <x-input-error for="exists"   class="absolute top-full py-0 leading-[12px] text-xs"/>                                                  
                              </div>
                            </div>

                            <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto ">
                              <label  class="w-full text-start text-gray-500 mt-2 leading-[16px] text-base">Comentario</label>
                              <div class="relative w-full">
                                <input type="text" wire:model="comentario" class ="h-6 rounded-md border border-gray-400 w-full text-gray-500" />
                                <x-input-error for="comentario"   class="absolute top-full py-0 leading-[12px]"/>
                              </div>
                            </div>

                            <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto ">
                              <label  class="w-full text-start text-gray-500 mt-2 leading-[16px] text-base">Valido desde</label>
                              <div class="relative w-full">
                                <input type="date" wire:model="fechaDesde" class ="h-6 rounded-md border border-gray-400 w-full text-gray-500" disabled/>
                                <x-input-error for="fechaDesde"   class="absolute top-full  py-0 leading-[12px]"/>
                              </div>
                            </div>

                            <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto ">
                              <label  class="w-full text-start text-gray-500 mt-2 leading-[16px] text-base">Valido hasta</label>
                              <div class="relative w-full">
                                <input type="date" wire:model="fechaHasta" class ="h-6 rounded-md border border-gray-400 w-full text-gray-500" disabled/>
                                <x-input-error for="fechaHasta"   class="absolute top-full  py-0 leading-[12px]"/>
                              </div>
                            </div>
                            
                            

                            <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto text-gray-500">
                              <label  class="w-full text-start text-gray-500 mt-2 leading-[16px] text-base">Reutilizable</label>
                              <div class="relative w-full ">
                                  <select   wire:model="reutilizable" class="h-6 rounded-md border border-gray-400 w-full text-gray-500 text-sm py-0.5 "disabled>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                  </select>
                                <x-input-error for="reutilizable"   class="absolute top-full"/>
                              </div>
                            </div>

                            <div class="flex flex-col   items-start lg:w-2/3 w-[85%] mx-auto ">
                              <label  class="w-full text-start text-gray-500 mt-2 leading-[16px] text-base">Cantidad de usos</label>
                              <div class="relative w-full">
                                <input type="number"   wire:model="cantUsos"  
                                class ="h-6  rounded-md border border-gray-400 w-full text-gray-500 {{ $reutilizable == '0' ? 'bg-gray-50 opacity-70 ' : '' }}"   disabled/>
                              </div>
                            </div>
                
                              @endif

                              <div class="flex gap-6 justify-center lg:text-base text-sm"> 
                                
                                <button  type="button" class="bg-orange-600 hover:bg-orange-700 mt-4 rounded-lg px-2 lg:py-1 py-0.5 "
                                  wire:click="$parent.$set('method',false)">                                
                                  Cancelar
                                </button >
                                                                
                                <button  class="bg-green-600 hover:bg-green-700 mt-4 rounded-lg px-2 lg:py-1 py-0.5 flex text-center items-center " >
                                      {{$btnText}}                                      
                                </button >   
                              
                              </div>
                          </form> 
                          

                </div>            
            </div>

        </div>
                                                        
  </div>