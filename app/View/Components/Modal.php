<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id, $title, $size, $centered;
    public $index;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $title,
        $size = null,
        $id,
        $centered = true,
        $index = 1
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->centered = $centered;
        $this->size = $size;
        $this->index = $index;
    }

    public function modalsize()
    {
        return !is_null($this->size) ? 'modal-' . $this->size : '';
    }

    public function zindex()
    {
        return $this->index * 1050;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
