@if ($module->invitation->seller->has_banner)
    <section class="salon" style="background-color:#454545; background-image: url('{{$module->invitation->seller->media('banner_bg')->first()?->getMediaUrl()}}');">
        <div class="item">
            <div class="left"><img src="{{$module->invitation->seller->media('banner_logo')->first()?->getMediaUrl()}}" alt="Event Link"/></div>
            @if(!$module->invitation->seller->only_logo)
                <div class="right">
                    <p>{!!$module->invitation->seller->text!!}</p>
                    @empty(!$module->invitation->seller->ig_link)
                        <a href="{{$module->invitation->seller->ig_link}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    @endempty
                    @empty(!$module->invitation->seller->wpp_link)
                        <a href="{{$module->invitation->seller->wwp_link}}"><i class="fa-brands fa-whatsapp"></i></a>
                    @endempty
                    @empty(!$module->invitation->seller->tk_link)
                        <a href="{{$module->invitation->seller->tk_link}}"><i class="fa-brands fa-tiktok"></i></a>
                    @endempty
                    @empty(!$module->invitation->seller->x_link)
                        <a href="{{$module->invitation->seller->x_link}}"><i class="fa-brands fa-x-twitter"></i></a>
                    @endempty
                    @empty(!$module->invitation->seller->ytube_link)
                        <a href="{{$module->invitation->seller->ytube_link}}"><i class="fa-brands fa-youtube"></i></a>
                    @endempty
                    @empty(!$module->invitation->seller->site_link)
                        <a href="{{$module->invitation->seller->site_link}}"><i class="fa-regular fa-link"></i></a>
                    @endempty
                </div>
            @endif
        </div>
    </section>
@endif
<footer>
    <p>{!!$module->data['foot_text']!!} <a href="https://{{$module->invitation->seller->site_link}}" target="_blank">{{$module->invitation->seller->name}}</a></p>
</footer>