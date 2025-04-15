<button 
    type="{{$type}}"
    class="{{$classes}}"
    id="{{$id}}"
    {{($disabled) ? 'disabled' : ''}}
>
{{$slot}}
</button>