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
            case EStateLegalization::SEND->getId():
                return $this->view('mail.viatic.legalization-send', ['legalization' => $this->legalization]);
                break;
            case EStateLegalization::APROVE_GENERAL->getId():
                return $this->view('mail.viatic.legalization-aprove-general', ['legalization' => $this->legalization]);
                break;
        }
        return "NO TIENE ESTADOS EN EL CORREO";
    }
}
