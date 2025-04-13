<x-layout title="Alterar Série '{!! $series->name !!}'">
    <form action="{{ route('series.update', $series) }}', $series->id)" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ $series->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>
</x-layout>