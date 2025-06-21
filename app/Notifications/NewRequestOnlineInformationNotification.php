<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\RequestOnlineInformation;

class NewRequestOnlineInformationNotification extends Notification
{
    use Queueable;

    public $requestInfo;

    /**
     * Create a new notification instance.
     */
    public function __construct(RequestOnlineInformation $requestInfo)
    {
        $this->requestInfo = $requestInfo;
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
            'type' => 'request_online_information',
            'title' => 'Permintaan Informasi Online Baru',
            'message' => 'Permintaan informasi online baru dari ' . $this->requestInfo->name,
            'url' => route('admin.request-online-information.show', $this->requestInfo->id),
            'created_at' => $this->requestInfo->created_at->format('d M Y H:i'),
            'data' => [
                'id' => $this->requestInfo->id,
                'name' => $this->requestInfo->name,
                'email' => $this->requestInfo->email
            ]
        ];
    }
}
