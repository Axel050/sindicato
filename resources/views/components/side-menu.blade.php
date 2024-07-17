<div class=" min-h-screen overflow-y-auto  pt-4  transition-all duration-500 border-gray-300   border-r-2 bg-sky-500"  
    :class="openSide? 'lg:w-[260px] lg:min-w-[260px]  w-0  ' : 'w-[360px] lg:w-0 '  " 
    {{-- style="background-color:#0099CC" --}}
    
    x-cloak
        >  



    <a  href="" class="w-full   g-green-200 flex justify-center  mb-16 mt-2">
        {{-- <img src="logo-dark.png" class="h-6" alt=""> --}}
        <h2 class="text-2xl font-extrabold  w-full text-center p-0 ">SOEESIT<span class="text-cyan-700">LP</span></h2>
    </a>


      <ul class="flex  flex-col px-4  mt-2 text-gray-100 lg:pl-6 pl-2  borde  [&>li]:cursor-pointer lg:text-base text-sm ">        


    
<li class="pl- mb-1   py-1 hover:text-gray-200 hover:shadow-md hover:shadow-sky-600 px-1 
{{ Request::is('dashboard') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} "            
              @click="title = 'Dasboard' "  >
              <a class="flex gap-x-2" href="{{Route('dashboard')}}">          
           <svg class="w-6 h-6 " viewBox="0 0 24 24" fill="none" >                
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.875 7.375C14.875 8.68668 13.8117 9.75 12.5 9.75C11.1883 9.75 10.125 8.68668 10.125 7.375C10.125 6.06332 11.1883 5 12.5 5C13.8117 5 14.875 6.06332 14.875 7.375Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.25 15.775C17.25 17.575 15.123 19.042 12.5 19.042C9.877 19.042 7.75 17.579 7.75 15.775C7.75 13.971 9.877 12.509 12.5 12.509C15.123 12.509 17.25 13.971 17.25 15.775Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9 9.55301C19.9101 10.1315 19.5695 10.6588 19.0379 10.8872C18.5063 11.1157 17.8893 11 17.4765 10.5945C17.0638 10.189 16.9372 9.57418 17.1562 9.03861C17.3753 8.50305 17.8964 8.1531 18.475 8.15301C19.255 8.14635 19.8928 8.77301 19.9 9.55301V9.55301Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.10001 9.55301C5.08986 10.1315 5.43054 10.6588 5.96214 10.8872C6.49375 11.1157 7.11072 11 7.52347 10.5945C7.93621 10.189 8.06278 9.57418 7.84376 9.03861C7.62475 8.50305 7.10363 8.1531 6.52501 8.15301C5.74501 8.14635 5.10716 8.77301 5.10001 9.55301Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M19.2169 17.362C18.8043 17.325 18.4399 17.6295 18.403 18.0421C18.366 18.4547 18.6705 18.8191 19.0831 18.856L19.2169 17.362ZM22 15.775L22.7455 15.8567C22.7515 15.8023 22.7515 15.7474 22.7455 15.693L22 15.775ZM19.0831 12.695C18.6705 12.7319 18.366 13.0963 18.403 13.5089C18.4399 13.9215 18.8044 14.226 19.2169 14.189L19.0831 12.695ZM5.91689 18.856C6.32945 18.8191 6.63395 18.4547 6.59701 18.0421C6.56007 17.6295 6.19567 17.325 5.78311 17.362L5.91689 18.856ZM3 15.775L2.25449 15.693C2.24851 15.7474 2.2485 15.8023 2.25446 15.8567L3 15.775ZM5.78308 14.189C6.19564 14.226 6.56005 13.9215 6.59701 13.5089C6.63397 13.0963 6.32948 12.7319 5.91692 12.695L5.78308 14.189ZM19.0831 18.856C20.9169 19.0202 22.545 17.6869 22.7455 15.8567L21.2545 15.6933C21.1429 16.7115 20.2371 17.4533 19.2169 17.362L19.0831 18.856ZM22.7455 15.693C22.5444 13.8633 20.9165 12.5307 19.0831 12.695L19.2169 14.189C20.2369 14.0976 21.1426 14.839 21.2545 15.8569L22.7455 15.693ZM5.78311 17.362C4.76287 17.4533 3.85709 16.7115 3.74554 15.6933L2.25446 15.8567C2.45496 17.6869 4.08306 19.0202 5.91689 18.856L5.78311 17.362ZM3.74551 15.8569C3.85742 14.839 4.76309 14.0976 5.78308 14.189L5.91692 12.695C4.08354 12.5307 2.45564 13.8633 2.25449 15.693L3.74551 15.8569Z" fill="#fff"/>
                </svg>
                <span class="ml-1 ">Panel de control</span></a>
              </li>

              {{-- @if(auth()->user()->hasRole('Administrador')  ) --}}
              @if(auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-editar','usuarios-actualizar','usuarios-eliminar'])
              && auth()->user()->estado ==1 )
          
          
              <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-2"  
            x-data="  {open:false}"   
            @click="open = ! open"
            @click.outside="open = false"  >                                                

                <div  class = "flex  justify-start items-center py-1 
                  {{ Request::is('usuarios','roles') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} 
                  "            
                  :class="{ ' bg-gry-100 text-gray-200 ': open }" 
                  >
                    

                     <svg class="w-6 h-6 " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M9 4L9 20M15 4L15 20M3 9H21M3 15H21M6.2 20H17.8C18.9201 20 19.4802 20 19.908 19.782C20.2843 19.5903 20.5903 19.2843 20.782 18.908C21 18.4802 21 17.9201 21 16.8V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H6.2C5.07989 4 4.51984 4 4.09202 4.21799C3.71569 4.40973 3.40973 4.71569 3.21799 5.09202C3 5.51984 3 6.07989 3 7.2V16.8C3 17.9201 3 18.4802 3.21799 18.908C3.40973 19.2843 3.71569 19.5903 4.09202 19.782C4.51984 20 5.07989 20 6.2 20Z" stroke="#fff " stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      <span class="ml-2 lg:mr-8 ">Usuarios</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" >
                        <g id="next">
                          <g>
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                      <li class="pl-6  mb-1   py-1 hover:text-gray-300 hover:shadow-md hover:shadow-sky-600
                  {{ Request::is('usuarios') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} " >
                   <a href="{{Route('usuarios')}}" class=" w-full inline-block">- Usuarios</a>
                </li>

                <li class="pl-6  mb-1   py-1 hover:text-gray-300 hover:shadow-md hover:shadow-sky-600
                    {{ Request::is('roles') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} " >
                  <a  href="{{Route('roles')}}" class=" w-full inline-block">- Roles</a>              
                </li>
                                
                
             </ul>                                     
             
           </li>

           @endif

           @if(auth()->user()->hasAnyPermission([
            'miembros-ver','miembros-crear','miembros-editar','miembros-actualizar','miembros-eliminar',            
            ]) && auth()->user()->estado ==1 )             

           <li class="pl- mb-1 mt-2  py-1 hover:text-gray-200 hover:shadow-md hover:shadow-sky-600 px-1 
              {{ Request::is('miembros') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} "   >
              <a class="flex gap-x-2" href="{{Route('miembros')}}">
                <svg class="w-6 h-6 " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M9 4L9 20M15 4L15 20M3 9H21M3 15H21M6.2 20H17.8C18.9201 20 19.4802 20 19.908 19.782C20.2843 19.5903 20.5903 19.2843 20.782 18.908C21 18.4802 21 17.9201 21 16.8V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H6.2C5.07989 4 4.51984 4 4.09202 4.21799C3.71569 4.40973 3.40973 4.71569 3.21799 5.09202C3 5.51984 3 6.07989 3 7.2V16.8C3 17.9201 3 18.4802 3.21799 18.908C3.40973 19.2843 3.71569 19.5903 4.09202 19.782C4.51984 20 5.07989 20 6.2 20Z" stroke="#fff " stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                
                <span class="ml-1 ">Miembros</span></a>
              </li>
              @endif
  


          {{-- @if(auth()->user()->hasRole('Administrador')  ) --}}
          @if(auth()->user()->hasAnyPermission([
            'empresas-ver','empresas-crear','empresas-editar','empresas-actualizar','empresas-eliminar',
            'gremios-ver','gremios-crear','gremios-editar','gremios-actualizar','gremios-eliminar',
            'sectores-ver','sectores-crear','sectores-editar','sectores-actualizar','sectores-eliminar',
            'condiciones-ver','condiciones-crear','condiciones-editar','condiciones-actualizar','condiciones-eliminar',
            ]) && auth()->user()->estado ==1 )             
        <li class="fle hover:text-gray-200  hover:shadow-md hover:shadow-sky-600  items-center pl-1 mt-2"  
            x-data="  {open:false}"   
            @click="open = ! open"
            @click.outside="open = false"  >                                                

                <div  class = "flex  justify-start items-center py-1 
                  {{ Request::is('empresas','gremios','sectores','condiciones') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} 
                  "            
                  :class="{ ' bg-gry-100 text-gray-200 ': open }" 
                  >
                    

                     <svg class="w-6 h-6 " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M9 4L9 20M15 4L15 20M3 9H21M3 15H21M6.2 20H17.8C18.9201 20 19.4802 20 19.908 19.782C20.2843 19.5903 20.5903 19.2843 20.782 18.908C21 18.4802 21 17.9201 21 16.8V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H6.2C5.07989 4 4.51984 4 4.09202 4.21799C3.71569 4.40973 3.40973 4.71569 3.21799 5.09202C3 5.51984 3 6.07989 3 7.2V16.8C3 17.9201 3 18.4802 3.21799 18.908C3.40973 19.2843 3.71569 19.5903 4.09202 19.782C4.51984 20 5.07989 20 6.2 20Z" stroke="#fff " stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      <span class="ml-2 lg:mr-8 ">Tablas auxiliares</span>                
                      <svg  class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1"  id="XMLID_287_"  viewBox="0 0 24 24"        xml:space="preserve" 
                        :class="{ 'rotate-90': open }" >
                        <g id="next">
                          <g>
                            <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 		"/>
                          </g>
                        </g>
                      </svg>
                  </div>
  
            {{-- submenu --}}
            <ul class="flex flex-col  mt-1" x-show="open" >  
                      <li class="pl-6  mb-1   py-1 hover:text-gray-300 hover:shadow-md hover:shadow-sky-600
                  {{ Request::is('empresas') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} " >
                   <a href="{{Route('empresas')}}" class=" w-full inline-block">- Empresas</a>
                </li>

                <li class="pl-6  mb-1   py-1 hover:text-gray-300 hover:shadow-md hover:shadow-sky-600
                    {{ Request::is('gremios') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} " >
                  <a  href="{{Route('gremios')}}" class=" w-full inline-block">- Gremios</a>              
                </li>
                
                <li class="pl-6  mb-1   py-1 hover:text-gray-300 hover:shadow-md hover:shadow-sky-600
                {{ Request::is('sectores') ?  'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} " >
                  <a href="{{Route('sectores')}}" class=" w-full inline-block">- Sectores</a></li>
                <li class="pl-6  mb   py-1 hover:text-gray-300 hover:shadow-md hover:shadow-sky-600
                {{ Request::is('condiciones') ? 'bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold' : '' }} " >
                  <a href="{{Route('condiciones')}}" class=" w-full inline-block">                  
                  -Condicion de miembro</a></li>
                
             </ul>                                     
             
           </li>

           @endif



        

          {{-- <li class="pl-2 mb-1   py-1 hover:text-gray-600 hover:shadow-md hover:shadow-gray-200" @click="title = 'Ai Chat' "  >
          <a class="flex gap-x-2">          
           <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" >
                <g clip-path="url(#clip0_15_3)">
                <rect width="24" height="24" fill="white"/>
                <path d="M9 21H4C3.44772 21 3 20.5523 3 20V12.4142C3 12.149 3.10536 11.8946 3.29289 11.7071L11.2929 3.70711C11.6834 3.31658 12.3166 3.31658 12.7071 3.70711L20.7071 11.7071C20.8946 11.8946 21 12.149 21 12.4142V20C21 20.5523 20.5523 21 20 21H15M9 21H15M9 21V15C9 14.4477 9.44772 14 10 14H14C14.5523 14 15 14.4477 15 15V21" stroke="#000000" stroke-linejoin="round"/>
                </g>
                <defs>
                <clipPath id="clip0_15_3">
                <rect width="24" height="24" fill="white"/>
                </clipPath>
                </defs>
            </svg>          
             <span>Ai Chat</span></a>
          </li> --}}
        

        
        {{-- <li class="title  text-start w-full mb-2 mt-4 ">Custom</li>

        <li class="pl-2 mb-1   py-1 hover:text-gray-600 hover:shadow-md hover:shadow-gray-200 bordr">
          <a class="flex gap-x-2">          
           <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 4L9 20M15 4L15 20M3 9H21M3 15H21M6.2 20H17.8C18.9201 20 19.4802 20 19.908 19.782C20.2843 19.5903 20.5903 19.2843 20.782 18.908C21 18.4802 21 17.9201 21 16.8V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H6.2C5.07989 4 4.51984 4 4.09202 4.21799C3.71569 4.40973 3.40973 4.71569 3.21799 5.09202C3 5.51984 3 6.07989 3 7.2V16.8C3 17.9201 3 18.4802 3.21799 18.908C3.40973 19.2843 3.71569 19.5903 4.09202 19.782C4.51984 20 5.07989 20 6.2 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
             <span>Tablas</span></a>
          </li>

      
           <x-dropdown2  title="opciones">
            <li class="pl-2  mb-1   py-1 hover:text-gray-600 hover:shadow-md hover:shadow-gray-200"><a href="/">- opcion 1</a></li>
            <li class="pl-2  mb-1   py-1 hover:text-gray-600 hover:shadow-md hover:shadow-gray-200"><a>- opcion 2</a></li>
            
          </x-dropdown2> 

          <li class="pl-2 mb-1   py-1 hover:text-gray-600 hover:shadow-md hover:shadow-gray-200">
          <a class="flex gap-x-2">          
           <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" >
                <g clip-path="url(#clip0_15_3)">
                <rect width="24" height="24" fill="white"/>
                <path d="M9 21H4C3.44772 21 3 20.5523 3 20V12.4142C3 12.149 3.10536 11.8946 3.29289 11.7071L11.2929 3.70711C11.6834 3.31658 12.3166 3.31658 12.7071 3.70711L20.7071 11.7071C20.8946 11.8946 21 12.149 21 12.4142V20C21 20.5523 20.5523 21 20 21H15M9 21H15M9 21V15C9 14.4477 9.44772 14 10 14H14C14.5523 14 15 14.4477 15 15V21" stroke="#000000" stroke-linejoin="round"/>
                </g>
                <defs>
                <clipPath id="clip0_15_3">
                <rect width="24" height="24" fill="white"/>
                </clipPath>
                </defs>
            </svg>          
             <span>Tablas</span></a>
          </li>
        




        

              
            
          
        
        
      </ul> --}}


    {{-- </div> --}}

  
  
  
</div>


