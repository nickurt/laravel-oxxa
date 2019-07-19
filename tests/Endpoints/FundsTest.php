<?php

namespace nickurt\Oxxa\Tests\Endpoints;

class FundsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_get_all_the_funds()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><channel><order><order_id>13377331</order_id><command>funds_list</command><status_code>XMLOK 41</status_code><status_description>Financiele mutaties opgevraagd, u vindt ze in DETAILS</status_description><price></price><details><transactions_total>28</transactions_total><transactions_found>1</transactions_found><order><orders_id>123654</orders_id><amount>-2.99</amount><newcredit>13.37</newcredit><date>09-07-2018</date><description><![CDATA[register example.org]]></description></order></details><order_complete>TRUE</order_complete><done>TRUE</done></order></channel>')
        );

        $this->assertSame(
            array('order' => array('order_id' => '13377331', 'command' => 'funds_list', 'status_code' => 'XMLOK 41', 'status_description' => 'Financiele mutaties opgevraagd, u vindt ze in DETAILS', 'price' => array(), 'details' => array('transactions_total' => '28', 'transactions_found' => '1', 'order' => array('orders_id' => '123654', 'amount' => '-2.99', 'newcredit' => '13.37', 'date' => '09-07-2018', 'description' => array(),),), 'order_complete' => 'TRUE', 'done' => 'TRUE',),),
            $this->oxxa->funds()->list([
                'begin' => '06-07-2018',
                'end' => '10-07-2018'
            ])
        );
    }

    /** @test */
    public function it_can_get_the_current_credit_balance_of_the_user()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><channel><order><order_id>131153240</order_id><command>funds_get</command><status_code>XMLOK 40</status_code><status_description>De credits zijn opgevraagd, u vind dit in de DETAILS</status_description><price></price><details><funds_total>9999.99</funds_total><funds_reserved>150.00</funds_reserved><funds_available>9849.99</funds_available></details><order_complete>TRUE</order_complete><done>TRUE</done></order></channel>')
        );

        $this->assertSame(
            array('order' => array('order_id' => '131153240', 'command' => 'funds_get', 'status_code' => 'XMLOK 40', 'status_description' => 'De credits zijn opgevraagd, u vind dit in de DETAILS', 'price' => array(), 'details' => array('funds_total' => '9999.99', 'funds_reserved' => '150.00', 'funds_available' => '9849.99',), 'order_complete' => 'TRUE', 'done' => 'TRUE',),),
            $this->oxxa->funds()->get()
        );
    }
}