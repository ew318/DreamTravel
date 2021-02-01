@extends('layouts.app')

@section('title', 'Add Holidays')

@section('content')
	  <form method="POST" action="/holidays">
        {{ csrf_field() }}
          <div>
            <input type="text" name="title" placeholder="Holiday Title" required value="{{ old('title') }}">
          </div>
          <div>
            <textarea name="description" placeholder="Holiday Description" required>{{ old('description') }}</textarea>
          </div>
          <div>
            <input type="text" name="location" placeholder="Holiday Location" required value="{{ old('location') }}">
          </div>
          <div>
            <input type="integer" name="lat" placeholder="Latitude" required value="{{ old('lat') }}">
          </div>
          <div>
            <input type="integer" name="long" placeholder="Longitude" required value="{{ old('long') }}">
          </div>
          <div>
            <input type="integer" name="price" placeholder="Cost (per person)" required value="{{ old('price') }}">
          </div>
          <div>
            <input type="integer" name="max_participants" placeholder="Maximum number of participants" required value="{{ old('max_participants') }}">
          </div>          
          <div>
            Start: <input type="date" name="start_date" placeholder="Start Date" required value="{{ old('start_date') }}">
          </div>
          <div>
            End: <input type="date" name="end_date" placeholder="End Date" required value="{{ old('end_date') }}">
          </div>
          <div>
            <button type="Submit">Create Holiday</button>
          </div>
	  </form>

@endsection
