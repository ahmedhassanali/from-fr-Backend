<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Traits\ApiResponser;
use App\Services\StoreService;


class StoreController extends Controller
{
    use ApiResponser;

    public function __construct(private StoreService $storeService)
    {
    }

    public function index()
    {
        try {
            $stores = $this->storeService->getAll();
            return $this->successResponse($stores, 'All Products');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }
    }
}
