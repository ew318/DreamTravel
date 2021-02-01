@extends('layouts.app')

@section('title', 'FeatureTypes')

@section('content')

    <h1 class="title">{{ $featuretype->name }}</h1>
    <p>
        <a href="/featuretypes/{{ $featuretype->id }}/edit">Edit</a>
    </p>
    <ul>
        @foreach($featuretype->features as $feature)
            <li>
                <form method="POST" action="/features/{{ $feature->id }}">
                    @method('PATCH')
                    @csrf
                    <div>
                        <input type="text" name="name" value="{{$feature->name}}" required>
                        <input type="hidden" value="{{$featuretype->id}}" name="featuretype_id">
                    </div>

                      <div>
                          <button type="submit" class="button">
                            Update
                          </button>
                      </div>
                </form>

                <form method="POST" action="/features/{{ $feature->id }}">
                    @method('DELETE')
                    @csrf
                    <div class="field">
                      <div class="control">
                        <button type="Submit" class="button">Delete</button>
                      </div>
                    </div>
                </form>
            </li><br>

        @endforeach
    </ul>
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
	    <form method="POST" action="/features">
        {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title" 
            id="featuresModalLabel">Add Feature to {{ $featuretype->name }}</h4>
          </div>
          <div class="modal-body">
            <div>
                <input type="text" name="name" placeholder="Feature" required value="{{ old('name') }}">
            </div>
            <input type="hidden" value="{{ $featuretype->id }}" name="featuretype_id">
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
