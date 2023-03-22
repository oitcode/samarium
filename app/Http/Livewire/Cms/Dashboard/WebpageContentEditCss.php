<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\CmsWebpageContentCssOption;

class WebpageContentEditCss extends Component
{
    public $webpageContent;

    public $margin_top;
    public $margin_bottom;
    public $margin_left;
    public $margin_right;

    public $padding_top;
    public $padding_bottom;
    public $padding_left;
    public $padding_right;

    public $animation;

    public $bg_color;
    public $text_color;

    public function mount()
    {
        /* Margin */
        $marginTopOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'margin-top')->first();
        if ($marginTopOption) {
            $this->margin_top = $marginTopOption->option_value;
        }

        $marginBottomOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'margin-bottom')->first();
        if ($marginBottomOption) {
            $this->margin_bottom = $marginBottomOption->option_value;
        }

        $marginLeftOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'margin-left')->first();
        if ($marginLeftOption) {
            $this->margin_left = $marginLeftOption->option_value;
        }

        $marginRightOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'margin-right')->first();
        if ($marginRightOption) {
            $this->margin_right = $marginLeftOption->option_value;
        }


        /* Padding */
        $paddingTopOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'padding-top')->first();
        if ($paddingTopOption) {
            $this->padding_top = $paddingTopOption->option_value;
        }

        $paddingBottomOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'padding-bottom')->first();
        if ($paddingBottomOption) {
            $this->padding_bottom = $paddingBottomOption->option_value;
        }

        $paddingLeftOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'padding-left')->first();
        if ($paddingLeftOption) {
            $this->padding_left = $paddingLeftOption->option_value;
        }

        $paddingRightOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'padding-right')->first();
        if ($paddingRightOption) {
            $this->padding_right = $paddingLeftOption->option_value;
        }


        /* Background color */
        $bgColorOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'background-color')->first();
        if ($bgColorOption) {
            $this->bg_color = $bgColorOption->option_value;
        }

        /* (Text) Color */
        $textColorOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'color')->first();
        if ($textColorOption) {
            $this->text_color = $textColorOption->option_value;
        }

        /* Animation */
        $animationOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', 'animation')->first();
        if ($animationOption) {
            $this->animation = $animationOption->option_value;
        }
    }

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-content-edit-css');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'margin_top' => 'nullable',
            'margin_bottom' => 'nullable',
            'margin_left' => 'nullable',
            'margin_right' => 'nullable',

            'padding_top' => 'nullable',
            'padding_bottom' => 'nullable',
            'padding_left' => 'nullable',
            'padding_right' => 'nullable',

            'bg_color' => 'nullable',
            'text_color' => 'nullable',

            'animation' => 'nullable',
        ]);

        /* dd ($validatedData); */

        if ($validatedData['margin_top']) {
            $this->addCssOption('margin-top', $validatedData['margin_top']);
        }
        if ($validatedData['margin_bottom']) {
            $this->addCssOption('margin-bottom', $validatedData['margin_bottom']);
        }
        if ($validatedData['margin_left']) {
            $this->addCssOption('margin-left', $validatedData['margin_left']);
        }
        if ($validatedData['margin_right']) {
            $this->addCssOption('margin-right', $validatedData['margin_right']);
        }

        if ($validatedData['padding_top']) {
            $this->addCssOption('padding-top', $validatedData['padding_top']);
        }
        if ($validatedData['padding_bottom']) {
            $this->addCssOption('padding-bottom', $validatedData['padding_bottom']);
        }
        if ($validatedData['padding_left']) {
            $this->addCssOption('padding-left', $validatedData['padding_left']);
        }
        if ($validatedData['padding_right']) {
            $this->addCssOption('padding-right', $validatedData['padding_right']);
        }

        if ($validatedData['bg_color']) {
            $this->addCssOption('background-color', $validatedData['bg_color']);
        }

        if ($validatedData['text_color']) {
            $this->addCssOption('color', $validatedData['text_color']);
        }

        if ($validatedData['animation']) {
            $this->addCssOption('animation', $validatedData['animation']);
        }

        $this->emit('webpageContentEditCssCompleted');
    }

    public function addCssOption($optionName, $optionValue)
    {
        $cmsWebpageContentCssOption = $this->webpageContent->cmsWebpageContentCssOptions()->where('option_name', $optionName)->first();

        if (! $cmsWebpageContentCssOption) {
            $cmsWebpageContentCssOption = new CmsWebpageContentCssOption;

            $cmsWebpageContentCssOption->option_name = $optionName;
            $cmsWebpageContentCssOption->option_value = $optionValue;

            $cmsWebpageContentCssOption->webpage_content_id = $this->webpageContent->webpage_content_id;

            $cmsWebpageContentCssOption->save();
        } else {
            $cmsWebpageContentCssOption->option_name = $optionName;
            $cmsWebpageContentCssOption->option_value = $optionValue;

            $cmsWebpageContentCssOption->save();
        }
    }
}
