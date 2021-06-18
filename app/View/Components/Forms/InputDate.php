<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputDate extends Component
{
    public $id, $name, $label, $placeholder;
    public $topclass, $inputclass;
    public $value, $disabled, $required;
    public $format;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id,
        $name = null,
        $label = null,
        $placeholder = null,
        $topclass = null,
        $inputclass = null,
        $value = null,
        $disabled = false,
        $required = false,
        $format = 'YYYY-MM-DD'
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->topclass = $topclass;
        $this->inputclass = $inputclass;
        $this->value = $value;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->format = $format;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-date');
    }
}
