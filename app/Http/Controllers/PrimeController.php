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
      $request->validate([
        'numberOfPrimes' => 'integer'
      ]);

      // User has submitted the form, build the grid based on the provided argument.
      $primes = $this->GetPrimes($request['numberOfPrimes']);

      $data['primes'] = $primes;

      return view("primegrid", $data);
    }

    function GetPrimes($numOfPrimes)
    {
      $primes = [];

      // Start at 2 because 1 is not a prime.
      $i = 2;

      while($i <= $numOfPrimes)
      {
        // Basic checks first. If it is even but is not 2 itself, jump to next iteration as even numbers cannot be prime.
        if ($i % 2 == 0 && $i != 2)
          continue;

        // loop through all numbers that are less than or equal to half of this number.
        for ($count = 2; $count <= $i / 2; $count++) {
          // If any of these divisions return a 0, its not prime, move to next iteration.
          if ($i % $count == 0)
            continue;
        }

        // For loop finished, if we made it this far it's a prime. Add it to the array.
        $primes[] = $i;
      }

      // Run finished, we should have all primes in this returned array now.
      return $primes;
    }
}
