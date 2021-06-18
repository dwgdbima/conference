<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Option extends Component
{
    public $value, $icon, $content;
    public $selected, $disabled;
    public $old;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $value = null,
        $icon = false,
        $content = null,
        $selected = false,
        $disabled = false,
        $old = null,
    ) {
        $this->value = $value;
        $this->icon = $icon;
        $this->content = $content;
        $this->selected = $selected;
        $this->disabled = $disabled;
        $this->old = $old;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.option');
    }
}
