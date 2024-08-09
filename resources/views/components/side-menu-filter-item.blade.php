<li class="fle hover:text-gray-200 hover:shadow-md hover:shadow-sky-600 items-center pl-1 mt-1"  
    x-data="{open:false}"     
    :class="{ ' bg-gry-100 textgray-200 bg-gradient-to-l from-sky-300 to-sky-300/10  text-gray-200 font-bold shadow-md shadow-sky-600': open }" 
    @click.outside="open = false"
    >                                                
    
    <div class="flex justify-start items-center py-1">
        <span class="ml-2 lg:mr-8"
         @click="open = !open"
        >{{ $title }}</span>                
        <svg class="ml-auto mr-2" fill="#000000" height="12px" width="12px" version="1.1" id="XMLID_287_" viewBox="0 0 24 24" xml:space="preserve" :class="{ 'rotate-90': open }" @click="open = !open"
        >
            <g id="next">
                <g> 
                    <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12"/>
                </g>
            </g>
        </svg>
    </div>

    {{-- Submenu --}}
    <ul class="flex flex-col mt-1" x-show="open"    >
      <div class="flex text-sm items-center ml-1">
        {{ $slot }}
      </div>
    </ul>   
</li>
