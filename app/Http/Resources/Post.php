<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = null;
        if ($this->user) {
            $user = [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ];
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'user' => $user,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
