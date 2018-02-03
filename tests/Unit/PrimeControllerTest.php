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
      // We should get a true back, else we have gone very very wrong.
      $this->assertTrue($result, $number . " was not identified as a Prime number");
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
      // We want to check for both our assertion number (which we have specified will be 7, and should be present) as well as ensuring
      // that the array is the correct length (5).
      $this->assertContains($assertion,$result,$assertion . " not found in list of first " . $numOfPrimes . " prime numbers.");
      $this->assertCount($numOfPrimes, $result, "Returned list does not contain the expected " . $numOfPrimes . " elements.");
    }

    /**
     * @depends testIsPrime
     */
    public function testLargePrimeNumbers()
    {
      // We want an array of the first 1000 primes.
      $numOfPrimes = 1000;
      $assertion = 7919;
      $primeCon = new PrimeController;
      $result = $primeCon->GetPrimeNumbers($numOfPrimes);
      // Simple test, we want 1000 items, did we get all of them?
      $this->assertCount($numOfPrimes, $result, "Returned list does not contain the expected " . $numOfPrimes . " elements.");
      // As a safety check, lets make sure that the array also contains the 1000th prime number (7919)
      $this->assertContains($assertion,$result,$assertion . " not found in list of first " . $numOfPrimes . " prime numbers.");
    }
}
