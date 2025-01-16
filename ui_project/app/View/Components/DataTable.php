<?php
namespace App\View\Components;
use Illuminate\View\Component;

class DataTable extends Component
{
    public $items;
    public $config;
    public $table;

    public function __construct($items, $config, $table)
    {
        $this->items = $items;
        $this->config = $config;
        $this->table = $table;
    }

    public function render()
    {
        return view('components.data-table');
    }
}