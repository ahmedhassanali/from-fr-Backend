<?php
namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements  CategoryRepositoryInterface {

    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;    
    }

}