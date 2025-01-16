<x-app-layout>     
    <x-slot name="headerT">
    Dashboard
    {{-- @dump(auth()->user()->estado) --}}
  </x-slot>



@if(auth()->user()->hasAnyRole(['Administrador', 'AdministradorPrincipal', ]) && auth()->user()->estado == 1 )        
        @livewire('admin.dashboard')

  @else 

      @livewire('admin.guest.index')  

 @endif
  

</x-app-layout>
