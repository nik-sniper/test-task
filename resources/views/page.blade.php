@extends('layouts.app')

@section('title', 'Page A')

@section('content')
    <div  id="app" data-link="{{ $link->toJson() }}"></div>
@endsection
