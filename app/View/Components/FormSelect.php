<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSelect extends Component
{
    public $name;
    public $label;
    public $options;
    public $selected;

    public function __construct($options, $label, $name, $selected = null)
    {
        $this->options = $options;
        $this->selected = $selected;
        $this->label = $label;
        $this->name = $name;
    }

    public function render()
    {
        return view('components.form-select');
    }
}
