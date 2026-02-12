@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Empresas</h2>
        <table class="min-w-full table-auto mb-4">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Empresas -->
            </tbody>
        </table>
        <div class="flex justify-end">
            <!-- Paginação -->
        </div>
    </div>
</div>
@endsection