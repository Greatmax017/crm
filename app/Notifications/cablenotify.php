<?php

namespace App\Notifications;

use App\Channels\SmartSMSSoln;
use App\Channels\Multitexter;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class ProfitPaid extends Notification
{
    use Queueable;

    protected $amount;
    protected $device_number;
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount, $device_number, $bundle_code)
    {
        $this->amount = $amount;
        $this->device_number = $device_number;
        $this->bundle_code = $bundle_code;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return [SmartSMSSoln::class, 'mail'];
        //return [Multitexter::class, 'mail'];
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Cable Tv Order')
            ->greeting("Hello Admin")
            ->line('Cable Tv Payment, see details: <br> Decoder Number: '.$this->decoder_number.' <br> TV(code): '.$this->bundle_code.' <br> Product Price: '.$this->amount.'' )
            ->action(' Check ', url('admin/transactions'));


    }

    /**
     * Get the smartsms solutions representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toSmartSMS($notifiable)
    // {
    //     return array(   'sender'=>'',
    //                     'message' => '');
    // }
}
