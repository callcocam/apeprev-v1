<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Policies;

use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstituicaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Instituicao $instituicao)
    {
       
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
       return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Instituicao $instituicao)
    {
       return $user->instituicao_id  == $instituicao->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Instituicao $instituicao)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Instituicao $instituicao)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Instituicao $instituicao)
    {
        //
    }
}
