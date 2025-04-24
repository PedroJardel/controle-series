<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
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
        $serie = $this->seriesRepository->add($request);
        $userList = User::all();
        foreach($userList as $user) {
            $email = new SeriesCreated(
                $serie->name,
                $serie->id,
                $request->seasonsQty,
                $request->episodesPerSeason,
            );
            Mail::to($user)->queue($email);
        }
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

        return to_route('series.index')->with('message.success', "Série '{$series->name}' removida com sucesso!");
    }
}
