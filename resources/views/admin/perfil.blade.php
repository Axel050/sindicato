<x-app-layout>     
    <x-slot name="headerT">
   Perfil 
  </x-slot>


      @if(auth()->user()->hasAnyRole(['Administrador', 'AdministradorPrincipal', ])
            && auth()->user()->estado == 1 )        
          
          @livewire('admin.perfil-actual.show-usuario')

      @else

          @livewire('admin.perfil-actual.show')

      @endif

</x-app-layout>