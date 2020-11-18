<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $isShow;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->isShow = false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
