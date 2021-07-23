<?php

namespace App\Http\Livewire;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentSection extends Component
{
    public $book;
    public $comment;
    public $comments;
    public function mount()
    {
        $this->fill(['comment'=>'']);
        $this->comments = Comment::where('book_id',$this->book->id )->get();
    }
    public function addComment()
    {
        /*
         * Add validation
         */
        $this->validate([
            'comment'=>'required|string'
        ]);
     $newComment = Comment::create([
            'user_id'=>auth()->id(),
            'book_id'=>$this->book->id,
            'body'=>$this->comment
        ]);
     $this->comments->push($newComment);

        /*$this->reset(['comment']);*/
        $this->comment = "";
        session()->flash('success','comment added');

    }
    public function render()
    {
        return view('livewire.comment-section');
    }
}
