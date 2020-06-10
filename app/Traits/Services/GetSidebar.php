<?php


namespace App\Traits\Services;

/**
 * Trait GetSidebar
 * @package App\Traits\Services
 *
 */
trait GetSidebar
{
    protected $sidebarCount = 3;

    public function getSidebar()
    {
        return $this->getLast($this->sidebarCount);
    }

}
