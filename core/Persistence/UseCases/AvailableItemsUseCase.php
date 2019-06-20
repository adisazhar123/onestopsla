<?php


namespace OneStopSla\Core\Persistence\UseCases;


use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;

class AvailableItemsUseCase
{
    public function __construct(ItemsRepositoryInterface $repository)
    {
        $this->itemsRepo = $repository;
    }

    public function handle($end_date = null)
    {
        return $this->itemsRepo->getAvailableItems($end_date);
    }
}
