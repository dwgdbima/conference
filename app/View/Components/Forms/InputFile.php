<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputFile extends Component
{
    public $id, $name, $label, $placeholder;
    public $topclass, $inputclass;
    public $disabled, $required, $multiple;

    public function __construct(
        $id = null,
        $name = null,
        $label = null,
        $placeholder = null,
        $topclass = null,
        $inputclass = null,
        $disabled = false,
        $required = false,
        $multiple = false
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->topclass = $topclass;
        $this->inputclass = $inputclass;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-file');
    }
}
