<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRadio extends Component
{
    public $name;
    public $label;
    public $options;
    public $value;

    public function __construct($name, $label, $options, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.form-radio');
    }
}
