<?php

namespace App\Functions;
use Illuminate\Support\Str;

class Helper{

    // metodo statico che posso usare senza richiamare istanza

    public static function generateSlug($string, $model){
        // 1 ricevo la stringa da sluggare
        // 2 genero lo slug
        // 3 faccio una queryper vedere se lo slug è già presente
        //  4 se non è presente restituisco lo slug
        // 5 se è presente ne genero un altro con un valore incrementale e ad ogni generazione verifico che non si a presente
        // 6 una volta trovato uno slug non presente lo restituisco
        // 2
        $slug= Str::slug($string.'-');
        $original_slug=$slug;
        // 3
        $exist=$model::where('slug',$slug)->first();
        dump(($exist));

        // 5
        $c=1;
        while($exist){
            $slug=$original_slug.'-'.$c;
            $exist= $model::where('slug',$slug)->first();
            $c++;
        }
        return $slug;

    }
}
