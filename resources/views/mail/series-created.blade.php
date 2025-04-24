@component('mail::message')

# Serie {{ $nameSerie }} criada

A série {{ $nameSerie }} com {{ $qtdSeasons }} temporada(s) e {{ $episodesPerSeasons }} episódio(s) foi criada com sucesso

Acesse aqui:

@component('mail::button', ['url' => route('seasons.index', $idSerie)])
Ver série
@endcomponent

@endcomponent