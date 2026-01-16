<?php
#Inicializamos las variables del sistema
use Dotenv\Dotenv;

//Cargamos todos los .env
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();