@extends('_layout.base')

@section('namespace', 'projects-show')

@section('seo_title', "{$project->seo_title}")
@section('seo_description', "{$project->seo_description}")
@section('seo_og_title', "{$project->seo_title}")
@section('seo_og_description', "{$project->seo_description}")

@section('content')
    <div class="project-view" data-project="{{ $project->slug }}">
        <div class="project-inner">
            <div class="section-top">
                <span>/ Project / P. 0{{$project->order}}</span>
                <a href="/"><x-heroicon-c-arrow-left /> Back to work</a>
            </div>
            <h2>
                <span>{{$project->title}}</span>
            </h2>

            <div class="project-info">
                {!! $project->description !!}

                <div class="project-info-grid">
                    <ul>
                        <li>
                            <span>Year</span>
                            <p>
                            {{$project->year->format('Y')}}
                            </p>
                        </li>

                        <li>
                            <span>Client</span>
                            <p>
                            {{$project->client}}
                            </p>
                        </li>

                        <li>
                            <span>Role</span>
                            <p>
                                {{$project->role}}
                            </p>
                        </li>
                    </ul>

                    <div>
                        <span>Tools</span>
                        <ul>
                            @foreach($project->tools as $tool)
                                <li>
                                    {{$tool->tool}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="project-image">
                <img src="/assets/{{$project->cover_img}}" alt="">
            </div>

            @if ($project->overview)
            <div class="project-text intro">
                <h3>Overview</h3>

                <div>
                    {!! $project->overview !!}
                </div>
            </div>
            @endif

            <div class="project-image full-width" style="background-image: url('/assets/{{$project->mockup_img}}')"></div>


            @if ($project->outcome)
            <div class="project-text">
                <h3>Outcome</h3>
                <div>
                    {!! $project->outcome !!}
                </div>
            </div>
            @endif

            <div class="project-buttons">
                @if($previous)
                <a class="previous" href="{{route('projects.show', $previous->slug)}}">
                    <span><x-heroicon-c-arrow-left /> Previous project</span>
                    {{$previous->title}}
                </a>
                @endif

                @if($next)
                <a class="next" href="{{route('projects.show', $next->slug)}}">
                    <span>Next project <x-heroicon-c-arrow-right /></span>
                    {{$next->title}}
                </a>
                @endif
            </div>
        </div>
    </div>
@endsection
