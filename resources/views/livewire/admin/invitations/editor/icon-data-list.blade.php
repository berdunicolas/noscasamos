<datalist id="icons-list">
    @foreach ($icons as $icon)
        <option value="{{$icon->icon_code}}">{{$icon->icon_name}} | {{$icon->icon_type}}</option>
    @endforeach 
</datalist>