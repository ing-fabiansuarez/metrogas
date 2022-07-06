<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\ViaticRequest;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Aceptation extends Component
{
    use WithFileUploads;

    public $viaticRequest;

    public $file_sign;

    public function mount(ViaticRequest $viaticRequest)
    {
        //recibimos el viaticRequest
        $this->viaticRequest = $viaticRequest;
    }

    public function render()
    {
        return view('livewire.process-viatic-request.aceptation');
    }

    public function acceptRequest()
    {
        $this->validate([
            'file_sign' => 'required|max:1024',
        ]);
        try {
            DB::beginTransaction();
            //se cambia de estado
            $this->viaticRequest->sw_state = EStateRequest::ACCEPTED_EMPLOYEE->getId();
            $this->viaticRequest->url_aceptation = $this->file_sign->store('public/solicitud-anticipo/aceptacion');
            $this->viaticRequest->save();
            $this->emit('response', true, route('viatic.show', $this->viaticRequest->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('response', false, null);
        }
    }
}
