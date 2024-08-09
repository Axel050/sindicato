@props(['title', 'value', 'action', 'additionalCondition' => true])

{{-- @dump(["aaa" => $value]) --}}
@if ($value   && $additionalCondition)    

<button class="bg-gray-500 px-2 rounded-lg mt-2 hover:bg-gray-600 hover:text-gray-50 text-gray-100 items-center flex w-fit" wire:click="{{ $action }}">
  <span class="text-sm font-extrabold pr-2">X</span>
  <span class="text-xs "> {{ $title }}: </span><span class="font-semibold text-xs ml-0.5"> {{ $value }}</span>
</button>
@endif