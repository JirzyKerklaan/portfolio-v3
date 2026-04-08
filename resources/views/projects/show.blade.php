@extends('_layout.base')

@section('namespace', 'projects-show')

@section('seo_title', "{$project->seo_title}")
@section('seo_description', "{$project->seo_description}")
@section('seo_og_title', "{$project->seo_title}")
@section('seo_og_description', "{$project->seo_description}")

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
                        </p>
                    </div>
                    <div class="project-view-detail">
                        <h4>Year</h4>
                        <p>{{$project->year->format('Y')}}</p>
                    </div>
                    @if($project->url)
                        <div class="project-view-detail">
                            <a target="_blank" style="color: {{$project->color}}" href="{{$project->url}}">Visit site</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="project-view-gallery-title">
                <h3>Gallery</h3>
            </div>
            <div class="project-view-gallery">
                <div class="gallery-item mobile">
                    <video width="320" height="240" loop muted playsinline>
                        <source src="/assets/goedemiddag-mobile.mp4" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="gallery-item mobile">
                    <video width="320" height="240" loop muted playsinline>
                        <source src="/assets/test.mp4" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="gallery-item mobile">
                    <img src="/assets/projects/goedemiddag.webp" alt="">
                </div>

                <div class="gallery-item mobile">
                    <img src="/assets/projects/goedemiddag.webp" alt="">
                </div>


                <div class="gallery-item desktop">
                    <img src="/assets/projects/goedemiddag.webp" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
