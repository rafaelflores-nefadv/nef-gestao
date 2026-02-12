<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row mb-4">
                <div class="col-md-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Usuários Ativos</h5>
                            <p class="card-text h3">{{ $totalAtivos }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Desativados</h5>
                            <p class="card-text h3">{{ $desativados }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Sync Errors</h5>
                            @if(is_array($syncErrors) && count($syncErrors) > 0)
                                <ul>
                                    @foreach($syncErrors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="card-text h3">Nenhum erro</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total por Setor</h5>
                            <ul>
                                @foreach($porSetor as $setor)
                                    <li>Setor {{ $setor->sector_id }}: {{ $setor->total }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total por Papel</h5>
                            <ul>
                                @foreach($porRole as $role)
                                    <li>Role {{ $role->hierarchical_role_id }}: {{ $role->total }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Últimos 10 Logs de Sincronização</h5>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Operação</th>
                                        <th>Status</th>
                                        <th>Erro</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logs as $log)
                                        <tr>
                                            <td>{{ $log->id }}</td>
                                            <td>{{ $log->user_id }}</td>
                                            <td>{{ $log->operation }}</td>
                                            <td>{{ $log->status }}</td>
                                            <td>{{ $log->error_message }}</td>
                                            <td>{{ $log->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
