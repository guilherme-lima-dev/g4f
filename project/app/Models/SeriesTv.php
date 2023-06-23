<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeriesTv extends Model
{
    use HasFactory;

    const WEEK = [
        1 => 'sunday',
        2 => 'monday',
        3 => 'tuesday',
        4 => 'wednesday',
        5 => 'thursday',
        6 => 'friday',
        7 => 'saturday'
    ];

    protected $table = 'series_tv';

    protected $fillable = [
        'title',
        'channel',
        'genres',
        'image_url'
    ];

    protected $appends = [
        'intervals'
    ];

    private string $title;

    private float $channel;
    private string $genres;
    private string $image_url;

    public function intervals():HasMany
    {
        return $this->hasMany(SeriesTvInterval::class);
    }

    public function addInterval(array $dayWeeks, string $time, int $serieID)
    {
        foreach ($dayWeeks as $dayWeek){
            $this->intervals()->insert([
                'series_tv_id' => $serieID,
                'day_week' => $dayWeek,
                'time' => Carbon::createFromFormat('H:i', $time)
            ]);
        }
    }

    public function getNextEp()
    {
        $intervals = $this->intervals()->get();
        $today = Carbon::now('America/Sao_Paulo')->dayOfWeek+1;
        $dateTimeToday = Carbon::now('America/Sao_Paulo');

        $nextDayEp = 0;
        $nextHour = '';
        $nextMinute = '';

        foreach ($intervals as $key => $int){


            $dateTimeBD = Carbon::createFromFormat('H:i:s', $int->time, 'America/Sao_Paulo');
            $nextDayEp = $intervals[0]->day_week;
            $nextHour = Carbon::createFromFormat('H:i:s', $intervals[0]->time, 'America/Sao_Paulo')->format('H');
            $nextMinute = Carbon::createFromFormat('H:i:s', $intervals[0]->time, 'America/Sao_Paulo')->format('i');

            $diffDay = ($int->day_week - $today);

            if($diffDay == 0 && $dateTimeToday->lessThan($dateTimeBD)) {
                $nextDayEp = $today;
                $minutes = $dateTimeToday->floatDiffInMinutes($dateTimeBD);
                $hours = intdiv($minutes, 60);
                $minutes = ($minutes % 60);

                return (object)[
                    'days' => 0,
                    'hours' => $hours,
                    'minutes' => $minutes,
                    'datetime' => $dateTimeBD->format('d/m/Y H:i')
                ];
            }elseif($int->day_week < $today){
                continue;
            }elseif($int->day_week > $today){
                $nextHour = $dateTimeBD->format('H');
                $nextMinute = $dateTimeBD->format('i');
                $nextDayEp = $int->day_week;
                break;
            }


        }

        $nextDate = Carbon::parse("next ".self::WEEK[$nextDayEp], 'America/Sao_Paulo');
        $nextDate->setTime($nextHour, $nextMinute);

        $days = $dateTimeToday->diffInDays($nextDate);
        $hours = 0;
        $minutes = 0;
        if($days == 0){
            $minutes = $dateTimeToday->floatDiffInMinutes($nextDate);
            $hours = intdiv($minutes, 60);
            $minutes = ($minutes % 60);
        }

        return (object)[
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'datetime' => $nextDate->format('d/m/Y H:i')
        ];
    }


}
