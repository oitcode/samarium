<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Traits\ModesTrait;

use App\Company;
use App\GalleryImage;

class CompanyComponent extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $company = null;

    public $name;
    public $tagline;
    public $phone;
    public $email;
    public $address;
    public $pan_number;
    public $logo_image;

    public $fb_link;
    public $twitter_link;
    public $insta_link;
    public $youtube_link;
    public $tiktok_link;

    /* These are for logo image update (create?) from library */
    public $selectedMediaImage;

    public $modes = [
        'updateLogoImageMode' => false,
        'updateLogoImageFromNewUploadMode' => false,
        'updateLogoImageFromLibraryMode' => false,
        'imageFromLibraryIsSelectedMode' => false,
        'mediaFromLibrarySelected' =>false,
    ];

    protected $listeners = [
        'mediaImageSelected',
    ];

    public function render()
    {
        $this->company = Company::first();

        if ($this->company) {
            $this->name = $this->company->name;
            $this->tagline = $this->company->tagline;
            $this->phone = $this->company->phone;
            $this->email = $this->company->email;
            $this->address = $this->company->address;
            $this->pan_number = $this->company->pan_number;

            $this->fb_link = $this->company->fb_link;
            $this->twitter_link = $this->company->twitter_link;
            $this->insta_link = $this->company->insta_link;
            $this->youtube_link = $this->company->youtube_link;
            $this->tiktok_link = $this->company->tiktok_link;
        }

        return view('livewire.company-component');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'tagline' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'pan_number' => 'nullable',
            'logo_image' => 'image',

            'fb_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'insta_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
        ]);

        $imagePath = $this->logo_image->store('company', 'public');
        $validatedData['logo_image_path'] = $imagePath;

        Company::create($validatedData);

        $this->render();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'tagline' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'pan_number' => 'nullable',
            'logo_image' => 'nullable|image',

            'fb_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'insta_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
        ]);

        if ($this->logo_image) {
            $imagePath = $this->logo_image->store('company', 'public');
            $validatedData['logo_image_path'] = $imagePath;
        }

        if ($this->selectedMediaImage) {
            $validatedData['logo_image_path'] = $this->selectedMediaImage->image_path;
        }

        $company = Company::first(); 
        $company->update($validatedData);

        $this->clearModes();

        session()->flash('message', 'Updated');
        $this->render();
    }

    public function selectImageFromLibrary(GalleryImage $galleryImage)
    {
        $this->imageSelectedFromLibrary = $galleryImage;
        $this->enterModeSilent('imageFromLibraryIsSelectedMode');
    }

    public function updateLogoImageFromLibrary(GalleryImage $galleryImage)
    {
        $this->company->logo_image_path = $galleryImage->image_path;
        $this->company->save();
        $this->clearModes();
    }

    public function mediaImageSelected(GalleryImage $galleryImage)
    {
        $this->selectedMediaImage = $galleryImage;
        $this->enterModeSilent('mediaFromLibrarySelected');
    }
}
