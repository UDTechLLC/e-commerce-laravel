<?php
declare(strict_types = 1);

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

class UsersResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'         => $this->getKey(),
            'first_name' => ($this->first_name) ? substr($this->first_name, 0, 50) : "-",
            'last_name'  => ($this->last_name) ? substr($this->last_name, 0, 50) : "-",
            'email'      => ($this->email) ? substr($this->email, 0, 50) : "-",
            'phone'      => ($this->phone) ? substr($this->phone, 0, 50) : "-",
            'action'     => [
                'delete' => route('admin.users.delete', $this->getKey()),
                'edit' => route('admin.users.edit', $this->getKey())
            ]
        ];
    }
}
