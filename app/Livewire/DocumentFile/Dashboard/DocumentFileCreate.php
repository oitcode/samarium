<?php

namespace App\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\DocumentFile\DocumentFile;

class DocumentFileCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $document_file;
    public $description;

    public function render(): View
    {
        return view('livewire.document-file.dashboard.document-file-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'document_file' => 'required',
            'description' => 'required',
        ]);

        $filePath = $this->document_file->store('documentFile', 'public');
        $validatedData['file_path'] = $filePath;

        /* User which created this record. */
        $validatedData['creator_id'] = Auth::user()->id;

        DocumentFile::create($validatedData);

        $this->dispatch('documentFileCreateCompleted');
    }
}
