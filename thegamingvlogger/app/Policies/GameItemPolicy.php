<?php

namespace App\Policies;

use App\GameItem;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GameItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\GameItem  $gameItem
     * @return mixed
     */


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\GameItem  $gameItem
     * @return mixed
     */
    public function update(User $user, GameItem $gameItem)
    {
        return $gameItem->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\GameItem  $gameItem
     * @return mixed
     */
    public function delete(User $user, GameItem $gameItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\GameItem  $gameItem
     * @return mixed
     */
    public function restore(User $user, GameItem $gameItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\GameItem  $gameItem
     * @return mixed
     */
    public function forceDelete(User $user, GameItem $gameItem)
    {
        //
    }

    public function view(User $user, GameItem $gameItem)
    {
        return $gameItem->user->is($user);
    }

}
