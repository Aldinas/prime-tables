<?php

namespace Tests\Unit;

use App\Http\Controllers\PrimeController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrimeControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIsPrime()
    {
      // We know 5 is a prime number.
      $number = 5;
      $primeCon = new PrimeController;
      $result = $primeCon->IsPrime($number);
      $this->assertTrue(true, $number . " was not identified as a Prime number");
    }

    /**
     * @depends testIsPrime
     */
    public function testGetPrimeNumbers()
    {
      // We want an array of the first 5 primes.
      $numOfPrimes = 5;
      $assertion = 7;
      $primeCon = new PrimeController;
      $result = $primeCon->GetPrimeNumbers($numOfPrimes);
      $this->assertContains($assertion,$result,$assertion . " not found in list of first " . $numOfPrimes . " prime numbers.");
      $this->assertCount($numOfPrimes, $result, "Returned list does not contain the expected " . $numOfPrimes . " elements.");
    }

    /**
     * @depends testIsPrime
     */
    public function testLargePrimeNumbers()
    {
      // We want an array of the first 5 primes.
      $numOfPrimes = 1000;
      $primeCon = new PrimeController;
      $result = $primeCon->GetPrimeNumbers($numOfPrimes);
      $this->assertCount($numOfPrimes, $result, "Returned list does not contain the expected " . $numOfPrimes . " elements.");
    }
}
