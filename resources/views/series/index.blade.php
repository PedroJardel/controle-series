<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-success mb-2">Nova Série</a>
    
    @isset($messageSuccess)
    <div class="alert alert-success">
        {{ $messageSuccess }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $serie->name }}
            <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    excluir
                </button>
            </form>
        </li>
        @endforeach
    </ul>
</x-layout>