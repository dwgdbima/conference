<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DownloadFileName extends Component
{
    public $path;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($path = null)
    {
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.download-file-name');
    }
}
