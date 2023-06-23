<?php

namespace Database\Seeders;

use App\Models\SeriesTv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesTvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('series_tv')->insert([
            [
                'title' => 'Simplesmente Acontece',
                'channel' => 19.4,
                'genres' => 'Romance',
                'image_url' => 'https://entretetizei.com.br/wp-content/uploads/2021/03/capa-1.jpeg'
            ],
            [
                'title' => 'Chocolate com pimenta',
                'channel' => 12.0,
                'genres' => 'Drama',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/pt/4/4d/Chocolate-com-pimenta.jpg'
            ],
            [
                'title' => 'Rei do Gado',
                'channel' => 12.0,
                'genres' => 'Ação',
                'image_url' => 'https://observatoriodatv.uol.com.br/wp-content/uploads/2015/08/O-Rei-do-Gado.jpg'
            ],
            [
                'title' => 'Salve Jorge',
                'channel' => 10.0,
                'genres' => 'Suspense',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/pt/c/c5/Salve-Jorge.jpg'
            ],
            [
                'title' => 'Fantastico',
                'channel' => 10.0,
                'genres' => 'Documentário',
                'image_url' => 'https://oplanetatv.clickgratis.com.br/_upload/content/2022/11/17/fantastico-tera-serie-sobre-cacadores-de-tempestades-63761a1c2b163_featured.jpg'
            ],
        ]);

        $arrayIntervals =[
            [
              'day_week' => [6],
              'time' => '19:00'
            ],
            [
                'day_week' => [2,3,4,5,6],
                'time' => '15:00'
            ],
            [
                'day_week' => [2,4,6],
                'time' => '12:00'
            ],
            [
                'day_week' => [2,3,4,5,6],
                'time' => '21:00'
            ],
            [
                'day_week' => [1],
                'time' => '20:00'
            ],
        ];

        $series = SeriesTv::all();

        foreach ($series as $key => $serie){
            $serie->addInterval($arrayIntervals[$key]['day_week'], $arrayIntervals[$key]['time'], $serie->id);
        }

    }
}
