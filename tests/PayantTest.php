<?php

/*
 * This file is part of the Laravel Payant package.
 *
 * (c) Odutola Abisoye <odutolaabisoye@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Odutola\Payant\Test;

use Mockery as m;
use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;
use Odutola\Payant\Payant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Facade as Facade;

class PayantTest extends PHPUnit_Framework_TestCase
{
    protected $payant;

    public function setUp()
    {
        $this->payant = m::mock('Odutola\Payant\Payant');
        $this->mock = m::mock('GuzzleHttp\Client');
    }

    public function tearDown()
    {
        m::close();
    }

    public function testAllCustomersAreReturned()
    {
        $array = $this->payant->shouldReceive('getAllCustomers')->andReturn(['prosper']);

        $this->assertEquals('array', gettype(array($array)));
    }

    public function testAllTransactionsAreReturned()
    {
        $array = $this->payant->shouldReceive('getAllTransactions')->andReturn(['transactions']);

        $this->assertEquals('array', gettype(array($array)));
    }

    public function testAllPlansAreReturned()
    {
        $array = $this->payant->shouldReceive('getAllPlans')->andReturn(['intermediate-plan']);

        $this->assertEquals('array', gettype(array($array)));
    }
}
