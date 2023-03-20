<?php
namespace App\Repositories\Eloquent;

use App\Models\Store;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\StoreRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class StoreRepository extends BaseRepository implements StoreRepositoryInterface {

    protected $model;

    public function __construct(Store $model)
    {
        $this->model = $model;    
    }

}