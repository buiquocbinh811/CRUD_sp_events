<?php
namespace App\View\Components;
use Illuminate\View\Component;

class FormInput extends Component
{
    public $type;
    public $name;
    public $label;
    public $value;
    public $required;
    //function contructor
    public function __construct($type, $name, $label, $value = '', $required = false)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.form-input');
    }
}