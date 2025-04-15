
@isset($label)
<label for="{{$name}}" class="form-label {{$labelClasses}}">{{$label}}</label>
@endisset

<select 
    id="{{$id}}"
    name="{{$name}}" 
    class="form-select {{$selectClasses}}" 
    aria-label="{{$ariaLabel}}"
    {{($disabled) ? 'disabled' : ''}}

    {{$extraAttributes}}
>
    {{$slot}}
</select>