@extends('layouts.app')

@section('title', 'View Holiday')

@section('content')
    <h1 class="title">{{ $holiday->title }}</h1>

    <div class="content">{{ $holiday->description }}</div>
    <div class="location">Location: {{ $holiday->location }}</div>
    <div class="date">Dates: {{ $holiday->start_date }} to {{ $holiday->end_date }}</div>
    <div class="price">Price (per person): £{{ $holiday->price }}</div>
    <div class="places">Places remaining: {{ $remaining_places }}</div>
    <div class="features">Features:
        <ul>
            @foreach($holiday->holidayfeatures as $holidayfeature)
               <li>{{ $holidayfeature->feature->name }}</li>
            @endforeach
        </ul>
    </div>

    @auth
    @if ( Auth::user()->isAdmin() )
    <p>
        <a href="/holidays/{{ $holiday->id }}/edit" class="btn btn-info btn-rounded btn-sm my-0">Edit</a>
    </p>
    <form method="POST" action="/holidays/{{ $holiday->id }}">
        @method('DELETE')
        @csrf
        <div class="field">
          <div class="control">
            <button type="Submit" class="btn btn-danger btn-rounded btn-sm my-0">Delete</button>
          </div>
        </div>
    </form>
    @endif
    @endauth

    @if (Auth::check())
        @if($holiday->start_date > date('Y-m-d') and $remaining_places > 0)
        <button 
            type="button" class="btn btn-success btn-rounded btn-sm my-0"
            data-toggle="modal" 
            data-target="#featuresModal">
            Book
        </button>
        <div class="modal fade" id="featuresModal" 
                tabindex="-1" role="dialog" 
                aria-labelledby="featuresModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
	        <form method="POST" action="/bookings">
            {{ csrf_field() }}
                <div class="modal-header">
                <h4 class="modal-title" 
                id="featuresModalLabel">Book onto {{ $holiday->title }}</h4>
                </div>
                <div class="modal-body">
                <div class="places">How many places do you wish to book?
                    <select id='num_places', name='num_places', onchange="costCalculate()" required>
                        @for ($i=0; $i<=$remaining_places; $i++)
                        {
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        }
                        @endfor
                    </select>
                </div>
                <div>
                    <b>Total Cost = £<span id="demo">0</span></b>
                </div>
                <script>
                    function costCalculate() {
                        var x = document.getElementById("num_places").value;
                        document.getElementById("demo").innerHTML = x * {{ $holiday->price }};
                    }
                </script>
                <input type="hidden" value="{{Auth::id()}}" name="user_id">
                <input type="hidden" value="{{ $holiday->id }}" name="holiday_id">
                <br>
                </div>
                <div class="modal-footer">
                <button type="button" 
                    class="btn btn-default" 
                    data-dismiss="modal">Cancel</button>
                <span class="pull-right">
                    <button type="submit" class="btn btn-primary">
                    Add
                    </button>
                </span>
                </div>
            </form>
            </div>
            </div>
        </div>
        @endif

    @else
        <p>    
            <a href="/login">Login</a> or <a href="/register">Register</a> to Book.
        </p>

    @endif
    
    <div id="map"></div>
    <script>
    function initMap() {
      // The location of the holiday
      var uluru = {lat: {{$holiday->lat}}, lng: {{$holiday->long}} };
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 8, center: uluru});
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: uluru, map: map});
    }
    </script>
    <script async defer
        src="http://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap">
    </script>
@endsection

