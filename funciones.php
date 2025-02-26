<?php


function render_plantilla( string $plantilla, array $data= []){
    extract($data); //extrae las variables del array asociativo y los deja aquí dentro
    require "plantilla/$plantilla.php";
}

//Con esta función se obtienen los datos de la API
// function get_data($url){
//     $title= 'La próxima película de Marvel';
//     $result = file_get_contents($url); //Esta haciendo un get a la API elegida
//     // Decodificar el JSON recibido en un array asociativo
//     $data = json_decode($result, true);
//     return $data;
// }

