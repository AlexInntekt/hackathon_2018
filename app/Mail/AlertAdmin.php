<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class AlertAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $user_email;
    public $complaint;
    public $file_path;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $user_email,$complaint, $storage_path)
    {
        $this->username = $username;
        $this->user_email = $user_email;
        $this->complaint = $complaint;
        $this->file_path = $storage_path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cleverCodeTeam@gmail.com')->to($this->user_email)->view('alert.mail')->attach($this->file_path);
    }
}
