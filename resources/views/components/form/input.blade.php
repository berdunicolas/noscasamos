
@isset($label)
<label for="{{$name}}" class="form-label {{$labelClasses}}">{{$label}}</label>
@endisset
<input
    type="{{$type}}"
    name="{{$name}}"
    id="{{$id}}"
    placeholder="{{$placeholder}}"
    value="{{$value}}"
    class="form-control {{$inputClasses}}"
>

<ul>
    @foreach ($errors as $message)
        <li class="text-danger"><span>{{ $message }}</span></li>
    @endforeach
</ul>