<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LoaderSpinner extends Component
{
    public $message;

    public function __construct($message = 'Loading...')
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('components.loader-spinner');
    }
}
