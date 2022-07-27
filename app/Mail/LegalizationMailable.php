<?php

namespace App\Mail;

use App\Enums\EStateLegalization;
use App\Models\Legalization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LegalizationMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $legalization;

    public function __construct(Legalization $legalization)
    {
        $this->legalization = $legalization;
    }

    public function build()
    {
        switch ($this->legalization->sw_state) {
            case EStateLegalization::CREATED->getId():
                return $this->view('mail.viatic.legalization-created', ['legalization' => $this->legalization]);
                break;
            case EStateLegalization::SEND->getId():
                return $this->view('mail.viatic.legalization-send', ['legalization' => $this->legalization]);
                break;
            case EStateLegalization::APROVE_GENERAL->getId():
                return $this->view('mail.viatic.legalization-aprove-general', ['legalization' => $this->legalization]);
                break;
            case EStateLegalization::APROVE_CONTABILIDAD->getId():
                return $this->view('mail.viatic.legalization-aprove-general', ['legalization' => $this->legalization]);
                break;
            case EStateLegalization::APROVE_BOSS->getId():
                return $this->view('mail.viatic.legalization-aproved-boss', ['legalization' => $this->legalization]);
                break;
            case EStateLegalization::CANCELED->getId():
                return $this->view('mail.viatic.legalization-canceled', ['legalization' => $this->legalization]);
                break;
            case EStateLegalization::APROVE_CONTABILIDAD->getId():
                return $this->view('mail.viatic.legalization-canceled', ['legalization' => $this->legalization]);
                break;
        }
        return "NO TIENE ESTADOS EN EL CORREO";
    }
}
