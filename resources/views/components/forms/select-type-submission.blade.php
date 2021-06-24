<div class="form-group {{$topclass}}">
    @if(!is_null($label))
    <label for="{{$id}}">{{$label}}</label>
    @endif
    <div class="input-group">
        <select class="form-control {{$inputclass}} @error($name) is-invalid @enderror" id="{{$id}}" name="{{$name}}"
            {{($required) ? 'required' : '' }} {{($disabled) ? 'disabled' : '' }} {{($multiple) ? 'multiple' : '' }}>
            <option value=""></option>
            @foreach ($types as $type)
            <option @if ($old==$type['name']) selected @endif value="{{$type['name']}}">
                {{$type['name']}}
            </option>
            @endforeach
        </select>
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@push('scripts')
<script>
    $(()=>{ $('#{{$id}}').select2({ 
        placeholder: 'Select Presentation Type',
        theme: 'bootstrap4' ,
        dropdownCssClass : 'bigdrop',
        }); 
    })
</script>
@endpush