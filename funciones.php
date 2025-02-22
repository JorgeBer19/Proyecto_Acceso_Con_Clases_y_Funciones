<?php
// Realiza chequeos más estrictos sobre los tipos
declare(strict_types=1);

function get_until_message(int $days): string
    {   
        return match (true){
            $days == 0  =>"¡Hoy se estrena la película!",
            $days == 1  =>"Mañana se estrena",
            $days < 7   =>"Esta semana se estrena",
            $days < 30  => "Este mes se estrena ",
            default     =>"$days días para que la película se estrena"
        };
    }

function render_plantilla( string $plantilla, array $data= []){
    extract($data); //extrae las variables del array asociativo y los deja aquí dentro
    require "plantilla/$plantilla.php";
}
//Con esta función se obtienen los datos de la API
function get_data($url){
    $title= 'La próxima película de Marvel';
    $result = file_get_contents($url); //Esta haciendo un get a la API elegida
    // Decodificar el JSON recibido en un array asociativo
    $data = json_decode($result, true);
    return $data;
}

