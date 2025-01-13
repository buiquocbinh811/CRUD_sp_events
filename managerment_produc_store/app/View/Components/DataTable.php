<?php
namespace App\View\Components;
use Illuminate\View\Component;

class DataTable extends Component
{
    public $items;      // store datafrom Model (products, stores,...)
    public $config;     // set up make column 
    public $table;      // name table to make router 

    public function __construct($items, $config, $table)
    {
        $this->items = $items;// $products from Controller
        $this->config = $config;
        $this->table = $table;// name table
    }
    //render view
    public function render()
    {
        return view('components.data-table');//render view template
    }
}