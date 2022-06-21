<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $routeName;
    public $body;
    public $iconName;
    public function __construct($rname, $name, $icon)
    {
        $this->routeName = $rname;
        $this->body = $name;
        $this->iconName = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }
}
