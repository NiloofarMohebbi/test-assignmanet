<?php
use PHPUnit\Framework\TestCase;
use App\Lead\Dto\Contract;
use App\Lead\Dto\Lead;
use App\Lead\ContractValidator;

class ContractTest extends TestCase {
    public function test_get_valid_contracts()
    {

        $contract1 = new Contract(1, 'contract1', ['London', 'NY', 'Paris'], ['source1', 'source2', 'source3']);
        $contract2 = new Contract(2, 'contract2', ['London', 'NY', 'Paris'], ['source1', 'source2', 'source3']);
        $lead = new Lead(1, 'London', 'source1');

        $contractValidator = new ContractValidator();
        $result = $contract1->getValidContracts($lead);
        $this->assertEquals(42, $result);

        return true;
    }
}
