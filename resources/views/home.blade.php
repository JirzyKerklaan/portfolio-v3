@extends('_layout.base')

@section('namespace', 'home')

@section('seo_title', 'Full-Stack Laravel Developer in Vlaardingen, Netherlands')
@section('seo_description', "Jirzy Kerklaan is a full-stack Laravel developer from Vlaardingen, the Netherlands, specializing in PHP and modern web applications.")
@section('seo_og_title', 'Full-Stack Laravel Developer in Vlaardingen, Netherlands')
@section('seo_og_description', "Jirzy Kerklaan is a full-stack Laravel developer from Vlaardingen, the Netherlands, specializing in PHP and modern web applications.")

@section('content')
    @include('_components.hero')
    @include('_components.manifesto')
    @include('_components.skills')
    @include('_components.right-now')
    @include('_components.projects')
    @include('_components.contact')

    <div id="custom-cursor">
        <img id="cursor-img" src="" alt="Project hover image"/>
    </div>
    <progress value="0" max="100"></progress>
@endsection
