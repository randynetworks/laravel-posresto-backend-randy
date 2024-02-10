<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    public $type;
    public $label;
    public $name;
    public $value;
    public $errorName;

    public function __construct($type, $label, $name, $value = null, $errorName = null)
    {
        $this->type = $type;
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->errorName = $errorName ?? $name; // Adjust if your error naming differs
    }

    public function render()
    {
        return view('components.form-input');
    }
}
