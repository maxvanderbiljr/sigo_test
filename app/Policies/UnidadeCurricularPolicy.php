<?php

namespace App\Policies;

use App\Models\UnidadeCurricular;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UnidadeCurricularPolicy
{
    /**
     *  Listar todas as Unidades Curriculares
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isCoordenador() || $user->isOrientador();
    }

     /**
     * Visualizar uma Unidade Curricular específica.
     */
    public function view(User $user, UnidadeCurricular $unidadeCurricular): bool
    {
       return $user->isAdmin() || $user->isCoordenador();
    }

     /**
     * Criar uma nova Unidade Curricular.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Atualizar uma Unidade Curricular existente.
     */
    public function update(User $user, UnidadeCurricular $unidadeCurricular): bool
     {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Excluir uma Unidade Curricular existente.
     */
    public function delete(User $user, UnidadeCurricular $unidadeCurricular): bool
    {
        return false;
    }

    /**
     * Restaurar uma Unidade Curricular (soft delete)
     */
    public function restore(User $user, UnidadeCurricular $unidadeCurricular): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Exclusão permanente de uma Unidade Curricular
     */
    public function forceDelete(User $user, UnidadeCurricular $unidadeCurricular): bool
    {
        return $user->isAdmin();
    }

    /**
     * Exclusão em massa de Unidades Curriculares
    */
    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Restauração em massa de Unidades Curriculares
     */
    public function restoreAny(User $user, UnidadeCurricular $unidadeCurricular): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Exclusão permanente em massa de Unidades Curriculares
     */
    public function forceDeleteAny(User $user, UnidadeCurricular $unidadeCurricular): bool
    {
        return $user->isAdmin();
    }
}
