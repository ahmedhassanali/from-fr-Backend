<?php

namespace App\Services;

use App\Repositories\StoreRepositoryInterface;
use App\Traits\ApiResponser;
use App\Traits\ImageTrait;

class StoreService
{
    use ApiResponser;
    use ImageTrait;

    private $storeRepositry;
    public function __construct(StoreRepositoryInterface $storeRepositry)
    {
        $this->storeRepositry = $storeRepositry;
    }

    public function getAll()
    {
        return $this->storeRepositry->all();
    }

    public function find(int $id)
    {
        return $this->storeRepositry->find($id);
    }

    public function store(array $data)
    {
        if (isset($data['logo']))
            $data['logo']= $this->storeImage('stores',$data['logo']);
        
        return $this->storeRepositry->create($data);
    }

    public function update(array $data, int $id)
    {
        $store = $this->find($id);
        if (isset($data['logo']))
            $data['logo']= $this->updateImage($store->logo,$data['logo'],'stores');
        return $this->storeRepositry->update($data, $id);
    }

    public function delete(int $id)
    {
        $store = $this->find($id);
        $this->deleteImage($store->logo);
        return $this->storeRepositry->delete($id);
    }
}
