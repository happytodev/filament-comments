<?php

//namespace Happytodev\FilamentComments\Components;
namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class FilamentComments extends Component
{
    public $comment;

    public $post;

    // public $name;

    /**
     * Create a new component instance.
     *
     * @param string $name
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('filament-comments::components.happytodev.filament-comments');
    }
}
