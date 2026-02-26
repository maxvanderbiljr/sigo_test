<?php

namespace App\Policies;

use App\Models\UnidadeOperativa;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UnidadeOperativaPolicy
{
    /**
     *  Listar todas as Unidades Operativas
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isCoordenador() || $user->isOrientador();
    }

     /**
     * Visualizar uma Unidade Operativa específica.
     */
    public function view(User $user, UnidadeOperativa $unidadeOperativa): bool
    {
       return $user->isAdmin() || $user->isCoordenador();
    }

     /**
     * Criar uma nova Unidade Operativa.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Atualizar uma Unidade Operativa existente.
     */
    public function update(User $user, UnidadeOperativa $unidadeOperativa): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

     /**
     * Excluir uma Unidade Operativa existente.
     */
    public function delete(User $user, UnidadeOperativa $unidadeOperativa): bool
    {
        return $user->isAdmin();
    }

    /**
     * Restaurar uma Unidade Operativa (soft delete)
     */
    public function restore(User $user, UnidadeOperativa $unidadeOperativa): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Exclusão permanente de uma Unidade Operativa
     */
    public function forceDelete(User $user, UnidadeOperativa $unidadeOperativa): bool
    {
        return $user->isAdmin();
    }

    /**
     * Exclusão em massa de Unidades Operativas
    */
    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Restauração em massa de Unidades Operativas
    */
    public function restoreAny(User $user): bool
    {
         return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Exclusão permanente em massa de Unidades Operativas
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->isAdmin();
    }
}