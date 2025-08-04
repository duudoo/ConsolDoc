<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Contract;

class ContractSigned extends Notification
{
    use Queueable;

    public Contract $contract;

    public function __construct(Contract $contract) {
        $this->contract = $contract;
    }

    public function via($notifiable) {
        return ['mail'];
    }

    public function toMail($notifiable) {
        return (new MailMessage)
            ->subject('A Contract Was Signed')
            ->line('The contract "' . $this->contract->title . '" has been signed.')
            ->action('View Contract', url(route('contracts.show', $this->contract->id)));
    }
}