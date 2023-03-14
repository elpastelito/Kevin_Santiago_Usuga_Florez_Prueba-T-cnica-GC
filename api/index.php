<?php

/**
 * Prueba técnica desarrollada y maquetada por
 * Juan Camilo López Morales para 
 * Garantías Comunitarias Grupo S.A.
 */

require $_SERVER['DOCUMENT_ROOT'] . '/Controllers/ApiController.php';

header('Access-Controll-Allow-Origin: *');
header('Content-Type: application/json');

$apiController = new ApiController();