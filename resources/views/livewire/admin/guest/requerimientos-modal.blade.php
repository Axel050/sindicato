   <div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
          <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('methodReq',false)"></div>              
                                   
          <div  class=" bg-white border w border-gray-500   md:max-w-md  lg:w-1/3 w-[96%] x-auto  z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] overflow-y-auto " >
              
                <div class="bg-white  pb-6 text-gray-500  text-start ">
                    <div class="flex  flex-col justify-center items-center  ">                             
                          
                          <h2 class="lg:text-2xl text-xl mb-4  w-full text-center py-1  border-b border-gray-300 text-white"  style="{{$bg}}">
                              {{$title}} requerimiento
                          </h2>                                                                      
                          
                          <form class="bg-red-80  w-full  flex flex-col gap-2 lg:text-lg  text-base lg:px-4 px-2 text-gray-200  [&>div]:flex [&>div]:justify-center pt-4 "  wire:submit={{$method}} >
                            
                            @if ($method =="delete")
                                <p class="text-center text-gray-600 lg:px-10 px-6">Esta seguro de eliminar el gremio  </p>
                                {{-- <p class="text-center text-gray-600"><strong >"{{$nombreGremio}}" </strong>?</p> --}}
                              @else

                              <div class="flex flex-col   items-start  w-[90%] mx-auto ">
                                <label  class="w-full text-start text-gray-500  leading-[16px] text-base">Nombre </label>
                                <div class="relative w-full">
                                  <input type="text" wire:model="nombre" class ="h-7 rounded-md border border-gray-400 w-full text-gray-500" disabled/>                                  
                                </div>
                              </div>

                              <div class="flex flex-col   items-start  w-[90%] mx-auto mt-2  ">
                                <label  class="w-full text-start text-gray-500  leading-[16px] text-base">Valor</label>
                                <div class="relative w-full">

                                   <div 
                                            x-data="{ uploading: false, progress: 0 }"
                                            x-on:livewire-upload-start="uploading = true"
                                            x-on:livewire-upload-finish="uploading = false"
                                            x-on:livewire-upload-cancel="uploading = false"
                                            x-on:livewire-upload-error="uploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                                        >
                                              <input type="file" wire:model="file" class ="text-sm rounded-md border border-gray-400 w-full text-gray-500" />      
                                                <x-input-error for="file"   class="text-sm absolute top-full py-0 leading-[13px] mt-y" />
                                                <div x-show="uploading" class="text-center mt-1">
                                                  <progress max="100" x-bind:value="progress" ></progress>
                                              </div>
                                        </div>            

                                </div>

                                {{--  --}}
                                       @if ($filePreview)
        <div class="mt-4  w-full ">
            @if ($fileType === 'image')
                <!-- Previsualización de imagen -->
                <img src="{{ $filePreview }}" 
                     alt="Previsualización de imagen" 
                     class=" max-w-52 rounded-md mx-auto">
            @elseif ($fileType === 'pdf')
                <!-- Ícono de PDF con nombre -->
                <div class="flex items-center space-x-2  w-full justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                            width="20px" height="20px" viewBox="0 0 56 64" enable-background="new 0 0 56 64" xml:space="preserve">
                          <g>
                            <path fill="#8C181A" d="M5.1,0C2.3,0,0,2.3,0,5.1v53.8C0,61.7,2.3,64,5.1,64h45.8c2.8,0,5.1-2.3,5.1-5.1V20.3L37.1,0H5.1z"/>
                            <path fill="#6B0D12" d="M56,20.4v1H43.2c0,0-6.3-1.3-6.1-6.7c0,0,0.2,5.7,6,5.7H56z"/>
                            <path opacity="0.5" fill="#FFFFFF" enable-background="new    " d="M37.1,0v14.6c0,1.7,1.1,5.8,6.1,5.8H56L37.1,0z"/>
                          </g>
                          <path fill="#FFFFFF" d="M14.9,49h-3.3v4.1c0,0.4-0.3,0.7-0.8,0.7c-0.4,0-0.7-0.3-0.7-0.7V42.9c0-0.6,0.5-1.1,1.1-1.1h3.7
                            c2.4,0,3.8,1.7,3.8,3.6C18.7,47.4,17.3,49,14.9,49z M14.8,43.1h-3.2v4.6h3.2c1.4,0,2.4-0.9,2.4-2.3C17.2,44,16.2,43.1,14.8,43.1z
                            M25.2,53.8h-3c-0.6,0-1.1-0.5-1.1-1.1v-9.8c0-0.6,0.5-1.1,1.1-1.1h3c3.7,0,6.2,2.6,6.2,6C31.4,51.2,29,53.8,25.2,53.8z M25.2,43.1
                            h-2.6v9.3h2.6c2.9,0,4.6-2.1,4.6-4.7C29.9,45.2,28.2,43.1,25.2,43.1z M41.5,43.1h-5.8V47h5.7c0.4,0,0.6,0.3,0.6,0.7
                            s-0.3,0.6-0.6,0.6h-5.7v4.8c0,0.4-0.3,0.7-0.8,0.7c-0.4,0-0.7-0.3-0.7-0.7V42.9c0-0.6,0.5-1.1,1.1-1.1h6.2c0.4,0,0.6,0.3,0.6,0.7
                            C42.2,42.8,41.9,43.1,41.5,43.1z"/>
                  </svg>
                  <a href="{{ $filePreview }}" 
                      target="_blank" 
                      class="text-blue-500 underline hover:text-blue-700">
                      Ver archivo PDF
                  </a>
                </div>
            @else
                <p class="text-red-500">Tipo de archivo no compatible para previsualización.</p>
            @endif
             </div>
    @endif




    <hr>
    <hr>
    @if ($this->condicion->valor &&  !$filePreview)
    <div class="mt-4 w-full text-center  flex justify-center">
        @if (Str::endsWith($this->condicion->valor, ['.jpg', '.jpeg', '.png']))
            <!-- Mostrar la imagen -->
            <img src="{{ asset('storage/' . $this->condicion->valor) }}" 
                 alt="Archivo subido" 
                 class=" max-w-52 rounded-md mx-auto">
        @elseif (Str::endsWith($this->condicion->valor, '.pdf'))
            <!-- Enlace para ver el PDF -->
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" 
                            width="20px" height="20px" viewBox="0 0 56 64" enable-background="new 0 0 56 64" xml:space="preserve">
                          <g>
                            <path fill="#8C181A" d="M5.1,0C2.3,0,0,2.3,0,5.1v53.8C0,61.7,2.3,64,5.1,64h45.8c2.8,0,5.1-2.3,5.1-5.1V20.3L37.1,0H5.1z"/>
                            <path fill="#6B0D12" d="M56,20.4v1H43.2c0,0-6.3-1.3-6.1-6.7c0,0,0.2,5.7,6,5.7H56z"/>
                            <path opacity="0.5" fill="#FFFFFF" enable-background="new    " d="M37.1,0v14.6c0,1.7,1.1,5.8,6.1,5.8H56L37.1,0z"/>
                          </g>
                          <path fill="#FFFFFF" d="M14.9,49h-3.3v4.1c0,0.4-0.3,0.7-0.8,0.7c-0.4,0-0.7-0.3-0.7-0.7V42.9c0-0.6,0.5-1.1,1.1-1.1h3.7
                            c2.4,0,3.8,1.7,3.8,3.6C18.7,47.4,17.3,49,14.9,49z M14.8,43.1h-3.2v4.6h3.2c1.4,0,2.4-0.9,2.4-2.3C17.2,44,16.2,43.1,14.8,43.1z
                            M25.2,53.8h-3c-0.6,0-1.1-0.5-1.1-1.1v-9.8c0-0.6,0.5-1.1,1.1-1.1h3c3.7,0,6.2,2.6,6.2,6C31.4,51.2,29,53.8,25.2,53.8z M25.2,43.1
                            h-2.6v9.3h2.6c2.9,0,4.6-2.1,4.6-4.7C29.9,45.2,28.2,43.1,25.2,43.1z M41.5,43.1h-5.8V47h5.7c0.4,0,0.6,0.3,0.6,0.7
                            s-0.3,0.6-0.6,0.6h-5.7v4.8c0,0.4-0.3,0.7-0.8,0.7c-0.4,0-0.7-0.3-0.7-0.7V42.9c0-0.6,0.5-1.1,1.1-1.1h6.2c0.4,0,0.6,0.3,0.6,0.7
                            C42.2,42.8,41.9,43.1,41.5,43.1z"/>
                  </svg>
                <a href="{{ asset('storage/' . $this->condicion->valor) }}" 
                   target="_blank" 
                   class="text-blue-500 underline">
                    Ver archivo PDF
                </a>
            </div>
        @else
            <p class="text-red-500">Archivo no compatible.</p>
        @endif
    </div>
@endif

                                {{--  --}}
                                     
                              </div>
                              
                              
                                
                                @endif

                                <div class="flex gap-6 justify-center lg:text-base text-sm mt-2">                                   
                                  <button  type="button" class="bg-orange-600 hover:bg-orange-700 mt-4 rounded-lg px-2 lg:py-1 py-0.5 "
                                    wire:click="$parent.$set('methodReq',false)">                                
                                    Cancelar
                                  </button >
                                                                    
                                  <button class="bg-green-600 hover:bg-green-700 mt-4 rounded-lg px-2 lg:py-1 py-0.5 flex text-center items-center "  >
                                      {{$btnText}}                                        
                                  </button >                        
                                </div>

                            </form> 
                            
                      </div>
                </div>
            </div>
                                                        
  </div>