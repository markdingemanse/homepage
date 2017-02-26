<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SympoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The post instance.
     *
     * @var Symphonic
     */
    protected $post;

    /**
     * The RSS Item instance.
     *
     * @var SimplePie_Item
     */
    protected $newItem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newItem, $post)
    {
        $this->newItem = $newItem;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(env('EMAIL'))
            ->subject('A new Song appeared on R/SymphonicMetal')
            ->view('mail.new_song')
            ->with([
                'item' => $this->getItem(),
                'post' => $this->getPost(),
            ]);
    }

    /**
    * getter for the item
    */
    protected function getItem()
    {
        return $this->newItem;
    }

    /**
    * getter for the post
    */
    protected function getPost()
    {
        return $this->post;
    }
}
