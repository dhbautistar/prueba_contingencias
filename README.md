# Para iniciar se debe tener instalado php, npm, git, composser y un servidor de aplicaciones como apache o nginx:

## Abrir una terminal y ejecutar los siguientes comandos:

git clone https://github.com/dhbautistar/prueba_contingencias.git
cd  prueba_contingencias

composer install
crear base de datos con el nombre:
prueba_contingencias

php artisan migrate
php artisan db:seed --class=ProgramasSeeder
php artisan db:seed --class=UserSeeder

El usuario para iniciar sesión como administrador es el siguiente:
administrador@gmail.com
Contraseña:
PruebaContingencias
