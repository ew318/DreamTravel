@extends('layouts.app')

@section('title', 'FeatureTypes')

@section('content')
	  <form method="POST" action="/featuretypes">
        {{ csrf_field() }}
          <div>
            <input type="text" name="name" placeholder="Feature Type" required value="{{ old('name') }}">
          </div>
          <div>
            <button type="Submit">Create Feature Type</button>
          </div>

          @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
	  </form>
@endsection
