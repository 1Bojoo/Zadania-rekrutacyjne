<?php

class Pipeline{

    public static function make(...$functions){

        return function($var) use ($functions){
            $res = $var;
            foreach($functions as $function){
                $res = $function($res);
            }
            return $res;
        };
        
    }

}

$pipe = Pipeline::make(
    function($var) { return $var * 3; }, 
    function($var) { return $var + 1; },
    function($var) { return $var / 2; }
);

echo $pipe(3);

?>