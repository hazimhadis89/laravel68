<?php

namespace App\Policies;

use App\Model\Post;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        if ($user->id === $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        if ($user->id === $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        if ($user->id === $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        if ($user->id === $post->user_id) {
            return true;
        } else {
            return false;
        }
    }
}
