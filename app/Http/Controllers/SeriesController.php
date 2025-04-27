<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Jobs\RemoveSeriesThumbnailPath;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $seriesRepository)
    {

    }
    public function index()
    {
        $series = Series::all();

        $messageSuccess = session('message.success');

        return view('series.index',)->with('series', $series)->with('messageSuccess', $messageSuccess);
    }

    public function show(Series $serie)
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
        $thumbnailPath = $request->file('thumbnail')->store('series_thumbnail', 'public');
        $request->thumbnailPath = $thumbnailPath;
        $serie = $this->seriesRepository->add($request);

        \App\Events\SeriesCreated::dispatch(
            $serie->name,
            $serie->id,
            $request->seasonsQty,
            $request->episodesPerSeason,
        );
       
        return to_route('series.index')->with('message.success', "Série '{$serie->name}' adicionada com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }
    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->update($request->all());

        return to_route('series.index')->with('message.success', "Série '{$series->name}' alterada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        RemoveSeriesThumbnailPath::dispatch($series->thumbnail_path);

        return to_route('series.index')->with('message.success', "Série '{$series->name}' removida com sucesso!");
    }
}
