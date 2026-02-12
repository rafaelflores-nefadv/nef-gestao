@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Editar Usuário</h2>
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block">Nome</label>
                <input type="text" name="name" id="name" class="border rounded w-full p-2" value="{{ $user->name }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" name="email" id="email" class="border rounded w-full p-2" value="{{ $user->email }}" required>
            </div>
            <div class="mb-4">
                <label for="sector" class="block">Setor</label>
                <select name="sector" id="sector" class="border rounded w-full p-2">
                    <!-- Setores -->
                </select>
            </div>
            <div class="mb-4">
                <label for="role" class="block">Papel</label>
                <select name="role" id="role" class="border rounded w-full p-2">
                    <!-- Papéis -->
                </select>
            </div>
            <div class="mb-4">
                <label for="active" class="block">Ativo</label>
                <input type="checkbox" name="active" id="active" value="1" {{ $user->active ? 'checked' : '' }}>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
        </form>
    </div>
</div>
@endsection