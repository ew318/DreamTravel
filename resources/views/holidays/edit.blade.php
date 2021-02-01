@extends('layouts.app')

@section('title', 'Edit Holiday')

@section('content')
      <h1 class="title">Edit Holiday</h1>
	  <form method="POST" action="/holidays/{{ $holiday->id }}">
        @method('PATCH')
        @csrf
          <div class = "field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input type="text" class="input" name="title" placeholder="Holiday Title" value="{{ $holiday->title }}" required>
            </div>
          </div>

          <div class = "field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea name="description" class="textarea" placeholder="Holiday Description" required>{{ $holiday->description }}</textarea>
            </div>
          </div>

          <div class = "field">
            <label class="label" for="location">Location</label>
            <div class="control">
                <input type="text" class="input" name="location" placeholder="Holiday Location" value="{{ $holiday->location }}" required>
            </div>
          </div>

          <div class = "field">
            <label class="label" for="lat">Latitude</label>
            <div class="control">
                <input type="integer" class="input" name="lat" placeholder="" value="{{ $holiday->lat }}" required>
            </div>
          </div>

          <div class = "field">
            <label class="label" for="long">Longitude</label>
            <div class="control">
                <input type="integer" class="input" name="long" placeholder="" value="{{ $holiday->long }}" required>
            </div>
          </div>

          <div class = "field">
            <label class="label" for="price">Price (£)</label>
            <div class="control">
                <input type="integer" class="input" name="price" placeholder="" value="{{ $holiday->price }}" required>
            </div>
          </div>

          <div class = "field">
            <label class="label" for="max_participants">Maximum number of participants</label>
            <div class="control">
                <input type="integer" class="input" name="max_participants" placeholder="" value="{{ $holiday->max_participants }}" required>
            </div>
          </div>
          
          <div class = "field">
            <label class="label" for="start_date">Start Date</label>
            <div class="control">
                <input type="date" class="input" name="start_date" placeholder="" value="{{ $holiday->start_date }}" required>
            </div>
          </div>
          
          <div class = "field">
            <label class="label" for="end_date">End Date</label>
            <div class="control">
                <input type="date" class="input" name="end_date" placeholder="" value="{{ $holiday->end_date }}" required>
            </div>
          </div>

          <div>
            <button type="Submit" class="button is-link">Update</button>
          </div>
	  </form>
    <br>
    <div>
    <h4>Holiday Features</h4>
    @foreach ($holiday->holidayfeatures as $holidayfeature)
        <div>
            <form method="POST" action="/holidayfeatures/{{$holidayfeature->id}}">
                @csrf
                @method('DELETE')
                <div class="field">
                  <div class="control">
                    <span>{{$holidayfeature->feature->name}}</span>
                    <button type="Submit" class="button">Remove</button>
                  </div>
                </div>
            </form>
        </div>
    @endforeach
    </div>
        
    <button 
       type="button"
       data-toggle="modal" 
       data-target="#featuresModal">
      Add
    </button>
    <div class="modal fade" id="featuresModal" 
         tabindex="-1" role="dialog" 
         aria-labelledby="featuresModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
	    <form method="POST" action="/holidayfeatures">
        {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title" 
            id="featuresModalLabel">Add Feature to {{ $holiday->title }}</h4>
          </div>
          <div class="modal-body">
            <div>
                <select id='feature_id' name='feature_id' required>
                    @foreach ($all_features as $all_feature)
                    {
                            <option value="{{$all_feature->id}}">{{$all_feature->name}}</option>
                    }
                    @endforeach
                </select>
            </div>
            <input type="hidden" value="{{ $holiday->id }}" name="holiday_id">
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

@endsection
