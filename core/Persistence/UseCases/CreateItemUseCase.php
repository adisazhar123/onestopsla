<?php

namespace OneStopSla\Core\Persistence\UseCases;

use OneStopSla\Core\Domain\Repositories\ItemsRepositoryInterface;

class CreateItemUseCase
{
    protected $itemsRepo;

    public function __construct(ItemsRepositoryInterface $repository)
    {
        $this->itemsRepo = $repository;
    }

    public function handle($item)
    {
        return $this->itemsRepo->createItem($item);
    }
}
