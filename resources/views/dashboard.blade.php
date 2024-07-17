<x-app-layout>     
    <x-slot name="headerT">
    Dashboard
  </x-slot>



@if(auth()->user()->hasAnyRole([
            'Administrador', 'AdministridaorPrincipal', 
            ]) && auth()->user()->estado == 1 )        
        @livewire('admin.dashboard')

  @else 

      @livewire('admin.guest.index')  

 @endif
  

</x-app-layout>
