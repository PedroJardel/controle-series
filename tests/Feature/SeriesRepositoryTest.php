<?php

namespace Tests\Feature;

use App\Http\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created(): void
    {
        // Arrange
        /**
         * @var SeriesRepository $repository
         */
        $repository = $this->app->make(SeriesRepository::class);
        $request = new SeriesFormRequest();
        $request->merge([
            'name' => 'Nome da Série',
            'seasonsQty' => 1,
            'episodesPerSeason' => 1,
        ]);
        // Act
        $repository->add($request);

        // Assert
        $this->assertDatabaseHas('series', ['name' => 'Nome da Série']);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}
