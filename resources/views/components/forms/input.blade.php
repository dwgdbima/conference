<div class="form-group {{$topclass}}">
    @if(!is_null($label))
    <label for="{{$id}}">{{$label}}</label>
    @endif

    @if (!is_null($inputgroup))
    <div class="input-group">
        @endif

        @if($inputgroup == 'prepend')
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="{{$inputgroupicon}}"></i></span>
        </div>
        @endif

        <input type="{{$type}}" class="{{$inputclass}} form-control @error($name) is-invalid @enderror" id="{{$id}}"
            name="{{$name}}" placeholder="{{$placeholder}}" @if(!is_null($max)) max="{{$max}}" @endif
            @if(!is_null($maxlength)) maxlength="{{$maxlength}}" @endif value="{{$value}}"
            {{($required) ? 'required' : '' }} {{($disabled) ? 'disabled' : '' }}>

        @if($inputgroup == 'append')
        <div class="input-group-append">
            <span class="input-group-text"><i class="{{$inputgroupicon}}"></i></span>
        </div>
        @endif
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        @if (!is_null($inputgroup))
    </div>
    @endif
</div>