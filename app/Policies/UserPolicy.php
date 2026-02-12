<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Permite tudo para super admin.
     */
    private function isSuperAdmin(User $user): bool
    {
        return $user->is_super_admin === true;
    }

    /**
     * Regra de manage: só pode gerenciar se o level do authUser for maior que o do targetUser.
     */
    public function manage(User $authUser, User $targetUser): bool
    {
        if ($this->isSuperAdmin($authUser)) {
            return true;
        }
        if ($authUser->hierarchicalRole->level <= $targetUser->hierarchicalRole->level) {
            return false;
        }
        return true;
    }

    public function view(User $authUser, User $targetUser): bool
    {
        return $this->manage($authUser, $targetUser);
    }

    public function update(User $authUser, User $targetUser): bool
    {
        return $this->manage($authUser, $targetUser);
    }

    public function disable(User $authUser, User $targetUser): bool
    {
        return $this->manage($authUser, $targetUser);
    }
}
