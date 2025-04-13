<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()
        ->orderBy('name')
        ->get();

        $messageSuccess = session('message.success');

        return view('series.index',)->with('series', $series)->with('messageSuccess', $messageSuccess);
    }

    public function show(Serie $serie)
    {
        $serie->first();
        return $serie;
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());

        return to_route('series.index')->with('message.success',"Série '{$serie->name}' adicionada com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('series', $series);
    }
    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->update($request->all());

        return to_route('series.index')->with('message.success',"Série '{$series->name}' alterada com sucesso!");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')->with('message.success',"Série '{$series->name}' removida com sucesso!");
    }
}