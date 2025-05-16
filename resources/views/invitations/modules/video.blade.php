<section class="video wow animate__animated animate__fadeInUp" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} background-image: url('{{(!empty($marco)) ? $marco : ''}}'); background-repeat:repeat-x;">
    @empty(!$module['pre_tittle'])
        <span>{{$module['pre_tittle']}}</span>
    @endempty
    @empty(!$module['tittle'])
        <h2>{{$module['tittle']}}</h2>
    @endempty
    <div class="videoPlayer {{($module['format'] == 'Horizontal') ? 'h' : 'v'}} wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
        @if(strtolower($module['type_video']) == "youtube")
        <div class="player" style="background-color:none;">
            <iframe src="https://www.youtube-nocookie.com/embed/{{$module['video_id']}}?si=7CQt0gnEV97CNWwW&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen  style="border-radius:8px;"></iframe>
        </div>
        @endif
        @if (strtolower($module['type_video']) == "vimeo")
        <div class="player">
            <iframe src="https://player.vimeo.com/video/{{$module['video_id']}}?h=b86574a207&autoplay=1&color=A2AE8C&title=0&byline=0&portrait=0" width="640" height="1138" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen  style="border-radius:8px;"></iframe>
        </div>
        @endif
    </div>
</section>