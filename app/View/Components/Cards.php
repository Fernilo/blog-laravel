<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class Cards extends Component
{
    public $post;//propiedad del tipo publico
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;//Accesible por cualquier método del componente
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards');
    }
}
