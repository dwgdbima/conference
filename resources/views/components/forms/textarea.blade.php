<div class="form-group {{$topclass}}">
    @if (!is_null($label))
    <label>{{$label}}</label>
    @endif
    <textarea class="form-control {{$inputclass}} @error($name) is-invalid @enderror" rows="{{$rows}}" id="{{$id}}"
        name="{{$name}}" placeholder="{{$placeholder}}" {{($required) ? 'required' : '' }}
        {{($disabled) ? 'disabled' : '' }}>{{$slot}}</textarea>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>