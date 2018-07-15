@extends('layouts.tree')

@section('title', 'Tree')
@section('content')
    <div class="container">
        
        <div id="app">       
        <nested></nested>  
        </div>
    </div>
@endsection
@section('footerScripts')
    @parent
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection    