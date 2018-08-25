@extends('layouts.app')

@section('content')

    <div id="app">
        <app-default :title="'{{$title}}'" :catchphase="'{{$catchphase}}'"></app-default>
    </div>

@endsection
