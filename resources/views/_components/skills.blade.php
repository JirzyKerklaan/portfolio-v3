<section class="skills" data-section="skills">
    <div class="skills-inner">
        <div class="section-top">
            <span>/ Who am i / P. 003</span>
        </div>
        <div class="skills-content">
            @foreach($skills as $column => $items)
                <div class="skills-content-column">
                    @if ($column === 1)
                        <div class="section-top">
                            <span>The code</span>
                        </div>
                        <h2>What <br> i build</h2>
                    @elseif ($column === 2)
                        <div class="section-top">
                            <span>The culture</span>
                        </div>
                        <h2>What <br> moves me</h2>
                    @endif

                    <div class="skills-list">
                        @foreach($items as $item)
                            <div class="skills-list-item">
                                <span>{{$item->category}}</span>
                                <ul>
                                    @foreach($item->skills as $skill)
                                        <li>{{$skill}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($column === 1)
                    <div class="skills-content-line"></div>
                @endif
            @endforeach
        </div>
    </div>
</section>
