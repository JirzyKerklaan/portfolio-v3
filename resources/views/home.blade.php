@extends('_layout.base')

@section('namespace', 'home')

@section('title')
    Home
@endsection

@section('content')
    @include('_components.hero')
    @include('_components.manifesto')
    @include('_components.right-now')
    @include('_components.projects')
    @include('_components.contact')

    <div id="custom-cursor">
        <img id="cursor-img" src=""/>
    </div>
@endsection
