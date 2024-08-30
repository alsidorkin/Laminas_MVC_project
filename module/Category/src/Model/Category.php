<?php

namespace Category\Model;

class Category
{
    public $id;
    public $name;

    public function exchangeArray(array $data)
    {
        $this->id   = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
    }

    public function getArrayCopy()
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}
