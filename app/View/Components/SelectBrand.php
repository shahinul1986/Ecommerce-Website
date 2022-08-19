<?php

namespace App\View\Components;

use App\Models\Brand;
use Illuminate\View\Component;

class SelectBrand extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $options, $name;

    public function __construct($name = null)
    {
        $this->name = $name;
        $this->options = $this->getOptions();
    }

    public function getOptions()
    {
        $options = [];
        
        foreach(Brand::all() as $brand){
            $options[] = ['id' => $brand->id, 'value' => $brand->title];
        }

        return $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
