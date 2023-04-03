<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: application/json');

header("HTTP/1.0 200 OK");
/**
 * Prueba técnica desarrollada y maquetada por
 * Juan Camilo López Morales para 
 * Garantías Comunitarias Grupo S.A.
 */

require $_SERVER['DOCUMENT_ROOT'] . '/Controllers/ApiController.php';

$apiController = new ApiController();