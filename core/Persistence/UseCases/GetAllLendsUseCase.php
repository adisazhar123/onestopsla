<?php


namespace OneStopSla\Core\Persistence\UseCases;


use OneStopSla\Core\Domain\Repositories\LendsRepositoryInterface;

class GetAllLendsUseCase
{
    protected $lendsRepo;

    public function __construct(LendsRepositoryInterface $lendsRepo)
    {
        $this->lendsRepo = $lendsRepo;
    }

    public function handle()
    {
        return $this->lendsRepo->getAllLends();
    }
}
