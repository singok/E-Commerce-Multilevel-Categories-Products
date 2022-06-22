<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContentHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $heading;
    public $routeName;
    public $title;
    public function __construct($heading, $rName, $title)
    {
        $this->heading = $heading;
        $this->routeName = $rName;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content-header');
    }
}
