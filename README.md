# 1. Instalamos las dependencias con:

composer install

# 2. Creamos el archivo .env [Estructura]

APP_NAME=ServerApi
APP_ENV=local
JWT_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx <-- remplaza esto por un clave segura de 32 caracteres
JWT_ALG=HS256
JWT_EXP=3600 <-- Activo de sesion 1 hora

