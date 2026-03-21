@extends('_layout.base')

@section('title')
    {{ $project->client }}
@endsection


@section('content')
    <div class="project-view">
        <div class="project-view-inner">
            <div class="project-view-top">
                <div class="section-top">
                    <span>/ Project view</span>
                    <a href="/">X close</a>
                </div>
            </div>
            <div class="project-view-image">
                <div class="project-view-title">
                    <h1>{{$project->title}}</h1>
                    <p style="border-color: {{$project->color}}; color: {{$project->color}}">{{$project->description}}</p>
                </div>
                <img src="{{ $project->image_url }}" alt="{{ $project->client }}">
            </div>

            <div class="project-view-content">
                <div class="project-view-story">
                    <h3>The story</h3>
                    {!! $project->long_text !!}
                </div>

                <div class="project-view-details">
                    <style>
                        .project-view-detail li::marker {
                            color: {{$project->color}};
                        }
                    </style>

                    <div class="project-view-detail">
                        <h4>The stack</h4>
                        <ul>
                            @foreach($project->tools as $tool)
                                <li>{{$tool->tool}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="project-view-detail">
                        <h4>Role</h4>
                        <p>
                            {{ $project->role }}
{{--                            <span class="dot"></span>--}}
                        </p>
                    </div>
                    <div class="project-view-detail">
                        <h4>Year</h4>
                        <p>{{$project->year->format('Y')}}</p>
                    </div>
                    <div class="project-view-detail">
                        <a style="color: {{$project->color}}" href="{{$project->url}}">Visit site</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
