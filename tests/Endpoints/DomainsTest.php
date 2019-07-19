<?php

namespace nickurt\Oxxa\Tests\Endpoints;

class DomainsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_get_a_valid_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><channel><order><order_id>0</order_id><command>domain_inf</command><sld>example</sld><tld>org</tld><status_code>XMLOK 16</status_code><status_description>In DETAILS vind u de uitgebreide informatie</status_description><price></price><details><identity-registrant>ABCD147258</identity-registrant><identity-admin>ABCD147258</identity-admin><identity-billing>ABCD147258</identity-billing><identity-tech>ABCD147258</identity-tech><identity-reseller>ABCD147258</identity-reseller><nsgroup>EFGH1234</nsgroup><expire_date>04-10-2009</expire_date><autorenew>Y</autorenew><usetrustee>N</usetrustee><dnssec>Y</dnssec></details><order_complete>TRUE</order_complete><done>TRUE</done></order></channel>')
        );

        $this->assertSame(
            array('order' => array('order_id' => '0', 'command' => 'domain_inf', 'sld' => 'example', 'tld' => 'org', 'status_code' => 'XMLOK 16', 'status_description' => 'In DETAILS vind u de uitgebreide informatie', 'price' => array(), 'details' => array('identity-registrant' => 'ABCD147258', 'identity-admin' => 'ABCD147258', 'identity-billing' => 'ABCD147258', 'identity-tech' => 'ABCD147258', 'identity-reseller' => 'ABCD147258', 'nsgroup' => 'EFGH1234', 'expire_date' => '04-10-2009', 'autorenew' => 'Y', 'usetrustee' => 'N', 'dnssec' => 'Y',), 'order_complete' => 'TRUE', 'done' => 'TRUE',),),
            $this->oxxa->domains()->inf([
                'sld' => 'example',
                'tld' => 'org'
            ])
        );
    }

    /** @test */
    public function it_can_get_all_the_domains()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><channel><order><order_id>13377331</order_id><command>domain_list</command><status_code>XMLOK18</status_code><status_description>In DETAILS vind u de uitgebreide informatie</status_description><price></price><details><domains_total>2</domains_total><domains_found>2</domains_found><domain><domainname>example1.org</domainname><nsgroup>EFGH123456</nsgroup><identity-registrant>ABCD123456</identity-registrant><identity-admin>ABCD123456</identity-admin><identity-tech>ABCD123456</identity-tech><identity-billing>ABCD123456</identity-billing><start_date>2018-01-01</start_date><expire_date>2020-01-01</expire_date><autorenew>Y</autorenew><away_date></away_date><last_renew_date>2019-01-01 12:34:56</last_renew_date><usetrustee>N</usetrustee></domain><domain><domainname>example2.org</domainname><nsgroup>EFGH654321</nsgroup><identity-registrant>REKW45997</identity-registrant><identity-admin>REKW45997</identity-admin><identity-tech>REKW45997</identity-tech><identity-billing>REKW45997</identity-billing><start_date>2018-07-01</start_date><expire_date>2020-07-01</expire_date><autorenew>Y</autorenew><away_date></away_date><last_renew_date>2019-06-08 23:45:01</last_renew_date><usetrustee></usetrustee></domain></details><order_complete>TRUE</order_complete><done>TRUE</done></order></channel>')
        );

        $this->assertSame(
            array('order' => array('order_id' => '13377331', 'command' => 'domain_list', 'status_code' => 'XMLOK18', 'status_description' => 'In DETAILS vind u de uitgebreide informatie', 'price' => array(), 'details' => array('domains_total' => '2', 'domains_found' => '2', 'domain' => array(0 => array('domainname' => 'example1.org', 'nsgroup' => 'EFGH123456', 'identity-registrant' => 'ABCD123456', 'identity-admin' => 'ABCD123456', 'identity-tech' => 'ABCD123456', 'identity-billing' => 'ABCD123456', 'start_date' => '2018-01-01', 'expire_date' => '2020-01-01', 'autorenew' => 'Y', 'away_date' => array(), 'last_renew_date' => '2019-01-01 12:34:56', 'usetrustee' => 'N',), 1 => array('domainname' => 'example2.org', 'nsgroup' => 'EFGH654321', 'identity-registrant' => 'REKW45997', 'identity-admin' => 'REKW45997', 'identity-tech' => 'REKW45997', 'identity-billing' => 'REKW45997', 'start_date' => '2018-07-01', 'expire_date' => '2020-07-01', 'autorenew' => 'Y', 'away_date' => array(), 'last_renew_date' => '2019-06-08 23:45:01', 'usetrustee' => array(),),),), 'order_complete' => 'TRUE', 'done' => 'TRUE',),),
            $this->oxxa->domains()->list([])
        );
    }

    /** @test */
    public function it_can_not_get_an_invalid_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><channel><order><order_id>131152362</order_id><command>domain_inf</command><sld>example2</sld><tld>org</tld><status_code>XMLERR 24</status_code><status_description>Dit domein is niet onder beheer van deze gebruiker</status_description><price>0</price><order_complete>FALSE</order_complete><done>TRUE</done></order></channel>')
        );

        $this->assertSame(
            array('order' => array('order_id' => '131152362', 'command' => 'domain_inf', 'sld' => 'example2', 'tld' => 'org', 'status_code' => 'XMLERR 24', 'status_description' => 'Dit domein is niet onder beheer van deze gebruiker', 'price' => '0', 'order_complete' => 'FALSE', 'done' => 'TRUE',),),
            $this->oxxa->domains()->inf([
                'sld' => 'example2',
                'tld' => 'org'
            ])
        );
    }
}