@isset($label)
<label for="{{$labelFor}}" class="form-label">{{$label}}</label>
@endisset

<div class="input-group">
    {{$slot}}
</div>
<ul>
    @foreach ($errors as $message)
        <li class="text-danger"><span>{{ $message }}</span></li>
    @endforeach
</ul>