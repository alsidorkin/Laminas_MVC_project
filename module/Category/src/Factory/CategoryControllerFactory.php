<?php

namespace Category\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Category\Controller\CategoryController;
use Category\Model\CategoryRepositoryInterface;

class CategoryControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $categoryRepository = $container->get(CategoryRepositoryInterface::class);
        return new CategoryController($categoryRepository);
    }
}
