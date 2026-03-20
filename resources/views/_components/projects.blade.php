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
                        <th class="project-client">Client</th>
                        <th class="project-role">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([1,2,3,4,5] as $item)
                        <tr class="project" data-image="https://www.datocms-assets.com/136821/1773221984-itv_film_stills_review_film_still_07_main_v001_ftrack_review_still.jpg?fit=crop&w=3424">
                            <td class="project-year">2025</td>
                            <td class="project-project">
                                <h3 class="project-title">Goedemiddag website</h3>
                            </td>
                            <td class="project-client">Goedemiddag Online b.v.</td>
                            <td class="project-role">Full-stack development</td>
                        </tr>

                        <tr class="project" data-image="https://www.datocms-assets.com/136821/1773222102-itv_background_stills_review_bg_still_01_main_v004_ftrack_review_still.jpg?fit=crop&fm=webp&h=1704&w=1704">
                            <td class="project-year">2024</td>
                            <td class="project-project">
                                <h3 class="project-title">Avezaat cranes website</h3>
                            </td>
                            <td class="project-client">Avezaat group</td>
                            <td class="project-role">Back-end development</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
