<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductEditVideoLink extends Component
{
    public $product;

    public $video_link;

    public function render(): View
    {
        return view('livewire.product.dashboard.product-edit-video-link');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'video_link' => 'required',
        ]);

        $this->product->video_link = $validatedData['video_link'];
        $this->product->save();

        $this->dispatch('productUpdateVideoLinkCompleted');
    }
}
