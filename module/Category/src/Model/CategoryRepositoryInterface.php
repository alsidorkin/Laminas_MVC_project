<?php

namespace Category\Model;

interface CategoryRepositoryInterface
{
    public function findAll();
    public function find($id);
}
