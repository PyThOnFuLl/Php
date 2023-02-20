<?php

class Cards
{
    function validate($string)
    {
        $matches = [];
        $string = strrev(preg_match('/[^d]/', $string, $matches));
        $sum = 0;
        $patternMC = "(5[1-5]\d|62|67)";
        $patternVS = "(4[1-9]\d|14)";
        for ($i = 0, $j = strlen($string); $i < $j; $i++) {
            // использовать четные цифры как есть
            if (($i % 2) == 0) {
                $val = $string[$i];
            } else {
                // удвоить нечетные цифры и вычесть 9, если они больше 9
                $val = $string[$i] * 2;
                if ($val > 9) $val -= 9;
            }
            $sum += $val;
            if ($i == 3){
                var_dump($sum);
                die();
            }
        }
        print_r($sum);
        // число корректно, если сумма равна 10
        if (($sum % 10) == 0) {
            echo "Да";
        } else {
            echo "Нет";
        }

        //MasterCard: 51-55, 62, 67;
        //VISA: 41-49, 14;
        if (preg_match($patternMC, $string)) {
            echo 'This is MasterCard';
        } elseif (preg_match($patternVS, $string)){
            echo 'This is Visa';
        } else{
            echo 'Wrong number of card';
        }
    }
}

$test = new Cards();
$test -> validate("525163728819929");