<?php

namespace App\Http\Controllers;


use App\Models\SeriesTv;
use App\Services\AsciiService;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{

    public function __construct(readonly private AsciiService $asciiService)
    {
    }

    public function task1(Request $request)
    {
        return view('task1/task1');
    }

    public function task2(Request $request)
    {
        //Gerando o array aleatorio da virgula(44) - pipe(124)
        $arrayAscii = $this->asciiService->generateArrayAscii(44, 124);
        dump("Array Aleatório com os codigos Ascii", $arrayAscii);

        $positionRemoved = rand(0, 5);//gerando posição aleatória que irá ser removida
        $valueRemoved = $arrayAscii[$positionRemoved];

        unset($arrayAscii[$positionRemoved]);
        dump("Posição removida - Valor Removido - Impressão do array", $positionRemoved, $valueRemoved, $arrayAscii);

        //maneira 1 de fazer, utilizando um array igual e tirando a diferença
        $arrayAsciiFull = $this->asciiService->generateArrayAscii(44, 124);
        $missingCodeChar = $this->asciiService->findMissingCharacterFisrtAlternative($arrayAsciiFull, $arrayAscii);

        //considerando que não poderiamos reproduzir um array igual...

        $missingCodeChar = $this->asciiService->findMissingCharacterSecondAlternative($arrayAscii, 44, 124);
        $missingChar = chr($missingCodeChar);

        dd("Codigo do caractere encontrado - Caractere encontrado", $missingCodeChar, $missingChar);
    }

    public function task3(Request $request)
    {
        $search = $request->query->get('search');

        $series = SeriesTv::query()->where('title', 'like', "%".$search."%")->get();
        return view('task3/task3', compact('series'));
    }
}
