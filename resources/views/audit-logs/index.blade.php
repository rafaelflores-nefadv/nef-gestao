@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Logs de Auditoria</h2>
        <form method="GET" action="{{ route('audit-logs.index') }}" class="mb-4 flex flex-wrap gap-2">
            <input type="date" name="date" class="border rounded p-2">
            <input type="text" name="user" placeholder="Usuário" class="border rounded p-2">
            <input type="text" name="action" placeholder="Ação" class="border rounded p-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
        </form>
        <table class="min-w-full table-auto mb-4">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Usuário</th>
                    <th>Ação</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
                <!-- Logs -->
            </tbody>
        </table>
        <div class="flex justify-end">
            <!-- Paginação -->
        </div>
    </div>
</div>
@endsection