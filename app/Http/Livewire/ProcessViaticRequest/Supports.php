<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\ViaticRequest;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Supports extends Component
{
    public   $viaticRequiest;

    /** Listeners */
    protected $listeners = [
        'closeViaticRequest' => 'closeViaticRequest'
    ];

    public function mount(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }


    public function render()
    {
        return view('livewire.process-viatic-request.supports');
    }

    public function closeViaticRequest()
    {
        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->viaticRequest->sw_state = EStateRequest::CLOSE->getId();
            $this->viaticRequest->save();

            $this->emit('responseAprove', true, route('viatic.show', $this->viaticRequest->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseAprove', false, null);
        }
    }
}
