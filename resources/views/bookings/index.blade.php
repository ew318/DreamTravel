@extends('layouts.app')

@section('title', 'Bookings')
@section('content')

    <div class="card">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Holidays Booked by {{Auth::user()->name}}</h3>
      <div class="card-body">
        <div id="table" class="table-editable">
          <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                aria-hidden="true"></i></a></span>
          <table class="table table-bordered table-responsive-md table-striped text-center">
            <tr>
              <th class="text-center">Holiday</th>
              <th class="text-center">Start Date</th>
              <th class="text-center">Location</th>
              <th class="text-center">Places</th>
              <th class="text-center">Total Cost (£)</th>
              <th class="text-center">More</th>
            </tr>

            @foreach($bookings as $booking)
            <tr>
              <td class="pt-3-half" contenteditable="true">{{ $booking->holiday->title }}</td>
              <td class="pt-3-half" contenteditable="true">{{ $booking->holiday->start_date }}</td>
              <td class="pt-3-half" contenteditable="true">{{ $booking->holiday->location }}</td>
              <td>
                <span class="table-update">
                @if ($booking->holiday->start_date > date('Y-m-d'))
	                <form method="POST" action="/bookings/{{ $booking->id }}" >
                    @method('PATCH')
                    {{ csrf_field() }}
                    
                        <script>
                           function getval(sel, price, id)
                            {
                                var textprice = "For " + sel.value + " places, the cost will be £" + sel.value * price;
                                $("newprice"+id).html(textprice);
                            }
                        </script>

                        <select class="num_places" name='num_places' value="{{ $booking->num_places }}" onchange="getval(this, {{$booking->holiday->price}}, {{$booking->id}});">
                            @for ($i=0; $i<=$booking->holiday->max_participants - $booking->holiday->bookings->sum('num_places') + $booking->num_places; $i++)
                            {
                                    <option value="{{ $i }}"
                                    @if ($i == $booking->num_places)
                                        selected="selected"
                                    @endif
                                    >{{ $i }}</option>
                            }
                            @endfor
                        </select>
                        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                        <input type="hidden" value="{{ $booking->holiday_id }}" name="holiday_id">
                        <button type="submit" class="btn btn-success btn-rounded btn-sm my-0">Update</button>
                    </form>
                    <newprice{{$booking->id}}></newprice{{$booking->id}}>
                @else
                    {{ $booking->num_places }}
                @endif
                </span>
              </td>
              <td class="pt-3-half" contenteditable="true">{{ $booking->holiday->price * $booking->num_places }}</td>
              <td>
                <span class="table-view">
                    <a href="/holidays/{{ $booking->holiday_id }}" class="btn btn-info btn-rounded btn-sm my-0" style="float:left;">View</a>
                    @if ($booking->holiday->start_date > date('Y-m-d'))
                    <form method="POST" action="/bookings/{{ $booking->id }}" style="float:right;" >
                        @method('DELETE')
                        @csrf
                        <button type="Submit" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
                    </form>
                    @endif
                </span>
              </td>
            </tr>
            @endforeach
            
          </table>
        </div>
      </div>
    </div>

@endsection
