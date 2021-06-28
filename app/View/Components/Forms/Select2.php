<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select2 extends Component
{
    public $id, $name, $label;
    public $topclass, $inputclass;
    public $disabled, $required, $multiple, $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id,
        $name = null,
        $label = null,
        $topclass = null,
        $inputclass = null,
        $placeholder = null,
        $disabled = false,
        $required = false,
        $multiple = false
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->topclass = $topclass;
        $this->inputclass = $inputclass;
        $this->placeholder = $placeholder;
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
        return view('components.forms.select2');
    }
}
