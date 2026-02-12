@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Detalhes do Usuário</h2>
        <div class="mb-4">
            <strong>Nome:</strong> {{ $user->name }}
        </div>
        <div class="mb-4">
            <strong>Email:</strong> {{ $user->email }}
        </div>
        <div class="mb-4">
            <strong>Setor:</strong> {{ $user->sector->name ?? '-' }}
        </div>
        <div class="mb-4">
            <strong>Papel:</strong> {{ $user->hierarchicalRole->name ?? '-' }}
        </div>
        <div class="mb-4">
            <strong>Status:</strong> {{ $user->active ? 'Ativo' : 'Desativado' }}
        </div>
        <div class="mb-4">
            <strong>Empresa:</strong> {{ $user->company->name ?? '-' }}
        </div>
        <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
    </div>
</div>
@endsection