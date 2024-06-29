<?php

namespace App\Http\Livewire\Cms\Website;

use Livewire\Component;

use App\WebpageQuestion;

class CreateWebpageQuestion extends Component
{
    public $webpage;

    public $writer_name; 
    public $writer_email; 
    public $writer_phone; 
    public $question_text; 

    public function render()
    {
        return view('livewire.cms.website.create-webpage-question');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'writer_name' => 'nullable',
            'writer_email' => 'required|email',
            'writer_phone' => 'required',
            'question_text' => 'required|string',
        ]);

        $validatedData['webpage_id'] = $this->webpage->webpage_id;

        WebpageQuestion::create($validatedData);
        $this->resetInputFields();
        session()->flash('message', 'Enquiry sumbmitted');
    }

    public function resetInputFields()
    {
        $this->writer_name = '';
        $this->writer_email = '';
        $this->writer_phone = '';
        $this->question_text = '';
    }
}
