@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Usuários</h2>
        <form method="GET" action="{{ route('users.index') }}" class="mb-4 flex flex-wrap gap-2">
            <select name="sector" class="border rounded p-2">
                <option value="">Setor</option>
                <!-- Setores -->
            </select>
            <select name="role" class="border rounded p-2">
                <option value="">Papel</option>
                <!-- Papéis -->
            </select>
            <select name="status" class="border rounded p-2">
                <option value="">Status</option>
                <option value="active">Ativo</option>
                <option value="disabled">Desativado</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
        </form>
        <table class="min-w-full table-auto mb-4">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Setor</th>
                    <th>Papel</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Usuários -->
            </tbody>
        </table>
        <div class="flex justify-end">
            <!-- Paginação -->
        </div>
    </div>
</div>
@endsection