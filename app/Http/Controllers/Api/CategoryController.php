<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    use ApiResponser;

    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {
        try {
            $categories = $this->categoryService->getAll();
            return $this->successResponse($categories, 'All Products');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }
    }
}
