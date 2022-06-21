<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $color;
    public $count;
    public $icon;
    public $name;
    public function __construct($bgColor, $total, $iconName, $cardName)
    {
        $this->color = $bgColor;
        $this->count = $total;
        $this->icon = $iconName;
        $this->name = $cardName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
