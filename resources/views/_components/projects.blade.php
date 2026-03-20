<div class="projects">
    <div class="projects-inner">
        <div class="section-top">
            <span>/ Projects / P. 004</span>
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
                        <tr class="project" data-image="{{ $project->image_url }}">
                            <td class="project-year">{{ $project->year->format('Y') }}</td>
                            <td class="project-project">
                                <h3 class="project-title">{{ $project->client }}</h3>
                            </td>
                            <td class="project-client">{{ $project->description }}</td>
                            <td class="project-role">{{ $project->role }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
