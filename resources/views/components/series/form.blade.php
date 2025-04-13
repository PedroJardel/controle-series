<form action=" {{ $action }}" method="post">
    @if($update)
    @method('PUT')
    @endif
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
        @if($update)
        Alterar
        @else
        Adicionar
        @endif
    </button>
</form>