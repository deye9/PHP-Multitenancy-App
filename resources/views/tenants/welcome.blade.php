@extends('tenants.layouts.tenant')

@section('styles')
@stop

@section('content')
    <div id="app"></div>
@endsection

@section('scripts')
    <script>
        var _tenant = {!! json_encode($tenant) !!};
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
@stop
