<?php


namespace OneStopSla\Core\Persistence\UseCases;


use OneStopSla\Core\Domain\Models\Lend;
use OneStopSla\Core\Domain\Repositories\LendsRepositoryInterface;

class CreateLendUseCase
{
    protected $lendsRepo;

    public function __construct(LendsRepositoryInterface $lendsRepo)
    {
        $this->lendsRepo = $lendsRepo;
    }

    public function handle($lendsData, $items)
    {
        if ($lendsData["usage_type"] == "Intern")
        {
            $lendsData["status"] = "Accepted";
        }

        $lend = $this->lendsRepo->createLend($lendsData, $items);
        return true;
    }
}
