<x-app-layout>     
    <x-slot name="headerT">
   Requerimientos
  </x-slot>

  @livewire('admin.requerimientos.index',["dni"=>$dni,"p"=>$p])


</x-app-layout>
