@if ($seller->has_banner)
    <section class="salon" style="background-color:#454545; background-image: url('{{$seller->media('banner_bg')->first()?->getMediaUrl()}}');">
        <div class="item">
            <div class="left"><img src="{{$seller->media('banner_logo')->first()?->getMediaUrl()}}" alt="Event Link"/></div>
            @if(!$seller->only_logo)
                <div class="right">
                    <p>{!!$seller->text!!}</p>
                    @empty(!$seller->ig_link)
                        <a href="{{$seller->ig_link}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    @endempty
                    @empty(!$seller->wpp_link)
                        <a href="{{$seller->wwp_link}}"><i class="fa-brands fa-whatsapp"></i></a>
                    @endempty
                    @empty(!$seller->tk_link)
                        <a href="{{$seller->tk_link}}"><i class="fa-brands fa-tiktok"></i></a>
                    @endempty
                    @empty(!$seller->x_link)
                        <a href="{{$seller->x_link}}"><i class="fa-brands fa-x-twitter"></i></a>
                    @endempty
                    @empty(!$seller->ytube_link)
                        <a href="{{$seller->ytube_link}}"><i class="fa-brands fa-youtube"></i></a>
                    @endempty
                    @empty(!$seller->site_link)
                        <a href="{{$seller->site_link}}"><i class="fa-regular fa-link"></i></a>
                    @endempty
                </div>
            @endif
        </div>
    </section>
@endif
<footer>
    <p>Hecho con <i class="fa-regular fa-heart"></i> por <a href="{{$seller->site_link}}" target="_blank">{{$seller->name}}</a></p>
</footer>