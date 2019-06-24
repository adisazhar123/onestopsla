<?php


namespace OneStopSla\Core\Persistence\UseCases;


use OneStopSla\Core\Domain\Repositories\LendsRepositoryInterface;

class GetLendWithItemsUseCase
{
    protected $lendsRepository;

    public function __construct(LendsRepositoryInterface $lendsRepository)
    {
        $this->lendsRepository = $lendsRepository;
    }

    public function handle(array $attributes, array $relations)
    {
        return $this->lendsRepository->findLendWithItems($attributes, $relations);
    }

}
