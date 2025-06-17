<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait;
use App\Models\Cms\CmsTheme\CmsTheme;
use App\GalleryImage;

class ThemeComponent extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $name;
    public $ascent_bg_color;
    public $ascent_text_color;
    public $top_header_bg_color;
    public $top_header_text_color;
    public $nav_menu_bg_color;
    public $nav_menu_text_color;
    public $footer_bg_color;
    public $footer_text_color;
    public $heading_color;
    public $hero_image;

    /* These are for logo image update (create?) from library */
    public $selectedMediaImage;

    public $modes = [
        'updateFeaturedImageMode' => false,
        'updateFeaturedImageFromNewUploadMode' => false,
        'updateFeaturedImageFromLibraryMode' => false,
        'mediaFromLibrarySelected' => false,
    ];

    protected $listeners = [
        'mediaImageSelected',
    ];

    public function render(): View
    {
        if (CmsTheme::first()) {
            $cmsTheme = CmsTheme::first();

            $this->name = $cmsTheme->name;
            $this->ascent_bg_color = $cmsTheme->ascent_bg_color;
            $this->ascent_text_color = $cmsTheme->ascent_text_color;
            $this->top_header_bg_color = $cmsTheme->top_header_bg_color;
            $this->top_header_text_color = $cmsTheme->top_header_text_color;
            $this->nav_menu_bg_color = $cmsTheme->nav_menu_bg_color;
            $this->nav_menu_text_color = $cmsTheme->nav_menu_text_color;
            $this->footer_bg_color = $cmsTheme->footer_bg_color;
            $this->footer_text_color = $cmsTheme->footer_text_color;
            $this->heading_color = $cmsTheme->heading_color;
        }

        return view('livewire.cms.dashboard.theme-component');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'ascent_bg_color' => 'required',
            'ascent_text_color' => 'required',
            'top_header_bg_color' => 'required',
            'top_header_text_color' => 'required',
            'nav_menu_bg_color' => 'required',
            'nav_menu_text_color' => 'required',
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

        session()->flash('message', 'Theme created');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'ascent_bg_color' => 'required',
            'ascent_text_color' => 'required',
            'top_header_bg_color' => 'required',
            'top_header_text_color' => 'required',
            'nav_menu_bg_color' => 'required',
            'nav_menu_text_color' => 'required',
            'footer_bg_color' => 'required',
            'footer_text_color' => 'required',
            'heading_color' => 'required',
            'hero_image' => 'nullable|image',
        ]);

        if ($this->hero_image !== null) {
            $heroImagePath = $this->hero_image->store('products', 'public');
            $validatedData['hero_image_path'] = $heroImagePath;
        }

        if ($this->selectedMediaImage) {
            $validatedData['hero_image_path'] = $this->selectedMediaImage->image_path;
        }

        $cmsTheme = CmsTheme::first();
        $cmsTheme->update($validatedData);

        $this->clearModes();
        session()->flash('message', 'Theme updated');
    }

    public function mediaImageSelected(GalleryImage $galleryImage): void
    {
        $this->selectedMediaImage = $galleryImage;
        $this->enterModeSilent('mediaFromLibrarySelected');
    }
}
