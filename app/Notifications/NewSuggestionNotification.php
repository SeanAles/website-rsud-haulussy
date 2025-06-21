<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Suggestion;

class NewSuggestionNotification extends Notification
{
    use Queueable;

    public $suggestion;

    /**
     * Create a new notification instance.
     */
    public function __construct(Suggestion $suggestion)
    {
        $this->suggestion = $suggestion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'suggestion',
            'title' => 'Kritik dan Saran Baru',
            'message' => 'Kritik dan saran baru dari ' . $this->suggestion->name,
            'url' => route('admin.suggestions.show', $this->suggestion->id),
            'created_at' => $this->suggestion->created_at->format('d M Y H:i'),
            'data' => [
                'id' => $this->suggestion->id,
                'name' => $this->suggestion->name,
                'email' => $this->suggestion->email
            ]
        ];
    }
}
