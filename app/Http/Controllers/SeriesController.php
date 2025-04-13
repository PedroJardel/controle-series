<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

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

    public function findOne(int $id): Serie|null
    {
        $serie = Serie::first($id);
        return $serie;
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        $request->session()->flash('message.success',"Série {$serie->name} adicionada com sucesso!");

        return to_route('series.index');
    }

    public function destroy(Serie $series, Request $request)
    {
        $series->delete();
        $request->session()->flash('message.success',"Série {$series->name} removida com sucesso!");

        return to_route('series.index');
    }
}