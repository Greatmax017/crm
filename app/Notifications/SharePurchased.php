<?php

namespace App\Notifications;

use App\Channels\SmartSMSSoln;
use App\Channels\Multitexter;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class SharePurchased extends Notification
{
    use Queueable;

    protected $amount;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->amount = $amount;
        // $this->newbal = $newbal;
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
            ->subject('Successful KYC Verification')
            ->greeting("Dear $notifiable->fname,")
            ->line('<div style="font-size:14px;padding-left:4%;"></p><p>We are pleased to inform you that your KYC (Know Your Customer) verification on NeptuneFX has been successfully completed, and your account has been approved for trading on our platform. </p><p>Our support team has carefully reviewed your KYC documents, and we are satisfied that they meet our requirements. Your account has now been verified, and you can start trading on NeptuneFX immediately.</p><p>We take the security of our platform very seriously, and KYC verification is an essential part of our security measures. By completing this process, you have helped us ensure the integrity and security of NeptuneFX.</p><p>If you have any questions or concerns, please do not hesitate to contact our support team. We are available 24/7 to assist you with any issues you may encounter.</p><p>Thank you for choosing NeptuneFX for your trading needs. We look forward to serving you.</p><br/><br/></div>');
            

    }

    /**
     * Get the smartsms solutions representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

}
