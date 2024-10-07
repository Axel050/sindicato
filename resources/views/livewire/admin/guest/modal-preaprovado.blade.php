<div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
      <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('method',false)"></div>
                                                 
      <div  class=" bg-white border w border-gray-500   md:ma-w-[1000px]  lg:w-fit w-[96%]   z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] " >
                                                                    
              <div class="bg-ornge-200   text-gray-500  text-start ">
                  <div class="flex  flex-col justify-center items-center h-full  pb-4">
                                          
                      <h2 class="lg:text-lg text-base mb-0  w-full text-center py-1  border-b border-gray-300 text-white bg-orange-600 px-6 rounded-t-md"  style="{{$bg}}" >
                            {{$title}} beneficio
                      </h2>                                            
                                                                                                                                                  
                        <h3 class="p-8 ">Esta seguro de {{$text}} el beneficio " " ?</h3>
                            

                        <div class="flex justify-center gap-x-12"> 
                          
                            <button type="button" wire:click="$parent.$set('method',false)"
                                class="px-6 py-1.5 bg-red-500 text-white w-fit  rounded-lg hover:bg-red-600">Salir  
                            </button >

                            <button   class="px-6 py-1.5 bg-green-500 text-white w-fit  rounded-lg hover:bg-green-600"
                            wire:click="{{$method}}">{{$btnText}}
                           </button>

                        </div>                    

                </div>            
            </div>

        </div>
                                                        
  </div>
