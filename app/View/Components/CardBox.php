<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardBox extends Component
{
    public $title;
    public $number;
    public $faClass;
    public $cardBg;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $number, $faClass, $cardBg)
    {
        $this->title = $title;
        $this->number = $number;
        $this->faClass = $faClass;
        $this->cardBg = $cardBg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-box');
    }
}
