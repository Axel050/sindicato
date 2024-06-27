@props(['on'])

<div x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none;"
      {{ $attributes->merge(['class' => 'text-sm text-gray-100 border-l-[10px] border-2   rounded-r-lg lg:w-72 w-60 pl-4 py-0.5 ']) }}>
    {{  $slot }}
  </div>
  
  {{-- { $slot->isEmpty() ? 'Saved.' : $slot }} --}}
    {{-- {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }}> --}}