<?php

namespace App\Http\Livewire;

use App\Models\Jobtitle;
use Livewire\Component;
use Livewire\WithPagination;

class ShowJobtitles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $jobtitle;

    public $search;
    protected $listeners = [
        'render' => 'render',
        'delete' => 'delete'
    ];

    public $cantEntradas = 10;

    protected $rules = [
        'jobtitle.name' => 'required',
        'jobtitle.id_boss' => 'required',
        'jobtitle.level' => 'required'
    ];

    public function render()
    {
        $jobtitles = Jobtitle::orWhere('name', 'ilike', '%' . $this->search . '%')
            ->orWhere('id', 'ilike', '%' . $this->search . '%')
            ->paginate($this->cantEntradas);
        return view('livewire.show-jobtitles', compact('jobtitles'));
    }

    public function edit(Jobtitle $jobtitle)
    {
        $this->jobtitle = $jobtitle;
    }

    public function update()
    {
        $this->validate();
        $this->jobtitle->save();
        //resetear las propiedades
        $this->reset(['jobtitle']);
        //ocultar el modal
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('alert', __('forms.message.god_job'), __('forms.message.update'));
    }

    /**
     * Este metodo se va a ejecutar cada vez que el atributo $search cambie o se modifique
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Jobtitle $jobtitle)
    {
        $jobtitle->delete();
    }
}
