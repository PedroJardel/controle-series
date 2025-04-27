<x-layout title="Temporadas de {!! $series->name !!}">

    @isset($series->thumbnail_path)
        <img src="{{ asset('storage/' . $series->thumbnail_path) }}" 
            alt="Capa da série" 
            class="img-fluid mb-3"
            style="height: 200px;">
    @endisset
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>
                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>