<?php
require_once 'constantes.php';
require_once 'funciones.php'; // se importa las funciones del fichero de funciones.php una sola vez 
$data = get_data(API_URL);
$until_message =  get_until_message($data["days_until"]);

?>

<!DOCTYPE html>
<html lang="es">
    
    <!-- Importa los contenidos  y estilos de html y css-->
    <?php render_plantilla('head', $data);?>
    <?php render_plantilla ('main', array_merge(
        $data,
        ["until_message" => $until_message]
    ));?>


</html>
