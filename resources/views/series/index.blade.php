<x-layout title="Séries" :messageSuccess="$messageSuccess">
    @auth
    <a href="{{ route('series.create') }}" class="btn btn-success mb-2">Nova Série</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
            {{ $serie->name }}
            @auth </a> @endauth

            @auth
            <div class="actions d-flex gap-3">
                <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm"> alterar</a>
                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        excluir
                    </button>
                </form>
            </div>
            @endauth
        </li>
        @endforeach
    </ul>
</x-layout>