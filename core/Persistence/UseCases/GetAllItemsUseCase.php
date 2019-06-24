<?php


namespace OneStopSla\Core\Persistence\UseCases;


use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;

class GetAllItemsUseCase
{
    protected $itemsRepo;

    public function __construct(ItemsRepositoryInterface $itemsRepo)
    {
        $this->itemsRepo = $itemsRepo;
    }

    public function handle()
    {
           return $this->itemsRepo->getAllItems();
    }
}
