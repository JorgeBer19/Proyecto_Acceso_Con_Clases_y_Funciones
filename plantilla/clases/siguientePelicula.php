<?php
// Realiza chequeos más estrictos sobre los tipos
declare(strict_types=1);

class SiguintePeli{
   public function __construct(
    private int $days_until,
    private string $title,
    private string $following_production,
    private string $release_date,
    private string $poster_url,
    private string $overview
   ){
   }
    //Con esta función depende de cuantos días le quede a la película para que se estrene muestra un texto u otro
    public function get_until_message(int $days): string{
    {   
        $days = $this-> days_until; 
        return match (true){
            $days == 0  =>"¡Hoy se estrena la película!",
            $days == 1  =>"Mañana se estrena",
            $days < 7   =>"Esta semana se estrena",
            $days < 30  => "Este mes se estrena ",
            default     =>"$days días para que la película se estrena"
        };
    }
   } 
}