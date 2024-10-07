<div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
      <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('method',false)"></div>
                                                 
      <div  class=" bg-white border w border-gray-500   md:ma-w-[1000px]  lg:w-fit w-[96%]   z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] " >
                                                                    
              <div class="bg-ornge-200   text-gray-500  text-start ">
                  <div class="flex  flex-col justify-center items-center h-full ">
                                          
                  <h2 class="lg:text-2xl text-xl mb-0  w-full text-center py-1  border-b border-gray-300 text-white"  
                  style="{{$bg}}">                                          
                      {{$title  }} beneficio
                    </h2>  
                                                                                                                    
                <form class="flex flex-col max-w-[1200px] mx-auto w-full  pb-4  mb-0  lg:p-4 p-2  rounded-lg overflow-y-auto max-h-[85vh] bg-gray-50 " 
                  wire:submit={{$method}} >

                  @if ($method =="delete") 
                      <p class="text-center text-gray-600 lg:px-10 px-6">Esta seguro de eliminar el beneficio  </p>
                      <p class="text-center text-gray-600 mb-6"><strong >"{{$nombre}}" </strong>?</p>
                    @else
                                        

                  <div class="border- border-gray-300 shadow-l mb-6 rounded-lg bg-rd-200 ">
                  
                  <div class="grid lg:grid-cols-3  grid-cols-1 px-4 pb-4  space-y-4 space-x-4 pt-0 [&>div]:flex [&>div]:flex-col [&>div]:justify-end [&>div]:relative bg-reen-200 shadow-md "> 

                        <div class="col-span-1  ml-4 ">
                          <x-label for="nombre">Nombre</x-label>
                            <input  class="h-7 rounded-lg mr-2" wire:model="nombre" />
                            <x-input-error for="nombre"   class=" absolute top-full py-0 leading-[12px] text-xs"/>
                        </div>

                        <div class="col-span-1">
                          <x-label for="fechaDesde">Valido Desde</x-label>
                              <input type="date" class="h-7 rounded-lg mr-2" wire:model="fechaDesde" />
                            <x-input-error for="fechaDesde"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                        </div>

                        <div class="col-span-1">
                          <x-label for="fechaHasta">Valido Hasta</x-label>
                              <input type="date" class="h-7 rounded-lg mr-2" wire:model="fechaHasta" />
                            <x-input-error for="fechaHasta"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                        </div>

                        <div class="lg:col-span-3 ">
                          <x-label for="descripcion">Descripcion</x-label>
                              <textarea  wire:model="descripcion">{{$descripcion}}</textarea>
                            <x-input-error for="descripcion"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                        </div>

                        <div>                                    
                          <x-label for="">Estado </x-label>
                          <select wire:model.live="estado" class="h-7 rounded-lg mr-2 text-sm block py-0">                                                        
                              <option value="1">Activo</option>
                              <option value="0">Inactivo</option>
                            </select>
                            <x-input-error for="estado"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                        </div>

                        <div>
                          <x-label for="">Reutilizable </x-label>
                          <select wire:model.live="reutilizable" class="h-7 rounded-lg mr-2 text-sm block py-0">                
                              <option value="0">No</option>
                              <option value="1">Si</option>                                        
                            </select>
                            <x-input-error for="reutilizable"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                        </div>
                        
                          <div>                                    
                            <x-label for="cantUsos">Contidad de usos </x-label>
                              <input    type="number" min="0" wire:model="cantUsos"  name="cantUsos" class="h-7 rounded-lg mr-2 {{ $reutilizable == '0' ? 'bg-gray-50 opacity-70 ' : '' }}"  
                              {{ $reutilizable == '0' ? 'disabled' : '' }}/>
                              <x-input-error for="cantUsos"   class="text-xs absolute top-full py-0 leading-[12px]" />
                        </div>


                        <div class=" mt-1  flex flex-col  lg:col-span-3 col-span-1"
                            x-data="imageUploader('{{ $bannerBeneficio ? Storage::url($bannerBeneficio) : '' }}')" >

                                          <label for="formFile" class="mb-1">Banner  </label>                                                                            
                                          <div class= "flex flex-col items-center    mx-auto" x-data="{de:0}">
                                            
                                                  <template x-if="!isImageLoaded">
                                                    <div class=" flex flex-col items-center  mx-auto">
                                                      <div class=" border-4 border-dotted border-gray-600 h-[150px] min-w-[190px] flex items-center justify-center mb-2 mt-0">
                                                        <span>Imagen</span>
                                                      </div>
                                                      <button type="button" class="btn bg-green-400 px-4 py-0.5 text-sm rounded-lg  text-white" 
                                                      @click="$refs.fileInput.click()">Cargar</button>
                                                    </div>
                                                  </template>    

                                                
                                                  <button type="button" class="btn text-sm  mb-2   bg-orange-500  text-white px-4 py-0.5 rounded-lg" x-show="isImageLoaded" @click="$refs.fileInput.click()">Cambiar</button>
                                                  
                                                  <template x-if="isImageLoaded">
                                                    <div class="relative  text-center ">
                                                    <img :src="image" alt="Imagen cargada" class="object-scale-down max-h-[150px]"  >

                                                  </div>
                                                  </template>
                                                  
                                                  <input type="hidden" wire:model="imagehas" name="imagehas" :value="de">

                                                  <input type="file"   wire:model="bannerBeneficio" name="image" accept=".jpg, .jpeg, .png"
                                                  x-ref="fileInput" class="hidden" 
                                                      @change="updateImage($event)">                                                    
                                                                
                                                  <button type="button" class="btn text-sm  mb-1   bg-red-500  text-white px-4 py-0.5 rounded-lg mt-2"
                                                  @click="image = ''; isImageLoaded = false;de=1" x-show="isImageLoaded">Eliminar</button>

                                          </div>
                                                                                    
                                  </div>
                      
                          
                            <fieldset class="border border-solid border-gray-300 p-1 pb-2 pr-4 w-[99%] lg:col-span-3 ">
                                <legend class="p-2"> Membresias que aplican</legend>

                                <div class="flex lg:flex-row flex-col w-full justify-between  lg:pl-4 pl-2 ">                                  
                                  @foreach ($condiciones as $condicion)                                            
                                  <div class="flex">
                                    <input type="checkbox"    class="mr-1.5 "value="{{$condicion->id}}" wire:model="idCondiciones" 
                                    @if(in_array($condicion->id, $idCondiciones)) checked @endif
                                    />
                                    <x-label for="" class="ml-0">{{$condicion->nombreCondicion}}</x-label>
                                  </div>
                                  @endforeach                                                          
                                </div> 
                                <x-input-error for="empresaId"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                            </fieldset>                        

                        <div class="lg:col-span-3">                                  

                        <fieldset class="border border-solid border-gray-300 p-1 pb-4 pr-4 w-[99%] lg:col-span-3">
                          <legend class="p-2">
                              Condiciones requeridas
                            </legend>
                            <div class=" flex flex-col lg:pl-4 pl-2 mt-1">
                              
                                <div class="flex lg:flex-row flex-col justify-start">

                                    <div class="relative">                        
                                      <x-label for="idCondicionReq">Condiciones </x-label>
                                        <select wire:model.live="idCondicionReq" class="h-7 rounded-lg mr-2 text-sm block py-0"> 
                                            <option value="">Elija requerimiento</option>
                                            @foreach ($condicionesReq as $condicionReq)
                                            
                                            <option value="{{$condicionReq->id}}">{{$condicionReq->nombreRequerimiento}}</option>                                                          
                                            @endforeach
                                          </select>
                                          <x-input-error for="idCondicionReq"   class="text-xs absolute top-full py-0 leading-[12px] "/>              
                                      </div>

                                    <div class="col-span-1  lg:ml-4 lg:mt-0 mt-2">
                                      <x-label for="descripcionReq">Descripcion</x-label>
                                      <input  class="h-7 rounded-lg mr-2" wire:model="descripcionReq" />
                                      <x-input-error for="descripcionReq"   class=" absolute top-full py-0 leading-[12px] text-xs"/>
                                    </div>
                                    
                                    <button type="button" class="px-2 rounded-lg btn bg-green-500 ml-8 py-0.5 text-white h-7 lg:self-end self-center w-fit lg:mt-0 mt-2"
                                    wire:click="addItem">Agregar</button>
                                    
                                  </div>
                                      
                                <div>

                                  @if (count($items))
                                              
                                  <table class="min-w-full divide-y  divide-gray-400   p-1 mt-4">  
                                    <thead>
                                        <tr class="bg-gray-100 relative text-gray-600 font-bold divide-x-2 [&>th]:pl-2 [&>th]:pr-1 [&>th]:lg:pl-4 [&>th]:text-start text-sm ">
                                          <th>Condicion</th>
                                          <th>Descripción</th>
                                          <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                      @foreach($items as $index => $item)                                                        
                                      <tr >                                             
                                          <td class="pl-1">{{$item['condicion'] }}</td>                                                       
                                          <td class="pl-1">{{$item['descripcion'] }}</td>                                                      
                                          <td >
                                            <button type="button" wire:click="removeItem({{ $index }})" class=" hover:text-gray-200  hover:bg-red-600 flex items-center py-0.5 bg-red-500 rounded-lg px-1 mx-auto my-0.5" >
                                              <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                                                    </svg> 
                                                </button>
                                            </td>
                                      </tr>
                                      @endforeach
                                      
                                    </tbody>
                                  </table>
                                  @endif
                                </div>
                                <x-input-error for="fechaNac"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                              </div>
                              <x-input-error for="items"   class="text-xs absolute top-full py-0 leading-[12px] "/>
                            </fieldset>
                                
                        </div>
                                    
                  </div> 
                </div> 

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
