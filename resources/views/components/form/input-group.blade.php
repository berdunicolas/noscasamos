@isset($label)
<label for="{{$labelFor}}" class="form-label">{{$label}}</label>
@endisset

<div class="input-group {{$classes}}">
    {{$slot}}
</div>
@empty(!$errors)
<ul>
    @foreach ($errors as $message)
        <li class="text-danger"><span>{{ $message }}</span></li>
    @endforeach
</ul>
@endempty