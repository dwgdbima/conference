<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Decision extends Component
{
    public $decision;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($decision = 0)
    {
        $this->decision = $decision;
    }

    public function badge()
    {
        switch ($this->decision) {
            case '0':
                return 'badge-secondary';
                break;
            case '1':
                return 'badge-success';
                break;
            case 2:
                return 'badge-warning';
                break;
            case '3':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }

    public function fa()
    {
        switch ($this->decision) {
            case '0':
                return 'fas fa-stopwatch';
                break;
            case '1':
                return 'fas fa-check';
                break;
            case '2':
                return 'fas fa-exclamation';
                break;
            case '3':
                return 'fas fa-times';
            default:
                return 'fas fa-stopwatch';
        }
    }

    public function text()
    {
        switch ($this->decision) {
            case '0':
                return 'Undecide';
                break;
            case '1':
                return 'Accepted';
                break;
            case '2':
                return 'Revise';
                break;
            case '3':
                return 'Rejected';
            default:
                return 'Undecide';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.decision', ['badge' => $this->badge(), 'fa' => $this->fa(), 'text' => $this->text()]);
    }
}
