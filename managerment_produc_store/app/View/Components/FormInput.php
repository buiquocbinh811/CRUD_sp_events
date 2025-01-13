<?php
namespace App\View\Components;
use Illuminate\View\Component;

class FormInput extends Component
{
    public $type;//loại input, nhãn , bắt buộc
    public $name;
    public $label;
    public $value;
    public $required;
    //function __construct 
    public function __construct($type, $name, $label, $value = '', $required = false)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
    }
// Nhận giá trị từ blade view khi gọi component
    public function render()
    {
        return view('components.form-input');
    }
}