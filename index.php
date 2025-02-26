<?php
//Jorge bl
require_once 'constantes.php';
require_once 'funciones.php'; // se importa las funciones del fichero de funciones.php una sola vez 
require_once 'clases/siguientePelicula.php';
$siguinte_Pelicula = SiguintePeli::fetch_and_create_movie(API_URL);
$next_movies_data = $siguinte_Pelicula -> get_data();

?>


<!DOCTYPE html>
<html lang="es">
    
    <!-- Importa los contenidos  y estilos de html y css-->
    <?php render_plantilla('head',  ["title" =>$next_movies_data['title']]);?>
    <?php render_plantilla ('main', array_merge(
        $next_movies_data,
        ["until_message" => $siguinte_Pelicula->get_until_message()],
        ["days" => $siguinte_Pelicula->get_following_days_until()]
        //["until_message_following" => $following_days_until->following_days_until()]
    ));?>
    

    
</html>
