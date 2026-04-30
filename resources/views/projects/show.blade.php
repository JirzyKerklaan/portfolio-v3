@extends('_layout.base')

@section('namespace', 'projects-show')

@section('seo_title', "{$project->seo_title}")
@section('seo_description', "{$project->seo_description}")
@section('seo_og_title', "{$project->seo_title}")
@section('seo_og_description', "{$project->seo_description}")

@section('content')
    <div class="project-view">
        <div class="project-inner">
            <div class="section-top">
                <span>/ Project / P. 0{{$project->order}}</span>
                <a href="/"><x-heroicon-c-arrow-left /> Back to work</a>
            </div>
            <h2>
                <span>{{$project->title}}</span>
            </h2>

            <div class="project-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad cupiditate dolor dolorum, ex expedita ipsa iste itaque laudantium nisi omnis possimus quia sequi praesentium.</p>

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
                <img src="/assets/{{$project->image_url}}.webp" alt="">
            </div>

            <div class="project-text intro">
                <h3>Overview</h3>

                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, accusantium assumenda aut autem consequatur dicta dignissimos dolorem eligendi error ex excepturi, facilis iusto porro repellat ut velit voluptas. Assumenda cum eveniet?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad animi aspernatur assumenda at culpa cumque eaque ex explicabo fuga fugit illo, incidunt ipsam, iusto labore mollitia numquam optio praesentium quis, quo quod rem repudiandae sit tenetur voluptas! A aspernatur assumenda commodi cupiditate delectus error excepturi explicabo pariatur praesentium voluptatem?</p>
                </div>
            </div>

            <div class="project-image full-width" style="background-image: url('/assets/{{$project->image_url}}-mockup.webp')"></div>


            <div class="project-text">
                <h3>Outcome</h3>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse eveniet incidunt iure mollitia voluptates. Aperiam, excepturi iure nesciunt numquam optio quae quia totam. Cum cupiditate distinctio doloremque eum iste, iure natus necessitatibus nemo nostrum perspiciatis quasi quo similique soluta sunt tempore tenetur voluptatum? Aliquid atque consectetur dolore est hic laborum quia quo temporibus totam voluptatibus. Ad consequatur, delectus incidunt iure quasi qui recusandae repudiandae rerum!</p>
                </div>
            </div>

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
