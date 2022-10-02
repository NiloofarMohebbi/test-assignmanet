<?php

namespace App\Lead;

use App\Database\Repository\ContractRepository;
use App\Lead\Dto\Contract;
use App\Lead\Dto\Lead;

class ContractValidator
{
    /** @var ContractRepository */
    private $contractRepository;

    public function __construct(ContractRepository $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }

    public function getValidContracts(Lead $lead): array
    {
        $contracts = $this->contractRepository->findContracts();
        $validContracts = [];
        foreach ($contracts as $contract) {
            if (!empty($contract->getLocations()) && !in_array($lead->getLocation(), $contract->getLocations())) {
                continue;
            }
            if (!empty($contract->getSources()) && !in_array($lead->getSource(), $contract->getSources())) {
                continue;
            }
            $validContracts[] = $contract;
        }
        return $validContracts;
    }
}
