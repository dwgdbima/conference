<div class="form-group {{$topclass}}">
    @if(!is_null($label))
    <label for="{{$id}}">{{$label}}</label>
    @endif
    <select class="form-control {{$inputclass}} @error($name) is-invalid @enderror" id="{{$id}}" name="{{$name}}"
        style="width:100%" {{($required) ? 'required' : '' }} {{($disabled) ? 'disabled' : '' }}
        {{($multiple) ? 'multiple' : '' }}>
        {{$slot}}
    </select>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


@push('scripts')
<script>
    $(()=>{ $('#{{$id}}').select2({ 
        placeholder: '{{$placeholder}}',
        theme: 'bootstrap4' ,
        dropdownCssClass : 'bigdrop',
        }); 
    })
</script>
@endpush