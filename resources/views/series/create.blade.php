<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input
                        autofocus
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label for="seasonsQty" class="form-label">Nº de Temporadas</label>
                    <input
                        type="text"
                        id="seasonsQty"
                        name="seasonsQty"
                        class="form-control"
                        value="{{ old('seasonsQty') }}">
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label for="episodesPerSeason" class="form-label">Eps p/ Temporada</label>
                    <input
                        type="text"
                        id="episodesPerSeason"
                        name="episodesPerSeason"
                        class="form-control"
                        value="{{ old('episodesPerSeason') }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>