<?php

namespace nickurt\Oxxa\Tests\Endpoints;

class IdentitiesTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_get_a_valid_identity()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><channel><order><order_id>13377331</order_id><command>identity_get</command><status_code>XMLOK 23</status_code><status_description>De uitgebreide gegevens vind u in DETAILS</status_description><price></price><details><alias>Anne Janssen (AUTO)</alias><company>N</company><company_name></company_name><company_type></company_type><jobtitle></jobtitle><firstname>Anne</firstname><lastname>Janssen</lastname><street>Straat</street><number>26</number><suffix></suffix><postalcode>1234AB</postalcode><postalbirth></postalbirth><city>Stad</city><state></state><tel>0123456789</tel><fax></fax><email>anne@janssen.tld</email><country>NL</country><datebirth></datebirth><placebirth></placebirth><countrybirth></countrybirth><idnumber></idnumber><regnumber></regnumber><vatnumber></vatnumber><tmnumber></tmnumber><tmcountry></tmcountry><idcarddate></idcarddate><idcardissuer></idcardissuer><xxxmemberid></xxxmemberid><xxxpassword></xxxpassword><ens_id></ens_id><ens_password></ens_password><profession></profession><travel_uin_id></travel_uin_id><hk_industry_type></hk_industry_type><last_updated>01-07-2010 09:09</last_updated></details><order_complete>TRUE</order_complete><done>TRUE</done></order></channel>')
        );

        $this->assertSame(
            array('order' => array('order_id' => '13377331', 'command' => 'identity_get', 'status_code' => 'XMLOK 23', 'status_description' => 'De uitgebreide gegevens vind u in DETAILS', 'price' => array(), 'details' => array('alias' => 'Anne Janssen (AUTO)', 'company' => 'N', 'company_name' => array(), 'company_type' => array(), 'jobtitle' => array(), 'firstname' => 'Anne', 'lastname' => 'Janssen', 'street' => 'Straat', 'number' => '26', 'suffix' => array(), 'postalcode' => '1234AB', 'postalbirth' => array(), 'city' => 'Stad', 'state' => array(), 'tel' => '0123456789', 'fax' => array(), 'email' => 'anne@janssen.tld', 'country' => 'NL', 'datebirth' => array(), 'placebirth' => array(), 'countrybirth' => array(), 'idnumber' => array(), 'regnumber' => array(), 'vatnumber' => array(), 'tmnumber' => array(), 'tmcountry' => array(), 'idcarddate' => array(), 'idcardissuer' => array(), 'xxxmemberid' => array(), 'xxxpassword' => array(), 'ens_id' => array(), 'ens_password' => array(), 'profession' => array(), 'travel_uin_id' => array(), 'hk_industry_type' => array(), 'last_updated' => '01-07-2010 09:09',), 'order_complete' => 'TRUE', 'done' => 'TRUE',),),
            $this->oxxa->identities()->get(['identity' => 'ABCD123456'])
        );
    }

    /** @test */
    public function it_can_get_all_the_identities()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><channel><order><order_id>13377331</order_id><command>identity_list</command><status_code>XMLOK 22</status_code><status_description>In DETAILS vind u de uitgebreide informatie</status_description><price></price><details><identities_total>16</identities_total><identities_found>16</identities_found><identity><handle>ABCD123456</handle><alias>Voornaam Achternaam</alias><company_name>bedrijfsnaam1</company_name><name>Achternaam, voornaam</name></identity><identity><handle>ABCD654321</handle><alias>Voornaam2 Achternaam1 (AUTO)</alias><company_name></company_name><name>Achternaam1, voornaam2</name></identity></details><order_complete>TRUE</order_complete><done>TRUE</done></order></channel>')
        );

        $this->assertSame(
            array('order' => array('order_id' => '13377331', 'command' => 'identity_list', 'status_code' => 'XMLOK 22', 'status_description' => 'In DETAILS vind u de uitgebreide informatie', 'price' => array(), 'details' => array('identities_total' => '16', 'identities_found' => '16', 'identity' => array(0 => array('handle' => 'ABCD123456', 'alias' => 'Voornaam Achternaam', 'company_name' => 'bedrijfsnaam1', 'name' => 'Achternaam, voornaam',), 1 => array('handle' => 'ABCD654321', 'alias' => 'Voornaam2 Achternaam1 (AUTO)', 'company_name' => array(), 'name' => 'Achternaam1, voornaam2',),),), 'order_complete' => 'TRUE', 'done' => 'TRUE',),),
            $this->oxxa->identities()->list(['records' => 2])
        );
    }

    /** @test */
    public function it_can_not_get_an_invalid_identify()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><channel><order><order_id>131153022</order_id><command>identity_get</command><status_code>XMLERR 49</status_code><status_description>Het opgegeven profiel bestaat niet</status_description><price>0</price><order_complete>FALSE</order_complete><done>TRUE</done></order></channel>')
        );

        $this->assertSame(
            array('order' => array('order_id' => '131153022', 'command' => 'identity_get', 'status_code' => 'XMLERR 49', 'status_description' => 'Het opgegeven profiel bestaat niet', 'price' => '0', 'order_complete' => 'FALSE', 'done' => 'TRUE',),),
            $this->oxxa->identities()->get(['identity' => 'ABCD654321'])
        );
    }
}