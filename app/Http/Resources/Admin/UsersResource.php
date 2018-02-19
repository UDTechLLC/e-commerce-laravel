<?php
declare(strict_types = 1);

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

class UsersResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->getKey(),
            'name' => substr($this->name, 0, 50) ,
            'email' => substr($this->email, 0, 50) ,
            'phone' => substr($this->phone, 0, 50) ,
             'action' => [
                             'delete' => route('admin.users.delete', $this->getKey())
             ]
        ];
    }
}
