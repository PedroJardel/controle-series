<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(int $seriesId): Collection
    {
        return Season::where('series_id', '=', $seriesId)->get();
    }
}
