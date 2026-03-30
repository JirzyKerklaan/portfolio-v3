<div class="projects" id="projects">
    <div class="projects-inner">
        <div class="section-top">
            <span>/ Stuff i built / P. 004</span>
        </div>
        <div class="projects-content">
            <h2>
                <span>Featured</span>
                <span>Projects</span>
            </h2>

            <div class="project-content">
                <table class="projects-list">
                <thead>
                    <tr>
                        <th class="project-year">Year</th>
                        <th class="project-project">Project</th>
                        <th class="project-client">Description</th>
                        <th class="project-role">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr class="project" data-image="{{ $project->image_url }}" data-barba-link="/projects/{{$project->slug}}">
                            <td class="project-year"><a href="<>/projects/{{$project->slug}</>}">{{ $project->year->format('Y') }}</a></td>
                            <td class="project-project">
                                <a href="/projects/{{$project->slug}}">
                                    <h3 class="project-title">{{ $project->client }}</h3>
                                </a>
                            </td>
                            <td class="project-client"><a href="/projects/{{$project->slug}}">{{ $project->description }}</a></td>
                            <td class="project-role"><a href="/projects/{{$project->slug}}">{{ $project->role }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
