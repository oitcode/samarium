<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $title;
    public $faClass;
    public $clickMethod;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $faClass, $clickMethod)
    {
        $this->title = $title;
        $this->faClass = $faClass;
        $this->clickMethod = $clickMethod;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
