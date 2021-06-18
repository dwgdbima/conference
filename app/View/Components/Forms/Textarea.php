<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $id, $name, $label, $placeholder;
    public $topclass, $inputclass;
    public $disabled, $required;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id = null,
        $name = null,
        $label = null,
        $placeholder = null,
        $topclass = null,
        $inputclass = null,
        $disabled = false,
        $required = false,
        $rows = '10'
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->topclass = $topclass;
        $this->inputclass = $inputclass;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.textarea');
    }
}
