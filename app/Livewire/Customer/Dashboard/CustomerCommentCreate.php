<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\CustomerComment;

class CustomerCommentCreate extends Component
{
    use WithFileUploads;

    public $customer;

    public $comment_text;
    public $document_file;

    public function render()
    {
        return view('livewire.customer.dashboard.customer-comment-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'comment_text' => 'required',
            'document_file' => 'nullable',
        ]);

        if ($this->document_file) {
            $filePath = $this->document_file->store('customerComment', 'public');
            $validatedData['file_path'] = $filePath;
        }

        $validatedData['customer_id'] = $this->customer->customer_id;

        /* User which created this record. */
        $validatedData['creator_id'] = Auth::user()->id;

        CustomerComment::create($validatedData);

        $this->dispatch('customerCommentCreateCompleted');
    }
}
