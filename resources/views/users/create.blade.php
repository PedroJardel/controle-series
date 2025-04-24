<x-layout title="Cadastro">
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input
                autofocus
                type="name"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                autofocus
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</x-layout>