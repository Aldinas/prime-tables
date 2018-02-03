@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-sm-12">
          <h1>Prime Table Exercise</h1>
        </div>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form class="form-inline" method="post" action="/">
      {{csrf_field()}}
      <div class="form-group">
        <label for="numberOfPrimes">Number of Primes</label>
        <input type="text" class="form-control" id="numberOfPrimes" name="numberOfPrimes">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection