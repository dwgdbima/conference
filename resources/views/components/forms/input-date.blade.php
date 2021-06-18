<div class="form-group {{$topclass}}">
    @if (!is_null($label))
    <label for="{{$id}}">{{$label}}</label>
    @endif

    <div class="input-group date" id="{{$id}}" data-target-input="nearest">
        <input type="text" class="{{$inputclass}} form-control datetimepicker-input @error($name) is-invalid @enderror"
            name="{{$name}}" data-target="#{{$id}}" placeholder="{{$placeholder}}" value="{{$value}}"
            {{($required) ? 'required' : '' }} {{($disabled) ? 'disabled' : '' }}>
        <div class="input-group-append" data-target="#{{$id}}" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>

    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@push('scripts')
<script>
    $(()=>{
         $('#{{$id}}').datetimepicker({
        format: 'YYYY-MM-DD'
        });
    })
</script>
@endpush