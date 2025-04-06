<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()
        ->orderBy('name')
        ->get();
        return view('series.index',)->with('series', $series);
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nameSerie = $request->input('name');
        $serie = new Serie();
        $serie->name = $nameSerie;
        $serie->save();

        return redirect('/series');
    }
}