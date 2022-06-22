<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $info;
    public $type;
    public $routeName;
    public function __construct($label, $btnType, $rName)
    {
        $this->info = $label;
        $this->type = $btnType;
        $this->routeName = $rName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
