
@if($style == "Light")
    <div class="intro" id="intro">
        <div class="top" id="top">
            <div class="badge animate__animated animate__zoomIn" data-wow-delay="0.3s" onclick="animar();" data-wow-offset="0">
                <img src="{{$module->data['stamp_image']}}"/>
            </div>
            <img src="{{asset("assets/images/envelopet.png")}}" class="top hiddenM  animate__animated animate__slideInDown" data-wow-offset="0"/>
            <img src="{{asset("assets/images/envelopetm.png")}}" class="top hiddenL  animate__animated animate__slideInDown" data-wow-offset="0"/>
        </div>
        <div class="bottom" id="bottom"></div>
    </div>
    <script src="../assets/js/envelope.js"></script>
@elseif ($style == "Dark")
    <div class="intro black" id="intro">
        <div class="top" id="top">
            <div class="badge animate__animated animate__zoomIn" data-wow-delay="0.3s" onclick="animar();" data-wow-offset="0">
                <img src="{{$module->data['stamp_image']}}"/>
            </div>
            <img src="{{asset("assets/images/envelopetn.png")}}" class="top hiddenM animate__animated animate__slideInDown" data-wow-offset="0"/>
            <img src="{{asset("assets/images/envelopetnm.png")}}" class="top hiddenL animate__animated animate__slideInDown" data-wow-offset="0"/>
        </div>
        <div class="bottom" id="bottom"></div>
    </div>
    <script src="../assets/js/envelope.js"></script>
@endif