@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Editar Perfil</h2>
        <form method="POST" action="{{ route('profiles.update', $profile->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block">Nome</label>
                <input type="text" name="name" id="name" class="border rounded w-full p-2" value="{{ $profile->name }}" required>
            </div>
            <div class="mb-4">
                <label for="company" class="block">Empresa</label>
                <select name="company" id="company" class="border rounded w-full p-2">
                    <!-- Empresas -->
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
        </form>
    </div>
</div>
@endsection