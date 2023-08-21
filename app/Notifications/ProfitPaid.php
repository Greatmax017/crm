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

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        $this->amount = $amount;

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
            ->subject('RE: Urgent Leave to United States.')
            ->greeting("Dear Elena")
            ->line("<p>Thank you for your follow-up email yesterday regarding your unexpected leave request to travel to the United States. We understand the current situation in Turkey and Syria, and we want to assure you that we are not being insensitive to it. However, the location of our company is far from the affected areas, and we are currently exploring the possibility of operating remotely.</p>
<p>As you may be aware, our company has been planning to adopt a remote work system, but we understand that you and your team are essential to the organization. Your contribution is significant, and we cannot afford to let it go.</p>
<p>Nonetheless, according to Section (2), sub-section (4) of your employment contract, you are still entitled to the benefit of an all-expenses-paid trip to visit any VIP Shareholder/Investor, or to educate the Shareholders or VIP clients on your role as a Shareholder in the Company.</p>
<p>I hope this clarifies all the questions raised in your previous email. If you have any further concerns or questions, please don't hesitate to reach out.</p>");


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
