<?php
/**
 * AlertControllerTest.php
 * Definition of class AlertControllerTest
 *
 * Created 31/08/14 10:30
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\FlashAlertBundle\Tests\Controller;


use Ras\Bundle\FlashAlertBundle\Model\AlertReporter;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AlertControllerTest extends WebTestCase
{

    /**
     * @test
     * @covers \Ras\Bundle\FlashAlertBundle\Controller\AlertController::displayAlertsAction
     */
    public function testDisplayAlerts()
    {
        $client = static::createClient();
        $client->request('GET', '/ras_flash_alert/display_alerts');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());

        $client = static::createClient();
        /** @var AlertReporter $alertReporter */
        $alertReporter = $client->getContainer()->get('ras_flash_alert.alert_reporter');
        $alertMessage = "Test error flash alert";
        $alertReporter->addError($alertMessage);

        $crawler1 = $client->request('GET', '/ras_flash_alert/display_alerts');

        print_r($client->getResponse()->getContent());

        // Test: flash alert that has been added recently
        $this->assertTrue($crawler1->filter("html:contains(\"{$alertMessage}\")")->count() === 1);

        $crawler2 = $client->request('GET', '/ras_flash_alert/display_alerts');

        // Test: flash alert has already been retrieved
        $this->assertTrue($crawler2->filter("html:contains(\"{$alertMessage}\")")->count() === 0);
    }

}
 