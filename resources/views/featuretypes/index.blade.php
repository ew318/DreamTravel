@extends('layouts.app')

@section('title', 'FeatureTypes')

@section('content')
    <ul>
        @foreach($featuretypes as $featuretype)
           <a href="/featuretypes/{{ $featuretype->id }}">
            <li>{{ $featuretype->name }}</li>
           </a>
        @endforeach
    </ul>

    
    <p>
        <a href="/featuretypes/create">Add</a>
    </p>
@endsection
