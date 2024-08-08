<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class inputTag extends Component
{
    public $type = "text";
    public $name = "username";
    public $label = "username";
    /**
     * Create a new component instance.
     */
    public function __construct($type = "text",$name = "username",$label = "username")
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-tag');
    }
}
