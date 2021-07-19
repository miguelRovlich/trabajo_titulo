<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotifyUserOrderStatusChange extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public $data;
    public function __Construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('cms.email_from'), config('cms.name'))
                    ->view('emails.admin_notify_user_order_status_change')
                    ->subject('Su orden #'.$this->data['o_number'].' ha cambiado su estado')
                    ->with($this->data);
    }
}
