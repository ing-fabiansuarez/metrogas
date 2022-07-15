<?php

namespace App\Handlers;

use App\Models\User as EloquentUser;
use Adldap\Models\User as LdapUser;
use App\Models\Jobtitle;

class LdapAttributeHandler
{
    /**
     * Synchronizes ldap attributes to the specified model.
     *
     * @param LdapUser $ldapUser
     * @param EloquentUser $eloquentUser
     *
     * @return void
     */
    public function handle(LdapUser $ldapUser, EloquentUser $eloquentUser)
    {
        /**
         * Aqui relacionamos lso atributos que vamos a sincronysar
         */
        $eloquentUser->username = $ldapUser->getAccountName();
        $eloquentUser->name = $ldapUser->getCommonName();
        $eloquentUser->email = $ldapUser->getUserPrincipalName();
        $eloquentUser->jobtitle_ldap = $ldapUser->getDescription();
        $eloquentUser->email_aux = $ldapUser->getEmail();

        /**
         * Hay que determinar si existe el usuario para que no cambie el cargo que tiene asignado.
         */

        if (!$eloquentUser->exists()) {
            //asignamos el rol aqui
            if ($eloquentUser->username == 'fsuarez') {
                $eloquentUser->syncRoles('Administrador');
            } else {
                $eloquentUser->syncRoles('Rol Basico');
            }
            //Agregamos la logica para crear un jobtitle en el sistema
            $jobtitle = Jobtitle::where('name', 'ilike', $eloquentUser->jobtitle_ldap)->first();
            if (isset($jobtitle)) { //determina si el cargo exite, si es asi se lo coloca si no lo crea nuevo
                $eloquentUser->id_jobtitle = $jobtitle->id;
            } else {
                $eloquentUser->id_jobtitle = Jobtitle::where('name', 'N/D (No Definido)')->first()->id;
            }
        }
    }
}
