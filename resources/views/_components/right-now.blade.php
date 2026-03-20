<div class="right-now">
    <div class="right-now-inner">
        <div class="section-top">
            <span>/ Right now / P. 003</span>
        </div>
        <div class="right-now-content">
            <h2>
                <span>Right</span>
                <span>Now</span>
            </h2>

            <div class="right-now-grid">
                {{-- Listening, Reading, Building, Wearing (Shoes), City, Working --}}
                @foreach($rightNowItems as $item)
                <div class="right-now-item">
                    <div class="right-now-dot"></div>
                    <div>
                        <h3 class="right-now-activity">{{ $item->category }}</h3>
                        <span class="right-now-text">{{ $item->text }}</span>
                        <p class="right-now-subtext">{{ $item->subtext }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
