<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeController extends Controller
{
    function Index()
    {
      $data = [];

      return view("prime");
    }

    function PrimeGrid(Request $request)
    {
      // User has submitted the form, validate it.
      $request->validate([
        'numberOfPrimes' => 'integer|min:1|max:2000'
      ]);

      // Cache variables.
      $numOfPrimes = $request['numberOfPrimes'];
      $primeCount = 0;
      $primes = [];

      for($i = 2; $primeCount < $numOfPrimes; $i++)
      {
        if($this->IsPrime($i))
          $primes[] = $i;

        $primeCount = count($primes);
      }

      $data['numPrimes'] = $numOfPrimes;
      $data['primes'] = $primes;

      return view("primegrid", $data);
    }

    function IsPrime($number)
    {
      // Confirm if a number is a prime or not. Returns boolean.
      // This shouldnt be possible, but adding a check for posterity.
      if($number === 1)
        return false;
      // We know 2 is the only even prime, so catch that here.
      else if($number == 2)
        return true;
      // Throw away all other even numbers.
      else if($number %2 == 0)
        return false;

      // loop through all numbers that are less than or equal to half of this number.
      for ($count = 2; $count <= $number / 2; $count++)
      {
        // If any of these divisions return a 0, its not prime, move to next iteration.
        if ($number % $count == 0)
          return false;
      }

      // We made it through all the checks, it must be a prime.
      return true;
    }
}
