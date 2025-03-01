<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\CustomerDocumentFile;

class CustomerDocumentFileCreate extends Component
{
    use WithFileUploads;

    public $customer;

    public $name;
    public $document_file;

    public function render(): View
    {
        return view('livewire.customer.dashboard.customer-document-file-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'document_file' => 'required',
        ]);

        if ($this->document_file) {
            $filePath = $this->document_file->store('customerComment', 'public');
            $validatedData['file_path'] = $filePath;
        }

        $validatedData['customer_id'] = $this->customer->customer_id;

        /* User which created this record. */
        $validatedData['creator_id'] = Auth::user()->id;

        CustomerDocumentFile::create($validatedData);

        $this->dispatch('customerDocumentFileCreateCompleted');
    }
}
