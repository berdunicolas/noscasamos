<label for="{{$name}}" class="form-label">{{$label}}</label>
<div class="position-relative">
    <input type="text" id="{{$name}}-input" class="form-control w-100" value="{{$value}}" onchange="update{{$name}}Input()" list="{{$name}}-colors">
    <input type="color" id="{{$name}}-picker" name="{{$name}}" class="form-control-color bg-transparent border border-0 position-absolute top-0 end-0" style="width:40px !important;" value="{{$value}}" onchange="update{{$name}}Color()">
</div>
<datalist id="{{$name}}-colors">
    @foreach ($colors as $color)
        <option value="{{$color->color_code}}">{{$color->color_name}}</option>
    @endforeach 
</datalist>

<script>
    /*
    function expand{{$name}}Picker() {
        document.getElementById("{{$name}}-picker").click();
    }*/

    function update{{$name}}Color() {
        let color = document.getElementById("{{$name}}-picker").value;
        document.getElementById('{{$name}}-input').value = color;
    }

    function update{{$name}}Input() {
        let color = document.getElementById("{{$name}}-input").value;
        document.getElementById('{{$name}}-picker').value = color;
    }
</script>