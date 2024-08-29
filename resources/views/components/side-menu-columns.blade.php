<div class=" absolute  top-0 right-0  max-h-screen h-full overflow-y-auto  pt-2  transition-all duration-500 border-gray-300   border-r-2 bg-blue-600 z-50 pb-2"  
    :class="openColumn? 'lg:w-[360px] lg:min-w-[360px]  w-full  ' : 'w-0 '  "             
    x-cloak
        >  


        <button @click="openColumn = !openColumn" class="absolute top-2 left-3 rounded-full bg-white text-red-800 font-extrabold w-6 h-6 hover:bg-gray-200 "    >X</button>

    <div  class="w-full   g-green-200 flex justify-center  mb-2 mt-1  ">      
        <h2 class="text-2xl font-extrabold  w-full text-center text-white ">Columnas</h2>
    </div>

     
      <ul class="grid grid-cols-2 px-4  mt-4 text-gray-50    [&>li]:cursor-pointer  text-sm space-y-2 ">        
     
        <li>
          <x-checkbox  wire:model="selectedColumns" value="id"  class="mr-2 " />
          ID
        </li>

        <li>
          <x-checkbox  wire:model="selectedColumns" value="name"  class="mr-2" />
          Nombre
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="apellido"  class="mr-2" />
         Apellido
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="documento"  class="mr-2"  />
         Dni
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="empresa"  class="mr-2"  />
         Empresa
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="sector"  class="mr-2"  />
         Sector
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="estado"  class="mr-2"  />
         Estado
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="rol"  class="mr-2"  />
          Rol          
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="accion"  class="mr-2"  />
          Acción
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="email"  class="mr-2"  />
          Email
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="telefono"  class="mr-2"  />
          Telefono
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="genero"  class="mr-2"  />
          Genero
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="condicion"  class="mr-2"  />
          Condicion
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="localidad"  class="mr-2"  />
          Localidad
        </li>
        
        <li>          
          <x-checkbox  wire:model="selectedColumns" value="gremio"  class="mr-2"  />
          Gremio
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="fechaNac"  class="mr-2"  />
          Fecha Nacimiento
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="fechaAfi"  class="mr-2"  />
          Fecha Afiliacion
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="direccion"  class="mr-2"  />
          Direccion
        </li>


        <li>          
          <x-checkbox  wire:model="selectedColumns" value="conyuge"  class="mr-2"  />
          Conyuge
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="conyugeNom"  class="mr-2"  />
          Conyuge nombre
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="conyugeApe"  class="mr-2"  />
          Conyuge apellido
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="conyugeDni"  class="mr-2"  />
          Conyuge dni
        </li>


        <li>          
          <x-checkbox  wire:model="selectedColumns" value="hijosCant"  class="mr-2"  />
          Hijos cantidad
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="hijoNombre"  class="mr-2"  />
          Hijo nombre
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="hijoApellido"  class="mr-2"  />
          Hijo apellido
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="hijoDni"  class="mr-2"  />
          Hijo dni
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="hijoGenero"  class="mr-2"  />
          Hijo genero
        </li>

        <li>          
          <x-checkbox  wire:model="selectedColumns" value="hijoEdad"  class="mr-2"  />
          Hijo edad
        </li>
                  
            
      </ul>            
      
            <button class="bg-gray-100 rounded-lg px-3 py-1   lg:mt-6 mt-3 text-base hover:bg-gray-200 font-semibold text-blue-900 flex w-[80%] justify-center mx-auto" 
            wire:click="showColumns"  @click="openColumn = !openColumn" 
            >Aplicar
           </button>
            
  
</div>


