<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\CmsTheme;

class ThemeComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $top_header_color;
    public $footer_color;
    public $hero_image;

    public function render()
    {
        return view('livewire.cms.theme-component');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'top_header_color' => 'required',
            'footer_color' => 'required',
            'hero_image' => 'required|image',
        ]);

        if ($this->hero_image !== null) {
            $heroImagePath = $this->hero_image->store('products', 'public');
            $validatedData['hero_image_path'] = $heroImagePath;
        }

        if (! CmsTheme::first()) {
            CmsTheme::create($validatedData);
        } else {
            $cmsTheme = CmsTheme::first();

            $cmsTheme->update($validatedData);
        }

        dd('Theme saved');
    }
}
