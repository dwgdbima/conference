<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type, $id, $name, $label, $placeholder;
    public $topclass, $inputclass;
    public $value, $disabled, $required;
    public $max, $maxlength;
    public $inputgroup, $inputgroupicon;

    public function __construct(
        $type = 'text',
        $id = null,
        $name = null,
        $label = null,
        $placeholder = null,
        $topclass = null,
        $inputclass = null,
        $value = null,
        $disabled = false,
        $required = false,
        $max = null,
        $maxlength = null,
        $inputgroup = null,
        $inputgroupicon = 'fas fa-check'

    ) {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->topclass = $topclass;
        $this->inputclass = $inputclass;
        $this->value = $value;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->max = $max;
        $this->maxlength = $maxlength;
        $this->inputgroup = $inputgroup;
        $this->inputgroupicon = $inputgroupicon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
