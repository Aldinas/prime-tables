@extends('layouts.app')

@section('content')
  <div class="row">
      <div class="col-sm-12">
          <h3>First {{$numPrimes}} Prime Numbers</h3>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
      </div>
  </div>
    <table class="table table-striped">
      <thead>
        <th><!--Leave Blank--></th>
        @foreach($primes as $prime)
          <th>{{$prime}}</th>
        @endforeach
      </thead>
      <tbody>
      @foreach($primes as $rowPrime)
        <tr>
          <td><b>{{ $rowPrime }}</b></td>
          @foreach($primes as $prime)
          <td>{{ $rowPrime * $prime }}</td>
          @endforeach
        </tr>
      @endforeach
      </tbody>
    </table>
@endsection