<?php

namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;
use App\Traits\ApiResponser;
use App\Traits\ImageTrait;

class CategoryService
{
    use ApiResponser;
    use ImageTrait;

    private $categoryRepositry;
    public function __construct(CategoryRepositoryInterface $categoryRepositry)
    {
        $this->categoryRepositry = $categoryRepositry;
    }

    public function getAll()
    {
        return $this->categoryRepositry->all();
    }

    public function find(int $id)
    {
        return $this->categoryRepositry->find($id);
    }

    public function store(array $data)
    {
        return $this->categoryRepositry->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->categoryRepositry->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->categoryRepositry->delete($id);
    }
}
