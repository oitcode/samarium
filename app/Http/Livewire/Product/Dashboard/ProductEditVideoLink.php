<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductEditVideoLink extends Component
{
    public $product;

    public $video_link;

    public function render()
    {
        return view('livewire.product.dashboard.product-edit-video-link');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'video_link' => 'required',
        ]);

        $this->product->video_link = $validatedData['video_link'];
        $this->product->save();

        $this->emit('productUpdateVideoLinkCompleted');
    }
}
