<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewBookingNotification extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🎉 You’re Booked! | ' . config('app.name'))
            ->greeting('Hey ' . $this->booking->name . ' 👋')
            ->line('Awesome! Your booking has been confirmed and we can’t wait to work with you.')
            ->line('Here’s what we’ve got:')
            ->line('🎈 Event Type: ' . $this->booking->event_type)
            ->line('📅 Date: ' . $this->booking->date->format('Y-m-d'))
            ->line('⏰ Time: ' . $this->booking->time)
            ->line('We’ll be in touch soon to go over the final details!')
            ->action('See Booking Info', url('/bookings'))
            ->salutation('Cheers ✨ – The ' . config('app.name') . ' Team');
    }
    
    }
