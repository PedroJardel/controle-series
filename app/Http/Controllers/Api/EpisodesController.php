<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Series $series): Collection
    {
        return $series->episodes;
    }

    public function watched(Episode $episode, Request $request)
    {
       $episode->watched = $request->watched;
       $episode->save();

       return $episode;
    }
}