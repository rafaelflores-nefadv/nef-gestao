@props(['user', 'permissions', 'isSuperAdmin', 'multiCompany'])

@php
    $linkBase = 'flex items-center gap-2 px-3 py-2 rounded-lg transition text-sm';
    $sectionTitle = 'px-3 text-xs uppercase tracking-wider text-slate-400';
    $activeGroup = 'bg-slate-800 shadow-inner text-white';
    $defaultGroup = 'text-slate-300 hover:text-white hover:bg-white/5';
    $activeLink = 'text-white bg-white/10';
    $defaultLink = 'text-slate-300 hover:text-white hover:bg-white/5';
@endphp

<nav class="flex flex-col gap-6 px-3 py-4 text-sm text-slate-200">
    <div>
        <p class="{{ $sectionTitle }}">Geral</p>
        <ul class="mt-3 space-y-1">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('dashboard') ? $activeLink : $defaultLink }}">
                    Dashboard
                </a>
            </li>
        </ul>
    </div>

    @if(true)
    <div class="{{ request()->is('users*') ? $activeGroup : '' }} rounded-2xl">
        <p class="{{ $sectionTitle }}">Usuários</p>
        <ul class="mt-3 space-y-1">
            <li>
                <a href="{{ route('users.index') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('users.index') ? $activeLink : $defaultLink }}">
                    Listar Usuários
                </a>
            </li>
            <li>
                <a href="{{ route('users.create') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('users.create') ? $activeLink : $defaultLink }}">
                    Criar Usuário
                </a>
            </li>
            <li>
                <a href="{{ route('users.disabled') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('users.disabled') ? $activeLink : $defaultLink }}">
                    Usuários Desativados
                </a>
            </li>
        </ul>
    </div>
    @endif

    @if(true)
    <div class="{{ request()->is('sectors*') ? $activeGroup : '' }} rounded-2xl">
        <p class="{{ $sectionTitle }}">Setores</p>
        <ul class="mt-3 space-y-1">
            <li>
                <a href="{{ route('sectors.index') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('sectors.index') ? $activeLink : $defaultLink }}">
                    Listar Setores
                </a>
            </li>
            <li>
                <a href="{{ route('sectors.create') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('sectors.create') ? $activeLink : $defaultLink }}">
                    Criar Setor
                </a>
            </li>
        </ul>
    </div>
    @endif

    @if(true)
    <div class="{{ request()->is('profiles*') ? $activeGroup : '' }} rounded-2xl">
        <p class="{{ $sectionTitle }}">Perfis de Acesso</p>
        <ul class="mt-3 space-y-1">
            <li>
                <a href="{{ route('profiles.index') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('profiles.index') ? $activeLink : $defaultLink }}">
                    Listar Perfis
                </a>
            </li>
            <li>
                <a href="{{ route('profiles.create') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('profiles.create') ? $activeLink : $defaultLink }}">
                    Criar Perfil
                </a>
            </li>
            {{-- Link removido: Vincular Grupos AD depende de perfil específico --}}
        </ul>
    </div>
    @endif

    @if(true)
    <div class="{{ request()->is('ad-groups*') ? $activeGroup : '' }} rounded-2xl">
        <p class="{{ $sectionTitle }}">Grupos AD</p>
        <ul class="mt-3 space-y-1">
            <li>
                <a href="{{ route('ad-groups.index') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('ad-groups.index') ? $activeLink : $defaultLink }}">
                    Listar Grupos
                </a>
            </li>
            <li>
                <a href="{{ route('ad-groups.sync') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('ad-groups.sync') ? $activeLink : $defaultLink }}">
                    Sincronizar Grupos
                </a>
            </li>
        </ul>
    </div>
    @endif

    @if(true)
    <div class="{{ request()->is('governance*') ? $activeGroup : '' }} rounded-2xl">
        <p class="{{ $sectionTitle }}">Governança</p>
        <ul class="mt-3 space-y-1">
            <li>
                <a href="{{ route('hierarchical-roles.index') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('hierarchical-roles.index') ? $activeLink : $defaultLink }}">
                    Papéis Hierárquicos
                </a>
            </li>
            <li>
                <a href="{{ route('system-permissions.index') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('system-permissions.index') ? $activeLink : $defaultLink }}">
                    Permissões do Sistema
                </a>
            </li>
        </ul>
    </div>
    @endif

    @if(true)
    <div class="{{ request()->is('audit-logs*') ? $activeGroup : '' }} rounded-2xl">
        <p class="{{ $sectionTitle }}">Auditoria</p>
        <ul class="mt-3 space-y-1">
            <li>
                <a href="{{ route('audit-logs.admin') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('audit-logs.admin') ? $activeLink : $defaultLink }}">
                    Logs Administrativos
                </a>
            </li>
            <li>
                <a href="{{ route('audit-logs.ad-sync') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('audit-logs.ad-sync') ? $activeLink : $defaultLink }}">
                    Logs de Sincronização AD
                </a>
            </li>
        </ul>
    </div>
    @endif

    @if($multiCompany && $isSuperAdmin)
    <div class="{{ request()->is('companies*') ? $activeGroup : '' }} rounded-2xl">
        <p class="{{ $sectionTitle }}">Empresas</p>
        <ul class="mt-3 space-y-1">
            <li>
                <a href="{{ route('companies.index') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('companies.index') ? $activeLink : $defaultLink }}">
                    Listar Empresas
                </a>
            </li>
            <li>
                <a href="{{ route('companies.create') }}"
                   class="{{ $linkBase }} {{ request()->routeIs('companies.create') ? $activeLink : $defaultLink }}">
                    Criar Empresa
                </a>
            </li>
        </ul>
    </div>
    @endif
</nav>