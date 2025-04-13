<form action=" {{ $action }}" method="post">
    @isset($name)
    @method('PUT')
    @endisset
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input
            type="text"
            id="name"
            name="name"
            class="form-control"
            @isset($name)
            value="{{ $name }}"
            @endisset
            >
    </div>
    <button type="submit" class="btn btn-primary">
        @if(@isset($name))
        Alterar
        @else
        Adicionar
        @endif
    </button>
</form>