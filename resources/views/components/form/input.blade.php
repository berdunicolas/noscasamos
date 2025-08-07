
@empty(!$label)
    <label for="{{$name}}" class="form-label {{$labelClasses}}">{{$label}}</label>
@endempty
<input
    type="{{$type}}"
    name="{{$name}}"
    id="{{$id}}"
    
    value="{{$value}}"
    class="form-control {{$inputClasses}}"
    {{$extraAttributes}}
>

@empty(!$errors)
    <ul>
        @foreach ($errors as $message)
            <li class="text-danger"><span>{{ $message }}</span></li>
        @endforeach
    </ul>
@endempty
