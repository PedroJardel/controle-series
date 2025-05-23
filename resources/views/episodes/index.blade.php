<x-layout title="Episodios da temporada" :messageSuccess="$messageSuccess">
    <div class="d-flex flex-start gap-2 mb-2 align-items-center">
        <a href="{{ route('series.index') }}" class="btn btn-dark mt-2 mb-2">Voltar</a>
    </div>
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{ $episode->number }}

                <input type="checkbox"
                    name="episodes[]"
                    value="{{ $episode->id }}"
                    @if($episode->watched) checked @endif/>
            </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>