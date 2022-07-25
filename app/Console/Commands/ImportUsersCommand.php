<?php

namespace App\Console\Commands;

use Adldap\Laravel\Facades\Adldap;
use App\Models\Jobtitle;
use App\Models\User;
use Exception;
use Illuminate\Console\Command;

class ImportUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa los usuarios desde ldap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Adldap::search()->users()->get() as $ldapUser) {
            try {

                /**
                 * Aqui relacionamos lso atributos que vamos a sincronysar
                 */
                $datauser = User::where('username', $ldapUser->getAccountName())->first();
                //verifica que si exista el usuario en base de datos
                if (isset($datauser)) {
                    $eloquentUser = $datauser;
                } else {
                    $eloquentUser = new User();
                }
                $eloquentUser->username = $ldapUser->getAccountName();
                $eloquentUser->name = $ldapUser->getCommonName();
                $eloquentUser->email = $ldapUser->getUserPrincipalName();
                $eloquentUser->jobtitle_ldap = $ldapUser->getDescription();
                $eloquentUser->email_aux = $ldapUser->getEmail();
                $eloquentUser->objectguid = $ldapUser->getAuthIdentifier();

                /**
                 * Hay que determinar si existe el usuario para que no cambie el cargo que tiene asignado.
                 */

                //asignamos el rol aqui
                if ($eloquentUser->username == 'fsuarez') {
                    $eloquentUser->syncRoles('Administrador');
                } else {
                    $eloquentUser->syncRoles('Rol Basico');
                }
                //Agregamos la logica para crear un jobtitle en el sistema
                $jobtitle = Jobtitle::where('name', 'ilike', $eloquentUser->jobtitle_ldap)->first();
                if ($eloquentUser->id_jobtitle == null) {
                    if (isset($jobtitle)) { //determina si el cargo exite, si es asi se lo coloca si no lo crea nuevo
                        $eloquentUser->id_jobtitle = $jobtitle->id;
                    } else {
                        $eloquentUser->id_jobtitle = Jobtitle::where('name', 'N/D (No Definido)')->first()->id;
                    }
                    $this->warn("Creado " . $eloquentUser->username);
                } else {
                    $this->warn("Actualizado " . $eloquentUser->username);
                }

                $eloquentUser->save();
                $this->info("User : " . $eloquentUser->username . " - " . $eloquentUser->name);
            } catch (Exception $e) {
                $this->error($e->getMessage());
            }
        }
        return 0;
    }
}
