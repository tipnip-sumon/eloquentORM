<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    protected $types = ['success','danger'];
    public $type;
    public $message;
    /**
     * Create a new component instance.
     */
    public function __construct(string $type, string $message="No message")
    {
        $this->type = $type;
        $this->message = $message;
    }
    // public function __construct(public string $type, public string $message="No message")
    // {
    //     //
    // }
    public function validType()
    {
        return in_array($this->type,$this->types) ? $this->type : 'info';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
