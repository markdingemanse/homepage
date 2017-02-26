<?php

namespace App\Jobs\Homepage;

use Illuminate\Support\Facades\Log;
use App\Jobs\Job;
use willvincent\Feeds\Facades\FeedsFacade as Feeds;
use App\Models\Symphonic;
use Illuminate\Contracts\Mail\Mailer;
use App\Mail\SympoMail;

class SymphonicMetalCheckJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //...
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        Feeds $feed,
        Mailer $mail
    ) {
        $feedArray = $feed::make(env('REDDIT_SYMPHONICMETAL_RSS_URL'));
        $newItem   = $feedArray->get_items()[0];
        $title     = $newItem->get_title();

        $model     = new Symphonic;
        $post      = $model
                     ->where('first_post', $title)
                     ->first();

        if(is_null($post)) {
            $this->newPost($model, $title);
            $this->sendMail($post, $newItem, $mail);
            return $title;
        }

        if ($post->getFirstPost() == $title) {
            Log::info("no new content found on r/symphonicmetal");
            return $post;
        }

        $this->newPost($model, $title);
        $this->sendMail($post, $newItem, $mail);

        return $post;
    }

    private function newPost($model, $title) {
        $model->create([
            'first_post' => $title,
        ]);

        Log::info("written a new item from reddit r/symphonicmetal into the db.");
    }

    private function sendMail($post, $newItem, $mail) {
        Log::info("Starting to send mail!!!");
        $mail->to(env('EMAIL'))->queue(new SympoMail($newItem, $post));

        Log::info("Mail is send!!!");
    }
}
