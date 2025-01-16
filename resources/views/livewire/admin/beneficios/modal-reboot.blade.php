<div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >
      <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="$parent.$set('rebootB',false)"></div>
                                                 
      <div  class=" bg-white border w border-gray-500   md:ma-w-[1000px]  lg:w-fit w-[96%]   z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] " >
                                                                    
            <div class="flex  flex-col justify-center items-center h-full ">
                                      
                <h2 class="lg:text-2xl text-xl mb-0  w-full text-center py-1  border-b border-gray-300 text-white bg-yellow-600"   >
                    Reiniciar documentacion 
                </h2>  

                <div class="flex flex-col max-w-[1200px] mx-auto w-full  pb-4  mb-0  lg:p-4 p-2  rounded-lg overflow-y-auto max-h-[85vh] bg-gray-50 " >
                                                                                                                
                  <div class="flex justify-center px-4 pb-3 mt-3"> 
                    <p class="text-center">¿Esta seguro de eliminar los usos , los beneficios asignados a los  afiliados y la documentacion requerida del beneficio  <b>"{{$beneficio->nombre}}"</b>?</p>
                  </div> 

                  <ul class="mx-auto my-4">
                    <li><label><input type="checkbox" wire:model="doc" class="mr-1" > Documentacion requerida.</label></li>
                    <li><label><input type="checkbox" wire:model="uso" class="mr-1" > Usos del beneficio.</label></li>
                    <li><label><input type="checkbox" wire:model="asig" class="mr-1" > Asignados a miembros.</label></li>
                  </ul>

                  <div class="flex justify-center gap-x-12 mt-4">                     
                      <button type="button" wire:click="$parent.$set('rebootB',false)"                      
                          class="px-6 py-1.5 bg-red-500 text-white w-fit  rounded-lg hover:bg-red-600">Cancelar  
                      </button >
                      <button   type="button" class="px-6 py-1.5 bg-green-500 text-white w-fit  rounded-lg hover:bg-green-600" wire:click="rebootB">
                        Reiniciar
                      </button>
                  </div>
                  
                </div>                                          
                
            </div>            

       </div>


</div>
