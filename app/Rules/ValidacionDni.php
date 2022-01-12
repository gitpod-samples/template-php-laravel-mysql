<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidacionDni implements Rule
{

    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *https://laravel.com/docs/8.x/validation
     *https://www.adaweb.es/validar-dni-con-php/
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
        $posicion = $numer % 23;
        $letraCalculada = $letra[$posicion];
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
            return true;
          }else{
            return false;
          }
    }


    public function message()
    {
        return 'Debe ser un Nif o Nie válido';
    }

    public function isValidNif($nif)
    {
       $nifRegEx = '/^[0-9]{8}[A-Z]$/i';
       $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
 
       if (preg_match($nifRegEx, $nif)) {
          return ($letras[(substr($nif, 0, 8) % 23)] == $nif[8]);
       }
 
       return false;
    }
 
    public function isValidNie($nif)
    {
       $nieRegEx = '/^[KLMXYZ][0-9]{7}[A-Z]$/i';
       $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
 
       if (preg_match($nieRegEx, $nif)) {
 
          $r = str_replace(['X', 'Y', 'Z'], [0, 1, 2], $nif);
 
          return ($letras[(substr($r, 0, 8) % 23)] == $nif[8]);
       }
 
       return false;
    } 

}
