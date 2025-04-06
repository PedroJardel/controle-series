<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-success mb-2">Nova Série</a>
    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item">{{ $serie->name }}</li>
        @endforeach
    </ul>
</x-layout>