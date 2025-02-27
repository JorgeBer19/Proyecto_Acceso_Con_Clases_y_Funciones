<?php
// Realiza chequeos más estrictos sobre los tipos
declare(strict_types=1);

class SiguintePeli{
    public function __construct(
        private string $title,
        private int $days_until,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview,
        private string $following_poster_url,
        private string $following_release_date,
        private int $following_days_until
   ){
   }
    //Con esta función depende de cuantos días le quede a la película para que se estrene muestra un texto u otro
    public function get_until_message(): string{
      
        $days = $this->days_until; 
    
        return match (true){
            $days == 0  =>"¡Hoy se estrena la película!",
            $days == 1  =>"Mañana se estrena",
            $days < 7   =>"Esta semana se estrena",
            $days < 30  => "Este mes se estrena ",
            default     =>"$days días para que la película se estrene"
        };
    }
      //Con esta función depende de cuantos días le quede a la película para que se estrene muestra un texto u otro
      //Esta función es para los días de la proxima pelicula que se estrena después que la anterior.
      public function get_following_days_until(): string{
      
        $days = $this->following_days_until; 
        return match (true){
            $days == 0  =>"¡Hoy se estrena la película!",
            $days == 1  =>"Mañana se estrena",
            $days < 7   =>"Esta semana se estrena",
            $days < 30  => "Este mes se estrena ",
            default     =>"$days días para que la película se estrene"
        };
    }
   //Con esta función se obtienen los datos de la API
   public static function fetch_and_create_movie(string $api_url): SiguintePeli
   {
       $result = file_get_contents( $api_url); //Esta haciendo un get a la API elegida
       // Decodificar el JSON recibido en un array asociativo
       $data = json_decode($result, true);
       return new self(
            $data["title"],    
            $data["days_until"],
            $data["following_production"] ['title'] ?? "Desconocido", //Esto último es para que en el caso no haya una siguiente película ponga "Desconocido" 
            $data["release_date"],
            $data["poster_url"],
            $data["overview"],
            $data["following_production"] ['poster_url'],
            $data["following_production"] ['release_date'],
            $data["following_production"] ['days_until']
       );    
   }

   // Trae los datos 
   public function get_data()
   {
    return get_object_vars($this);
   }
}
#Jorge BL