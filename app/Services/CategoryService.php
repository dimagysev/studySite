<?php


namespace App\Services;


use App\Models\Category;
use App\Traits\Services\BuildTree;

class CategoryService extends Service
{
    use BuildTree;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getCategoryTree()
    {
        $categories = $this->model::all();
        return $this->buildTree($categories, 'parent_id');
    }

}
