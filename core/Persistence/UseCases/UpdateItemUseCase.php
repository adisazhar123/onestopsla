<?php


namespace OneStopSla\Core\Persistence\UseCases;


use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;

class UpdateItemUseCase
{
    protected $itemRepo;

    public function __construct(ItemsRepositoryInterface $itemsRepository)
    {
        $this->itemRepo = $itemsRepository;
    }

    public function handle($item, $id)
    {
        return $this->itemRepo->updateItem($item, $id);
    }
}
