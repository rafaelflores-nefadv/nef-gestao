# Gestão NEF - Documentação Completa

## Visão Geral

Gestão NEF é um sistema corporativo Laravel preparado para multiempresa, RBAC, integração com Active Directory, provisionamento de usuários, controle de perfis, grupos e setores.

---

## Estrutura do Projeto

- **Banco MySQL**
- **Autenticação Laravel Breeze (Blade)**
- **Sistema multi-role e RBAC corporativo**
- **Timezone:** America/Sao_Paulo
- **Locale:** pt_BR
- **Preparado para multiempresa**

### Principais Tabelas
- users
- hierarchical_roles
- sectors
- profiles
- ad_groups
- profile_groups
- user_profiles
- user_ad_groups
- companies
- system_permissions
- role_permissions
- ad_sync_logs

---

## RBAC e Multi-role

- HierarchicalRole: níveis (Diretor, Gestor, Supervisor, Colaborador)
- Permissões vinculadas a roles
- Provisionamento de grupos AD por perfil

## Governança

- Controllers focados em governança estão em `app/Http/Controllers/Governance`, com `HierarchicalRoleController` e `SystemPermissionController` entregando páginas index.
- As views de governança residem em `resources/views/governance/hierarchical-roles` e `resources/views/governance/system-permissions`, exibindo tabelas com níveis, chaves e timestamps para referência.
- Os links aparecem no menu lateral, via rotas `hierarchical-roles.index` e `system-permissions.index` registradas pelo prefixo `governance` em `routes/web.php`.

---

## Provisionamento AD

- Sincronização assíncrona via Job
- Log completo de operações em ad_sync_logs
- Service AdService para integração API AD

---

## Multiempresa

- company_id em todas entidades principais
- GlobalScope CompanyScope filtra por empresa do usuário
- Middleware SetCompanyContext para contexto multiempresa

---

## Dashboard Executivo

- Indicadores: usuários ativos, por setor, por papel, erros de sincronização, desativados, últimos logs

---

## Middlewares

- sector.scope: escopo de setor por papel
- set.company: contexto multiempresa

---

## Policies

- UserPolicy: regras de acesso por nível hierárquico

---

## Migrations

Ver pasta database/migrations para estrutura detalhada.

---

## Seeders

- InitialRbacSeeder: popula papéis, permissões, admin, vinculações

---

## Configuração

- .env: conexão MySQL, AD API, fila database
- config/services.php: dados da API AD

---

## Como rodar

1. Instale dependências: `composer install`, `npm install`
2. Configure `.env`
3. Rode migrations e seeders: `php artisan migrate:fresh --seed`
4. Rode fila: `php artisan queue:work`

---

## Governança

- As páginas administrativas de Governança são entregues por `App\Http\Controllers\Governance\HierarchicalRoleController` e `SystemPermissionController`, que carregam as tabelas de mídia em `resources/views/governance/hierarchical-roles` e `resources/views/governance/system-permissions`.
- Os links estão sendo renderizados no componente `x-admin-menu`, acessíveis pelas rotas nomeadas `hierarchical-roles.index` e `system-permissions.index` definidas no prefixo `governance` em `routes/web.php`.
- Os componentes Blade exibem tabelas com níveis, chaves e timestamps, servindo de base para extensão com formulários de criação/edição ou permissão de acesso.

## Observações operacionais

- O comando `php artisan route:list` ainda falha porque `App\Http\Controllers\UserController` (referenciado por `Route::resource('users', ...)`) não existe; implemente o recurso de usuários antes de rodar auditorias de rota.
- A documentação de governança pode evoluir com exemplos de políticas e permissões conforme a interface avançar.

## Contato

Dúvidas técnicas: equipe de TI

---

## Licença

Projeto interno corporativo.
