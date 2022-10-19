<?php

namespace Tests\Unit\Services;

use App\Services\InvoiceService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{

    /** @test  */
    public function it_processes_invoice(): void
    {
        //given invoice services
        $invoiceService = new InvoiceService();
        $customer = ['name'=>'suraj'];
        $amount = 150;

        //when process is called
        $result = $invoiceService->process($customer,$amount);

        //then assert invoice is prcessed successfully
        $this->assertTrue($result);

    }

}