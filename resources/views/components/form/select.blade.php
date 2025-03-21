
@isset($label)
<label for="{{$name}}" class="form-label {{$labelClasses}}">{{$label}}</label>
@endisset

<select 
    name="{{$name}}" 
    class="form-select {{$selectClasses}}" 
    aria-label="{{$ariaLabel}}">
>
    {{$slot}}
</select>