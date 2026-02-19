<?php

namespace App\Policies;

use App\Models\Curriculo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CurriculoPolicy
{
    /**
     * listar todos os currículos.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() ||  $user->isCoordenador() || $user->isOrientador();
    }

    /**
     * visualizar um currículo específico.
     */
    public function view(User $user, Curriculo $curriculo): bool
    {
       return $user->isAdmin() || $user->isCoordenador() || ($user->isOrientador() && $curriculo->user_id === $user->id);
    }

    /**
     * criar um novo currículo.
     */
    public function create(User $user): bool
    {
        return $user->isOrientador();
    }

    /**
     * editar um currículo existente.
     */
    public function update(User $user, Curriculo $curriculo): bool
    {
        return $user->isAdmin() 
        || $user->isCoordenador() 
        || ($user->isOrientador() && $curriculo->user_id === $user->id);
    }

    /**
     * excluir um currículo existente.
     */
    public function delete(User $user, Curriculo $curriculo): bool
    {
        return $user->isAdmin() ||  $user->isCoordenador();
    }

    /**
     * restaurar um currículo (soft delete)
     */
    public function restore(User $user, Curriculo $curriculo): bool
    {
        return $user->isAdmin() ||  $user->isCoordenador();
    }

    /**
     * exclusão permanente de um currículo
     */
    public function forceDelete(User $user, Curriculo $curriculo): bool
    {
        return $user->isAdmin() ||  $user->isCoordenador();
    }

    /**
     * exclusão em massa de currículos
     */
    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * restauração em massa de currículos
     */
    public function restoreAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * exclusão permanente em massa de currículos
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->isAdmin();
    }
}
