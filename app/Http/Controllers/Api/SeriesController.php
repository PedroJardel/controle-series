<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Jobs\RemoveSeriesThumbnailPath;
use App\Models\Series;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
        
    }
    public function index(Request $request)
    {   
        $query = Series::query();
        if($request->has('name')) {
            $query->where('name', $request->name);
        }

        return $query->paginate(5);
    }

    public function store(SeriesFormRequest $request)
    {
       return response()
       ->json($this->seriesRepository->add($request), 201);
    }

    public  function show(int $seriesId)
    {
        $seriesModel = Series::with('seasons.episodes')->find($seriesId);
        if($seriesModel === null) {
            return response()->json(['message' => 'Series not found'], 404);
        }
       return  $seriesModel;
    }

    public function update(int $seriesId, SeriesFormRequest $request)
    {
        /** @var \Request $request */
       return Series::whereId($seriesId)->update($request->all());
    }

    public function destroy(Series $series)
    {
        $series->delete();
        if(isset($series->thumbnail_path)) {
            RemoveSeriesThumbnailPath::dispatch($series->thumbnail_path);
        }
        return response()->noContent();
    }
}
