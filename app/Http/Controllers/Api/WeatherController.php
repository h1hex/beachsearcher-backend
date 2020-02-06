<?php

namespace App\Http\Controllers\Api;

use App\Beach;
use App\Weather;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;

class WeatherController extends Controller
{
    private $api_key = '4e211e96bb1246e3ba8172423200402';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $beach_id = $request['beach_id'];

        if (isset($request['date'])) {
            $need_date = $request['date'];
        }

        if ($beach_id && !isset($need_date)) {
            $beach = Beach::find($beach_id);
            // Получаем данные о погоде по городу
            $params = [
                'q' => $beach->lat . ',' . $beach->lon,
                'key' => $this->api_key,
                'format' => 'json',
                'tp' => 24
            ];

            $curl = new CurlController();
            $result = $curl->get('http://api.worldweatheronline.com/premium/v1/marine.ashx', $params);

            // При необходимости добавление нового прогноза
            $data = json_decode($result);
            foreach ($data->data->weather as $forecast) {
                if (!Weather::where('date', $forecast->date)->where('beach_id', $beach->id)->exists()) {
                    $weather = Weather::create([
                        'beach_id' => $beach->id,
                        'feels_like' => $forecast->hourly[0]->FeelsLikeC,
                        'temp_min' => $forecast->mintempC,
                        'temp_max' => $forecast->maxtempC,
                        'temp_water' => $forecast->hourly[0]->waterTemp_C,
                        'sig_height_m' => $forecast->hourly[0]->sigHeight_m,
                        'weather_icon' => $forecast->hourly[0]->weatherIconUrl[0]->value,
                        'weather_desc' => $forecast->hourly[0]->weatherDesc[0]->value,
                        'date' => $forecast->date
                    ]);
                }
            }

            // Вывод информации
            return $result;
        }
        elseif ($beach_id && isset($need_date)) {
            $beach = Beach::find($beach_id);
            // Получаем данные о погоде по городу
            $params = [
                'q' => $beach->lat . ',' . $beach->lon,
                'date' => $need_date,
                'key' => $this->api_key,
                'format' => 'json',
                'tp' => 24
            ];

            $curl = new CurlController();
            $result = $curl->get('http://api.worldweatheronline.com/premium/v1/past-marine.ashx', $params);

            // Декодирование JSON
            $data = json_decode($result);

            // Проверка на ошибку ключа
            if (isset($data->data->error)) {
                $error = $data->data->error[0]->msg;
                return json_encode($error);
            }
            else {
                // При необходимости добавление нового прогноза
                foreach ($data->data->weather as $forecast) {
                    if (!Weather::where('date', $forecast->date)->where('beach_id', $beach->id)->exists()) {
                        $weather = Weather::create([
                            'beach_id' => $beach->id,
                            'feels_like' => $forecast->hourly[0]->FeelsLikeC,
                            'temp_min' => $forecast->mintempC,
                            'temp_max' => $forecast->maxtempC,
                            'temp_water' => $forecast->hourly[0]->waterTemp_C,
                            'sig_height_m' => $forecast->hourly[0]->sigHeight_m,
                            'date' => $forecast->date
                        ]);
                    }
                }

                // Вывод информации
                return $result;
            }
        }
        else {
            $error = [
                'code' => 400,
                'message' => 'Required parameters not specified'
            ];

            return json_encode($error);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
