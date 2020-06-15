<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Filter;

class FilterController extends SiteController
{
    public function index($filter, $entity)
    {
        $this->routeName .= '.' . $entity;
        $entities = Filter::query()
            ->where('alias', $filter)
            ->firstOrFail()->$entity()->with('filters')
            ->getOrPaginate(config('settings.'.$entity.'.paginate'));
        if ($entities->first() instanceof Article) $entities->load('user', 'comments');
        $this->data = array_merge($this->data, [$entity => $entities]);
        return $this->renderOutput();
    }
}
