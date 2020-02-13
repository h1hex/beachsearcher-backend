<?php

namespace App\Http\Controllers\Admin;

use App\Beach;
use App\BeachParam;
use App\BeachValue;
use App\Catalog;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeachController extends Controller
{
    /**
     * Вывод списка ресурсов
     */
    public function index()
    {
        return view('admin.beaches.index', [
            'beaches' => Beach::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Вывод формы создания нового ресурса
     */
    public function create()
    {
        return view('admin.beaches.create', [
            'beach' => [],
            'cities' => City::all(),
        ]);
    }

    /**
     * Сохранение нового ресурса
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $beach = Beach::create($request->except(['pictures', 'panoramas', 'short_description']));

        if(isset($request['poi_img'])) {
            $poi_img = $request->file('$poi_img');
        }
        else {
            $poi_img = null;
        }

        // Загрузка изображений
        $this->uploadImages($request->file('pictures'), $request->file('panoramas'), $beach, $poi_img);

//        $this->generateShortDescription($beach);

        return redirect()->route('admin.beaches.edit', $beach);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function show(Beach $beach)
    {
        //
    }

    /**
     * Вывод формы редактирования ресурса
     *
     * @param  \App\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function edit(Beach $beach)
    {
        return view('admin.beaches.edit', [
            'beach' => $beach,
            'cities' => City::all(),
            'params' => BeachParam::all(),
            'catalogs' => Catalog::where('parent_id', null)->get()
        ]);
    }

    /**
     * Обновление конкретного ресурса
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beach $beach)
    {
        // Проверка обновляем мета поля или нет
        if (isset($request['update_params']) && $request['update_params'] === 'true') {
            $data = $request->except('_method', '_token', 'update_params');
            foreach ($data as $key => $value) {
                $param = BeachParam::where('name', $key)->first();
                if ($beach_value = BeachValue::where('beach_id', $beach->id)->where('param_id', $param->id)->first()) {
                    $beach_value->update([
                        $param->type => $value
                    ]);
                }
                else {
                    $beach_value = BeachValue::create([
                        'beach_id' => $beach->id,
                        'param_id' => $param->id,
                        $param->type => $value
                    ]);
                }
            }
        }
        else if ($request['update_catalogs']) {
            $data = $request->except(['_method', '_token', 'update_catalogs']);
            foreach ($data as $key => $value) {
                $catalog_id = Catalog::where('name', $key)->where('parent_id', null)->first()->id;
                if ($beach_value = BeachValue::where('catalog_id', $catalog_id)->where('beach_id', $beach->id)->first()) {
                    $beach_value->update([
                        'int' => $value,
                    ]);
                }
                else {
                    BeachValue::create([
                        'beach_id' => $beach->id,
                        'catalog_id' => $catalog_id,
                        'int' => $value
                    ]);
                }
            }
        }
        else {
            $beach->update($request->except(['pictures', 'panoramas', 'short_description', 'poi_img']));

            if(isset($request['poi_img'])) {
                $poi_img = $request->file('poi_img');
            }
            else {
                $poi_img = null;
            }

            // Загрузка изображений
            $this->uploadImages($request->file('pictures'), $request->file('panoramas'), $beach, $poi_img);

//            $this->generateShortDescription($beach);
        }

        return redirect()->route('admin.beaches.edit', $beach);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beach $beach)
    {
        $beach->delete();

        return redirect()->route('admin.beaches.index');
    }

    /**
     * Загрузка изображений на сервер
     *
     * @param $pictures - Изображения
     * @param $panoramas - Панорамы
     * @param Beach $beach - Обновляемый пляж
     * @param null $poi_img - Изображение POI карты
     */
    private function uploadImages($pictures, $panoramas, Beach $beach, $poi_img = null) {
        // Загрузка изображений
        $images=array();
        if($files=$pictures) {
            foreach ($files as $file) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('storage/beaches/' . $beach->id), $name);
                $images[] = '/storage/beaches/' . $beach->id . '/' . $name;
            }
            $images = serialize($images);
            $beach->update(['pictures' => $images]);
        }

        // Загрузка панорам
        $images=array();
        if($files=$panoramas){
            foreach($files as $file){
                $name=time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('storage/beaches/'.$beach->id.'/panoramas'), $name);
                $images[]= '/storage/beaches/' . $beach->id . '/panoramas/' . $name;
            }
            $images = serialize($images);
            $beach->update(['panoramas' => $images]);
        }

        // Загрузка POI
        if($poi_img !== null && $file=$poi_img){
            $name=time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('storage/beaches/'.$beach->id.'/poi'), $name);
            $image= '/storage/beaches/' . $beach->id . '/poi/' . $name;
            $image = serialize($image);
            $beach->update(['poi_img' => $image]);
        }

        return;
    }

    /**
     * Генерирует краткое описание
     *
     * @param Beach $beach - Обновляемый пляж
     */
    private function generateShortDescription(Beach $beach){
        if ($beach->cover) {
            $cover = $beach->cover;
        }
        else {
            $cover = '';
        }

        if ($beach->city) {
            $city = $beach->city;
        }
        else {
            $city = '';
        }

        if ($beach->width) {
            $width = $beach->width;
        }
        else {
            $width = '';
        }

        if ($beach->specification) {
            $specification = $beach->specification;
        }
        else {
            $specification = '';
        }

        $short_description = "Это " . $cover . " , расположенный недалеко от " . $city .
            ". Его ширина составляет " . $width . " метров. Среди его преимуществ " . $specification;

        $beach->update([
            'short_description' => $short_description
        ]);

        return;
    }
}
