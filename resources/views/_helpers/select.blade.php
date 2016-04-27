<select
        @foreach($attrs as $key => $value)
            {!!$key."='$value'"!!}
        @endforeach
        >
    @if($first_options)
        <option value="">{{$first_options}}</option>
    @endif
    @foreach($options as $option)
        @if($selected == $option['id'])
            <option value="{{$option['id']}}" selected>{{$option['title']}}</option>
        @else
            <option value="{{$option['id']}}">{{$option['title']}}</option>
        @endif
    @endforeach
</select>