<option value="{{$value}}" {{($disabled) ? 'disabled' : '' }} @if($old==$value) selected @endif @if (is_null($old) &&
    $selected==true) selected @endif @if($icon) data-content="<i class='{{$content}}'></i> {{$slot}}" @endif>
    {{$slot}}
</option>