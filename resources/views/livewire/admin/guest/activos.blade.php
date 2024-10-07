<div class="flex flex-col bg-gray-50 fullscreen">
    
      <div class="flex bg-gra-100 flex-wrap gap-2 lg:gap-4 justify-center pt-8 pb-4 w-full relative">
            
          @foreach ($beneficios as $ben)

              @if ($ben->estadoC($ben->idAfiliado,$ben->idBeneficio))

                  @php
                        $noDisponible = $ben->beneficio->cantUsos <= $ben->beneficio->beneficioUsos($ben->idAfiliado)->count() ;
                        $shadow = $noDisponible ? "shadow-red-500" : "shadow-green-500";
                  @endphp
                        
                            
                  <div class="flex flex-col  lg:w-[31%] w-[98%] hover:bg-gray-200  relative  shadow-md {{$shadow}} cursor-pointer"
                        x-data="{open:false}"  @click="open=!open" :class="open ? 'h-auto bg-gray-100' : 'h-20 bg-white' ">

                      <h3 class="text-lg font-semibold p-2">{{$ben->beneficio->nombre}}</h3 >
                        
                      <p class="pl-2 pb-1">Pin nro: {{sprintf("%05d", $ben->id)}}</p>
              

                      <span class="font-extrabold text-2xl absolute top-6 right-2"
                      :class="open ? 'rotate-90' : '' ">
                          <svg  class="ml-auto mr-2" fill="#000000" height="15px" width="15px" version="1.1" id="XMLID_287_"  viewBox="0 0 24 24" xml:space="preserve" 
                            >
                            <g id="next">
                              <g>
                                <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                              </g>
                            </g>
                        </svg>
                      </span>

                      <div x-show="open" class="bg-white  pb-4  flex flex-col flex-grow ">

                            @if ($ben->beneficio->bannerBeneficio)              
                              <img src="{{ Storage::url($ben->beneficio->bannerBeneficio) }}" class="h-32 w-fit mx-auto" >                
                            @else
                              <div class="h-32 flex bg-red200 items-center justify-center ">
                                <img src="{{ asset('logosindi.png') }}" class="h-24 w-fit " >                  
                              </div>                
                            @endif

                          <div class="text-sm flex flex-col p-2">
                            
                            @if($ben->beneficio->descripcion)
                                <h4 class="font-semibold m-1 mb-0">Descripcion :</h4>
                                <p  class="ml-2">{{$ben->beneficio->descripcion}} </p>                      
                              @endif
                              @if ($ben->comentario)
                                  <h5 class="font-semibold m-1 mb-0">Comentario :</h4>
                                  <p  class="ml-2">{{$ben->comentario}} </p>                      
                                            
                                @endif
                          </div>
                      
                        
                          <div class="flex   mt-auto p-3 pt-1 border-t-[1px] border-gray-200">
                          
                              <div class="flex  flex-col w-1/2  text-sm  p-2">

                                  <div class="flex ">
                                    <label class="w-[85px]">Nombre:</label> <span class="font-semibold">{{$ben->afiliado->name}}</span> 
                                  </div>

                                  <div class="flex">
                                    <label class="w-[85px]">Numero:</label> <span class="font-semibold">{{$ben->afiliado->id}}</span> 
                                  </div>

                                  <div class="flex ">
                                    <label class="w-[85px] ">Documento:</label> <span class="font-semibold">{{$ben->afiliado->documento}}</span> 
                                  </div>

                                  <div class="flex">
                                    <label class="w-[85px]">Empresa:</label> <span class="font-semibold">Empresa nombre</span> 
                                  </div>

                                  <div class="flex">
                                    <label class="w-[85px]">Ingreso:</label> <span class="font-semibold">{{date('Y-m-d', strtotime($ben->afiliado->fechaAfiliacion))}}</span> 
                                  </div>

                                  <div class="flex">
                                    <label class="w-[85px]">Cant usos:</label> <span class="font-semibold">{{$ben->beneficio->cantUsos}}</span> 
                                  </div>
                                  
                                  <div class="flex @if($noDisponible) text-red-500 @endif">
                                    <label class="w-[85px]">Usados:</label> <span class="font-semibold">{{$ben->beneficio->beneficioUsos($ben->idAfiliado)->count()}}</span> 
                                  </div>
                                  
                              </div>

                              <div class="flex justify-center items-center w-1/2 mx-auto">
                                                  
                                  @if ($noDisponible)              
                                      <p class="h-36 w-36 font-extrablod text-lg border p-8 text-center align-middle bg-gray-100 flex items-center justify-center">No disponible</p>
                                  @else


                                      @php
                                      $url = route('miembro-beneficios', ['id' => $ben->idAfiliado, 'idB' => $ben->idBeneficio]);                      

                                        $qrCodeResult = Endroid\QrCode\Builder\Builder::create()
                                                          ->writer(new Endroid\QrCode\Writer\PngWriter()) 
                                                          ->data($url ) 
                                                          ->build(); 


                                      $qr= $qrCodeBase64 = base64_encode($qrCodeResult->getString());
                                      @endphp

                                  
                                  <div class="bg-red-200 h-40 w-40">                              
                                            <img src="data:image/png;base64, {{ $qr }}" alt="Código QR">
                                  </div>
                                  
                                  @endif
                              </div>
                          
                        </div>

                      </div>
                  </div>

              @endif    
          @endforeach
          

    </div>        
</div>
