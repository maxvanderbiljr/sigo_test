<?php

namespace App\Policies;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CursoPolicy
{
    /**
     *  Listar todos os Cursos
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isCoordenador() || $user->isOrientador();
        //return true; // Permitir que qualquer usuário possa visualizar a lista de cursos
    }

    /**
     * Visualizar um curso específico.
     */
    public function view(User $user, Curso $curso): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Criar um novo curso.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Editar um curso existente.
     */
    public function update(User $user, Curso $curso): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Excluir um curso existente.
     */
    public function delete(User $user, Curso $curso): bool
    {
        return $user->isAdmin();
    }

    /**
     * Restaurar um curso (soft delete)
     */
    public function restore(User $user, Curso $curso): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Exclusão permanente de um curso
     */
    public function forceDelete(User $user, Curso $curso): bool
    {
        return $user->isAdmin();
    }

 /**
     * Exclusão em massa de cursos
     */
    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Restauração em massa de cursos
     */
    public function restoreAny(User $user): bool
    {
        return $user->isAdmin() || $user->isCoordenador();
    }

    /**
     * Exclusão permanente em massa de cursos
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->isAdmin();

    }







}


