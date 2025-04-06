<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LottieAnimation extends Component
{
    public $type;
    public $message;

    public function __construct($type = 'not-found', $message = 'No data found.')
    {
        $this->type = $type;
        $this->message = $message;
    }


    public function render()
    {
        return view('components.lottie-animation');
    }
}