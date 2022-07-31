<?php

namespace App\Http\Livewire\FilamentComments;

use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class PostComments extends Component
{
    use AuthorizesRequests;

    public Comment $comment;

    public $commentable_id;

    public function mount()
    {
        // dd($this->request);
        //dd(Url::previous());
        if (Auth::id() == null) {
            Session::put('url.intended', URL::current());
        }

        //dd(URL::previous());
        //Session::put('url.intended',URL::previous());

        //return view('login');
        $this->comment = new Comment();

        $this->comment->user_id = Auth::id();

        $this->comment->commentable_id = $this->commentable_id;

        $this->comment->commentable_type = 'App\Models\Post';
    }

    protected $rules = [
        'comment.comment' => 'required|string|min:6',
        'comment.user_id' => 'required|int',
        'comment.commentable_id' => 'required|int',
        'comment.commentable_type' => 'required|string',
    ];

    public function render()
    {
        //dd($this);
        return view('livewire.filament-comments.post-comments');
    }

    public function save()
    {
        //$this->middleware('auth');
        //dd($this->comment);
        // $this->authorize()

        // $validateResult = $this->validate();
        //dd($validateResult);

        $this->comment->save();

        $this->comment->comment = '';

        $this->emitTo('filament-comments.show-comments', 'refreshComponent');
    }
}
