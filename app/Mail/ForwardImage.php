<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Camimage;

class ForwardImage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Mail information(subject, text).
     *
     * @return void
     */
    public $info;

    /**
     * Path to image.
     *
     * @return void
     */
    public $path;
    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $url;
    public function __construct($request)
    {
        $this->data = $request;
        $this->path = CamImage::find($request->img_id)->bild;
        $id = $this->data->img_id;
        $this->url = route('images.index')."#img_$id";

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.forward_image',[
            'data'=>$this->data,
            'path'=>$this->path,
            'url'=>$this->url
        ])
                    ->subject($this->data->subject)
                    ->attach($this->path);
    }
}
