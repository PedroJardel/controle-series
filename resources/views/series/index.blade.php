<x-layout title="Séries" :messageSuccess="$messageSuccess">
    @auth
        <a href="{{ route('series.create') }}" class="btn btn-success mb-2">Nova Série</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    @if($serie->thumbnail_path !== null)
                        <img src="{{ asset('storage/' . $serie->thumbnail_path) }}" alt="Capa da série {!! $serie->name !!}"
                            class="img-fluid me-3" style="height: 80px; width: 200px; object-fit: cover; border-radius: 4px;">
                    @endif
                    @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                        {{ $serie->name }}
                        @auth </a> @endauth
                </div>

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