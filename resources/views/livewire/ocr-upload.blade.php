<div>
    <h2 class="text-2xl font-semibold mb-4">Upload Document for OCR</h2>
    
     @if($successMessage)
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            <p class="font-semibold">{{ $successMessage }}</p>
        </div>
    @endif 
     
    <form wire:submit.prevent="process">
        <div class="mb-4">
            <label for="document" class="block mb-1 font-medium">Select Image</label>
            <input type="file" id="document" wire:model="document" class="w-full border border-gray-300 rounded-md shadow-sm" accept="image/*">
            <p class="mt-1 text-sm text-gray-600">Supported formats: JPG, PNG, GIF</p>
            @error('document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Upload & Process Image
            </button>
        </div>
    </form>
    
    @if($ocrText)
        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-3">OCR Results:</h3>             
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                <div class="whitespace-pre-wrap text-gray-800 font-normal leading-relaxed">{{ $ocrText }}</div>
            </div>
        </div>
    @endif
</div>