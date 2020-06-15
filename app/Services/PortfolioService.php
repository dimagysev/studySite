<?php


namespace App\Services;


use App\Models\Portfolio;
use App\Traits\Services\GetSidebar;

class PortfolioService extends Service
{
    use GetSidebar;

    private $lastPortfoliosCount;

    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
        $this->sidebarCount = config('settings.portfolios.sidebar_count');
        $this->paginate = config('settings.portfolios.paginate');
        $this->lastPortfoliosCount = config('settings.portfolios.last_portfolios_count');
    }

    public function getPaginatePortfolios()
    {
        return $this->model->query()
            ->with($this->relations)
            ->getOrPaginate($this->paginate);
    }

    public function getLastPortfolios(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->getLast($this->lastPortfoliosCount);
    }


}
