<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\CmsTheme;

class ThemeComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $ascent_bg_color;
    public $ascent_text_color;
    public $top_header_bg_color;
    public $top_header_text_color;
    public $footer_bg_color;
    public $footer_text_color;
    public $heading_color;
    public $hero_image;

    public function render()
    {
        if (CmsTheme::first()) {
            $cmsTheme = CmsTheme::first();

            $this->name = $cmsTheme->name;
            $this->ascent_bg_color = $cmsTheme->ascent_bg_color;
            $this->ascent_text_color = $cmsTheme->ascent_text_color;
            $this->top_header_bg_color = $cmsTheme->top_header_bg_color;
            $this->top_header_text_color = $cmsTheme->top_header_text_color;
            $this->footer_bg_color = $cmsTheme->footer_bg_color;
            $this->footer_text_color = $cmsTheme->footer_text_color;
            $this->heading_color = $cmsTheme->heading_color;
        }

        return view('livewire.cms.theme-component');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'ascent_bg_color' => 'required',
            'ascent_text_color' => 'required',
            'top_header_bg_color' => 'required',
            'top_header_text_color' => 'required',
            'footer_bg_color' => 'required',
            'footer_text_color' => 'required',
            'heading_color' => 'required',
            'hero_image' => 'required|image',
        ]);

        if ($this->hero_image !== null) {
            $heroImagePath = $this->hero_image->store('products', 'public');
            $validatedData['hero_image_path'] = $heroImagePath;
        }

        CmsTheme::create($validatedData);

        dd('Theme saved');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'ascent_bg_color' => 'required',
            'ascent_text_color' => 'required',
            'top_header_bg_color' => 'required',
            'top_header_text_color' => 'required',
            'footer_bg_color' => 'required',
            'footer_text_color' => 'required',
            'heading_color' => 'required',
            'hero_image' => 'nullable|image',
        ]);

        if ($this->hero_image !== null) {
            $heroImagePath = $this->hero_image->store('products', 'public');
            $validatedData['hero_image_path'] = $heroImagePath;
        }

        $cmsTheme = CmsTheme::first();

        $cmsTheme->update($validatedData);

        dd('Theme updated');
    }
}
