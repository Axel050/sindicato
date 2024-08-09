<div x-data="imageUploader('{{ $image ? Storage::url($image) : '' }}')" class=" mt-2 border flex flex-col bg-reen-300 ">
    <label for="formFile" class="mb-2">Banner </label>
     <div class= "flex flex-col items-center ml-10" x-data="{de:0}">
       
            <template x-if="!isImageLoaded">
              <div class=" flex flex-col items-center">
                <div class="w-[150px] border-4 border-dotted border-gray-600 h-[100px] flex items-center justify-center mb-2 mt-2">
                  <span>Imagen</span>
                </div>
                <button type="button" class="btn bg-green-400 px-4 py-0.5 text-sm rounded-lg  text-white" 
                @click="$refs.fileInput.click()">Cargar</button>
              </div>
            </template>    

          
            <button type="button" class="btn text-sm  mb-2   bg-orange-500  text-white px-4 py-0.5 rounded-lg" x-show="isImageLoaded" @click="$refs.fileInput.click()">Cambiar</button>
            
            <template x-if="isImageLoaded">
              <div class="relative borde text-center flex ">
              <img :src="image" alt="Imagen cargada" class="img-thumbnail "  class="w-[150px] ">

             </div>
             </template>
             
             <input type="hidden" name="{{$name}}has" :id="'formFile' + $id" :value="de">

             <input type="file" :id="'formFile' + $id" name="{{$name}}" accept=".jpg, .jpeg, .png"
             x-ref="fileInput" class="hidden" 
             @change="isImageLoaded = true; image = URL.createObjectURL($event.target.files[0])">  
             
                          
             <button type="button" class="btn text-sm  mb-1   bg-red-500  text-white px-4 py-0.5 rounded-lg mt-2"
             @click="image = ''; isImageLoaded = false;de=1" x-show="isImageLoaded">Eliminar</button>

             
    </div>
    
    @error($errorName)
        <span class="text-danger mt-2 ms-2 " style="font-size: 11px">{{ $message }}</span>          
    @enderror
</div>
