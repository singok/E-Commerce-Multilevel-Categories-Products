<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $name;
    public $placeholder;
    public $label;
    public $id; 
    public function __construct($id, $name, $placeholder, $label, $type)
    {
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->id = $id; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-box');
    }
}
