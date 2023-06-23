<?php

namespace App\Services;

class AsciiService
{

    public function generateArrayAscii(int $start, int $end):array
    {
        $arrayAscii = range($start, $end);
        shuffle($arrayAscii);

        return $arrayAscii;
    }

    public function findMissingCharacterFisrtAlternative(array $array1, array $array2):int
    {
        $arrayDiff = array_diff($array1, $array2);
        return reset($arrayDiff);
    }

    public function findMissingCharacterSecondAlternative(array $search, int $firstvalue, int $lastValue)
    {
        //utilizando a formula de gauss faço a soma da progressão
        $total = (($firstvalue+$lastValue)*(count($search)+1))/2;

        //subtraio valor por valor do valor total da soma, logo o valor que sobrou é o que estava perdido
        foreach ($search as $value){
            $total -= $value;
        }

        return $total;
    }
}
