<?php

namespace App\Http\Livewire\FilamentComments;

use App\Models\Post;
use Livewire\Component;

class ShowComments extends Component
{
    public $commentable_id;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.filament-comments.show-comments', [
            'comments' => Post::find($this->commentable_id)->comments->sortByDesc('created_at'),
            'postAuthor' => Post::find($this->commentable_id)->user_id
        ]);
    }
}
