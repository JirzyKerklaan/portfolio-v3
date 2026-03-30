@extends('_layout.base')

@section('namespace', 'home')

@section('seo_title', 'Full-Stack Laravel Developer in Vlaardingen, Netherlands')
@section('seo_description', "Jirzy Kerklaan is a full-stack Laravel developer from Vlaardingen, Netherlands, specializing in PHP and modern web applications. Explore projects and get to know me.")
@section('seo_og_title', 'Full-Stack Laravel Developer in Vlaardingen, Netherlands')
@section('seo_og_description', "Jirzy Kerklaan is a full-stack Laravel developer from Vlaardingen, Netherlands, specializing in PHP and modern web applications. Explore projects and get to know me.")

@section('content')
    @include('_components.hero')
    @include('_components.manifesto')
    @include('_components.right-now')
    @include('_components.projects')
    @include('_components.contact')

    <div id="custom-cursor">
        <img id="cursor-img" src="" alt="Project hover image"/>
    </div>
@endsection
