@extends('layouts.app')

@section('title', 'FeatureTypes')

@section('content')

      <h1 class="title">Edit featuretype</h1>
	  <form method="POST" action="/featuretypes/{{ $featuretype->id }}">
        @method('PATCH')
        @csrf
          <div class = "field">
            <label class="label" for="name">Feature Type</label>
            <div class="control">
                <input type="text" class="input" name="name" placeholder="feature type" value="{{ $featuretype->name }}" required>
            </div>
          </div>

          <div>
            <button type="Submit" class="button is-link">Update</button>
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

      <form method="POST" action="/featuretypes/{{ $featuretype->id }}">
        @method('DELETE')
        @csrf
        <div class="field">
          <div class="control">
            <button type="Submit" class="button">Delete</button>
          </div>
        </div>
      </form>
@endsection
