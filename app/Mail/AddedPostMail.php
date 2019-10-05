<?php

namespace App\Mail;

use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class AddedPostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $post = Post::where('user_id',auth()->user()->id)
            ->orderBy('created_at', 'DESC')->first();
        //$posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return $this->view('emails.addedpost')->with('post', $post);
    }
}
