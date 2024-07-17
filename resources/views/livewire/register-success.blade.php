<div class="  fixed w-full h-full top-0 left-0 flex items-center justify-center  z-50"  >

              <div class="absolute w-full h-full bg-gray-600 opacity-60" wire:click="redirectLogin"></div>
              
              
                      <div  class=" bg-white border w border-gray-500   md:max-w-md  lg:w-1/3 w-[96%] x-auto  z-50 rounded-lg shadow-gray-400 shadow-md max-h-[92%] overflow-y-auto " >
                          
                                                
                              <div class="bg-white  pb-6 text-gray-500  text-start ">
                                    <div class="flex  flex-col justify-center items-center  ">                             
                                                                                    
                                          
                                          <h2 class="lg:text-2xl text-xl mb-6  w-full text-center py-1  border-b border-gray-300 text-white bg-green-500" > 
                                            Registro exitoso
                                          </h2>
                                          <img src="{{asset('logosindiN.png')}}" class="w-32 h-32">

                                              <p class="text-lg font-semibold w-2/3 mx-auto mt-4 text-center">Ya podra iniciar sesion con su email y contraseña elegidos.</p>

                                                <div class="flex gap-6 justify-center lg:text-base text-sm">                                                   
                                                  <button class="bg-orange-600 hover:bg-orange-700 mt-8 rounded-lg px-2 lg:py-1 py-0.5  text-white"
                                                  wire:click="redirectLogin">
                                                      Continuar
                                                </button>
                                                </div>
                                          
                                </div>            
                              </div>

                        </div>

  </div>