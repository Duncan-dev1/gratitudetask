@extends('layouts.master')

@section('content')
    <div class="container">
        <Assignments :existingassignments="{{ $assignments }}" :cars="{{ $cars }}" :categories="{{ $categories }}" :mechanics="{{ $mechanics }}"></Assignments>
    </div>
@endsection