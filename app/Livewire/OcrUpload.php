<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use thiagoalessio\TesseractOCR\TesseractOCR;
use App\Models\OcrDocument;
use Illuminate\Support\Facades\Storage;

class OcrUpload extends Component
{
    use WithFileUploads;

    public $document;
    public $ocrText;
    public $successMessage;

    protected $rules = [
        'document' => 'required|file|image|max:10240',
    ];

    public function render()
    {
        return view('livewire.ocr-upload');
    }

    public function process()
    {
        $this->validate();

        if ($this->document) {
            // Store the file
            $fileName = time() . '_' . $this->document->getClientOriginalName();
            $filePath = $this->document->storeAs('ocr-documents', $fileName, 'public');
            $fullPath = Storage::disk('public')->path($filePath);

            // Process with Tesseract OCR
            $tesseract = new TesseractOCR($fullPath);
            $this->ocrText = $tesseract->run();

            // Save to database
            OcrDocument::create([
                'title' => pathinfo($this->document->getClientOriginalName(), PATHINFO_FILENAME),
                'filename' => $fileName,
                'original_filename' => $this->document->getClientOriginalName(),
                'file_path' => $filePath,
                'mime_type' => $this->document->getMimeType(),
                'file_size' => $this->document->getSize(),
                'is_processed' => true,
                'text_content' => $this->ocrText,
            ]);

            $this->successMessage = 'Image uploaded and processed successfully!';
        }
    }
}