@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Grupos AD</h2>
        <table class="min-w-full table-auto mb-4">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Grupos AD -->
            </tbody>
        </table>
        <div class="flex justify-end">
            <!-- Paginação -->
        </div>
        <form method="POST" action="{{ route('ad-groups.sync') }}">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Sincronizar Grupos</button>
        </form>
    </div>
</div>
@endsection