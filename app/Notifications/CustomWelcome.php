<?php

namespace App\Notifications;

use App\Channels\SmartSMSSoln;
use App\Channels\Multitexter;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class CustomWelcome extends Notification
{
    use Queueable;

    protected $activation_link;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activation_link)
    {
        $this->activation_link = $activation_link;
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
            ->subject('Registration notice')
            ->greeting("Dear $notifiable->fname,")
            ->line('
           <p>Thank you for your trust and support to Neptune Securities. Your preliminary account has been successfully opened. At this stage, you can only deposit funds after member login. Please log in to your personal centre for KYC verification(KYC certification requires uploading proof of personal information, such as ID card, passport, driving license. In addition, you need to upload proof of address, such as bank statements, household utility bills, or bank letter addresses. In order for your withdrawal to proceed smoothly, please be sure to upload the above information.). After the verification is approved, you can carry out trading operations. Start your investment journey by applying for KYC verification now! For specific KYC certification guidelines, log in to your personal centre to learn more. Thank you again for choosing Neptune Securities. If you have any questions, please feel free to contact us. We are always here to help. We wish you all the best in your future endeavours and investments.
 

 
 
 
In your client area, you can
 

 
Deposit and withdraw money for your MT4 transaction account
 
Modify your MT4 transaction account information, such as leverage, etc.
 
View history
 
Apply for new account
 
Internal transfer of account
 
Browse news and view recent events</p>

');

    }

    /**
     * Get the smartsms solutions representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSmartSMS($notifiable)
    {
        return array(   'sender'=>'Registration notice',
                        'message' => 'Neptune Registration notice.');
    }
}
