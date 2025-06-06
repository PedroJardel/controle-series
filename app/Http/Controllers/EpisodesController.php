<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index')->with([
            'episodes' => $season->episodes,
            'messageSuccess' => session('message.success'),
        ]);
    }
    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        DB::transaction(function () use ($watchedEpisodes, $season) {
            $season->episodes()
            ->whereIn('id', $watchedEpisodes)
            ->update(['watched' => true]);

            $season->episodes()
            ->whereNotIn('id', $watchedEpisodes)
            ->update(['watched' => false]);
        });

        return to_route('episodes.index', $season->id)->with('message.success', 'Episódios alterados com sucesso!');
    }
}
