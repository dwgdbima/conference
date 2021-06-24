<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SelectTypeSubmission extends Component
{
    public $id, $name, $label;
    public $topclass, $inputclass;
    public $disabled, $required, $multiple;
    public $old, $types = [];
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
        $disabled = false,
        $required = false,
        $multiple = false,
        $old = null,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->topclass = $topclass;
        $this->inputclass = $inputclass;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->multiple = $multiple;
        $this->old = $old;
        $this->types = [
            [
                'name' => 'Oral Presentation'
            ],
            [
                'name' => 'Poster Presentation'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select-type-submission');
    }
}
