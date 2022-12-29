# [FABIAN ENRIQUE SUAREZ CARVAJAL](https://github.com/fsuarez120-fabian)

Ingeniero de Sistemas

Platilla
https://www.creative-tim.com/product/soft-ui-dashboard

## Instrucciones para borrar datos de los viaticos y legalizaciones, para conservar las configuraciones

1. Vaciar las siguientes tablas:

* time_line_viatic_requests
* supports_viatic_requests
* observation_viatic_models
* other_expense_viatic_request
* other_item_viatic_request
* viatic_requests_sites_detalle
* viatic_requests
* observation_legalizations
* supports_legalizations
* legalizations


===================================================================================================================================================
## Instrucciones para un CRUD en el sistema del panel

1. crear un nueva tabla
* Crear el modelo, la migracion y los campos de la tabla.
* 

===================================================================================================================================================
## Instrucciones para configurar entorno de desarrollo
1. Ejecutar 'composer install'
2. Crear base de datos en Postgres con el nombre 'metrogas_db'
3. Descomente del archivo los seeder que desea inicializar DatabaseSeeder.php 
4. Ejecutar 'php artisan storage:link'
5. Ejecutar 'php artisan migrate --seeder'
6. Conectarse a la VPN de Metrogas gas para poder establecer conexion con el directorio Activo
7. Ejecutar 'php artisan adldap:import fsuarez' porque esta programado de que ese usuario se importe con el rol de administrador, el respto de usuario se importaran con el rol basico o Ejecutaor 'php artisan user:import'