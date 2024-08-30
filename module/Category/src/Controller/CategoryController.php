<?php

namespace Category\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Category\Model\CategoryRepositoryInterface;

class CategoryController extends AbstractActionController
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function indexAction()
    {
        $categories = $this->categoryRepository->findAll();
        return new ViewModel(['categories' => $categories]);
    }

    public function detailAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $category = $this->categoryRepository->find($id);

        if (!$category) {
            return $this->notFoundAction();
        }

        return new ViewModel(['category' => $category]);
    }
}
