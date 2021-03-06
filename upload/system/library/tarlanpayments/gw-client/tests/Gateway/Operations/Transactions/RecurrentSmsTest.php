<?php declare(strict_types = 1);

/*
 * This file is part of the tarlanpayments/gw-client package.
 *
 * (c) Tarlan Payments
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TarlanPayments\Gateway\Operations\Transactions;

use PHPUnit\Framework\TestCase;
use TarlanPayments\Gateway\DataSets\Command;
use TarlanPayments\Gateway\DataSets\DataSet;
use TarlanPayments\Gateway\DataSets\Money;
use TarlanPayments\Gateway\Exceptions\ValidatorException;
use TarlanPayments\Gateway\Validator\Validator;

class RecurrentSmsTest extends TestCase
{
    public function testRecurrentDms()
    {
        $expected = [
            DataSet::COMMAND_DATA_GATEWAY_TRANSACTION_ID => 'qwe123qwe',
            DataSet::MONEY_DATA_AMOUNT => 100,
        ];

        $recurrentDms = new RecurrentSms(new Validator(), new Money(), new Command());
        $recurrentDms->command()->setGatewayTransactionID('qwe123qwe');
        $recurrentDms->money()->setAmount(100);

        $req = $recurrentDms->build();

        $this->assertEquals("POST", $req->getMethod());
        $this->assertEquals("/recurrent/sms", $req->getPath());
        $this->assertEquals($expected, $req->getData());
    }

    public function testRecurrentDmsValidatorException()
    {
        $this->expectException(ValidatorException::class);

        $recurrentDms = new RecurrentSms(new Validator(), new Money(), new Command());

        $recurrentDms->build();
    }
}
