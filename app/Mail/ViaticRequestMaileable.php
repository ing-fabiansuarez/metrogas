<?php

namespace App\Mail;

use App\Enums\EStateLegalization;
use App\Enums\EStateRequest;
use App\Models\ViaticRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ViaticRequestMaileable extends Mailable
{
    use Queueable, SerializesModels;

    public $viaticRequest;

    public function __construct(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }

    public function build()
    {
        switch ($this->viaticRequest->sw_state) {
            case EStateRequest::BY_CREATE->getId():
                return $this->view('mail.viatic.viatic-request-created', ['viaticRequest' => $this->viaticRequest]);
                break;
            case EStateRequest::CREATED->getId():
                return $this->view('mail.viatic.viatic-request-created', ['viaticRequest' => $this->viaticRequest]);
                break;
            case EStateRequest::APROVED->getId():
                return $this->view('mail.viatic.viatic-request-aprove-boss', ['viaticRequest' => $this->viaticRequest]);
                break;
            case EStateRequest::CANCELED->getId():
                return $this->view('mail.viatic.viatic-request-canceled', ['viaticRequest' => $this->viaticRequest]);
                break;
            case EStateRequest::ACCEPTED_EMPLOYEE->getId():
                return $this->view('mail.viatic.viatic-request-acepted-employ', ['viaticRequest' => $this->viaticRequest]);
                break;
            case EStateRequest::CLOSE->getId():
                return $this->view('mail.viatic.viatic-request-close', ['viaticRequest' => $this->viaticRequest]);
                break;
            case EStateRequest::APROVED_GENERAL->getId():
                return $this->view('mail.viatic.viatic-request-aproved-general', ['viaticRequest' => $this->viaticRequest]);
                break;
        }
        return "NO TIENE ESTADOS EN EL CORREO";
    }
}
