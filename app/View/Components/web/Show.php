<?php

namespace App\View\Components\web;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Show extends Component
{
    public $datos;
    /**
     * Create a new component instance.
     */
    public function __construct($datos)
    {
        //
        $this->datos = $datos;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.show');
    }
}
