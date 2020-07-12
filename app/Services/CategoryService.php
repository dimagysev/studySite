<?php


namespace App\Services;


use App\Models\Category;
use App\Traits\Services\BuildTree;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends Service
{
    use BuildTree;

    public function __construct(Category $category)
    {
        $this->model = $category;
        $this->paginate = config('settings.categories.paginate');
    }

    public function getCategoryTree()
    {
        $categories = $this->getCategories();
        return $this->buildTree($categories, 'parent_id');
    }

    public function getCategoryTreeExcept(string $alias)
    {
        $categories = $this->model::query()->where('alias', '<>', $alias)->get();
        return $this->buildTree($categories, 'parent_id');
    }

    public function getCategories()
    {
        return $this->model::all();
    }

    public function getPaginateCategories()
    {
        return $this->model::query()->addSelect([
            'parent_title' => $this->model::query()
                ->select('title')
                ->from('categories as cat')
                ->whereRaw('categories.parent_id = cat.id')
        ])->getOrPaginate($this->paginate);
    }

    public function getChildren(Model $category)
    {
        return $this->model::query()->where('parent_id', $category->id)->get();
    }


}
