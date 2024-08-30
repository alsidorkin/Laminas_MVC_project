<?php

namespace Category\Model;

use Laminas\Db\Adapter\AdapterInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function findAll()
    {
    
    }

    public function find($id)
    {
    
    }
}
