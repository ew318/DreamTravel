@extends('layouts.app')

@section('title', 'Holidays')

@section('content')
    <div class="row">
      @foreach($holidays as $holiday)
      <div class="col-sm-6">
        <div class="card">
          <h5 class="card-header"><b>{{ $holiday->title }}</b></h5>
          <div class="card-body">
            <h5 class="card-title">{{ $holiday->description }}</h5>
            <img class="card-img-bottom" src="images/{{$holiday->img}}" alt="Card image cap">
            <a href="/holidays/{{ $holiday->id }}" class="btn btn-primary btn-rounded btn-sm my-0">View</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    @auth
    @if ( Auth::user()->isAdmin() )
    <p>
        <a href="/holidays/create" class="btn btn-info btn-rounded btn-sm my-0">Add</a>
    </p>
    @endif
    @endauth
@endsection
