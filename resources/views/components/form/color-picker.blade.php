<label for="{{$name}}" class="form-label">{{$label}}</label>
<div class="position-relative">
    <input type="text" id="{{$name}}-input" class="form-control w-100" value="{{$value}}" onchange="update{{$name}}Input()" list="{{$name}}-colors">
    <input type="color" id="{{$name}}-picker" name="{{$name}}" class="form-control-color bg-transparent border border-0 position-absolute top-0 end-0" style="width:40px !important;" value="{{$value}}" onchange="update{{$name}}Color()">
</div>
<datalist id="{{$name}}-colors">
    <option value="#DDC190">Dorado</option>
    <option value="#A5AFA0">Verde 1</option>
    <option value="#83A29B">Verde 2</option>
    <option value="#D6B4A8">Ocre</option>
    <option value="#DD9090">Salmón</option>
    <option value="#A8C5D6">Celeste</option>
    <option value="#BBB2C7">Violeta</option>
    <option value="#D58CAB">Rosa</option>  
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