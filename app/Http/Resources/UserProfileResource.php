<?php

namespace App\Http\Resources;

use AElnemr\RestFullResponse\Helper\EmptyData;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'bio' => $this->profile && $this->profile->bio ? $this->profile->bio : EmptyData::string(),
        ];
    }
}
