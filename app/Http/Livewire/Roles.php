<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    //Paginacion para livewire y que use el tema de bootstrap
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginationQuantity = 15;

    //MODELO (Aqui es donde va el modelo del CRUD)
    public $model;

    //Titulo del mantenimiento
    private $title;

    //parametro de busqueda
    public $keyWord;

    //escuchadores de eventos
    protected $listeners = [
        'destroy' => 'destroy'
    ];

    /* Atributos */
    public $name;
    public $permissions = [];

    protected $rules = [
        'model.name' => 'required',
    ];

    public function __construct()
    {
        //aqui se define el titulo para el mantenimiento
        $this->title = "Roles";
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.roles.view', [
            'objetsModel' => Role::latest()
                ->orWhere('name', 'ilike', $keyWord)
                ->orWhere('id','ilike' ,$keyWord)
                ->paginate($this->paginationQuantity),
            'title' => $this->title,
            'allPermissions' => Permission::all(),
        ]);
    }

    public function store()
    {
        //Reglas de validacion
        $this->validate([
            'name' => 'required'
        ]);
        //aqui se crea el rol
        $role = Role::create([
            'name' => $this->name
        ]);

        $role->permissions()->sync($this->permissions);
        //resetear las propiedades
        $this->reset(['name']);

        //ocultar el modal de creacion!
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('alert', __('forms.message.god_job'), __('forms.message.save'));
    }

    public function edit(Role $object)
    {
        $this->model = $object;
        $this->permissions = [];

        foreach ($this->model->permissions()->get() as $permissio) {
            array_push($this->permissions, $permissio->id);
        }
    }

    public function update()
    {
        $this->validate();
        $this->model->permissions()->sync($this->permissions);
        $this->model->save();
        //resetear las propiedades
        $this->reset(['model']);
        //ocultar el modal
        $this->dispatchBrowserEvent('close-modal-edit');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('alert', __('forms.message.god_job'), __('forms.message.update'));
    }

    public function destroy(Role $object)
    {
        $object->delete();
    }
}
