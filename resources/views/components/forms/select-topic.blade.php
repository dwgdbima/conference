<div class="form-group {{$topclass}}">
    @if(!is_null($label))
    <label for="{{$id}}">{{$label}}</label>
    @endif
    <div class="input-group">
        <select class="form-control {{$inputclass}} @error($name) is-invalid @enderror" id="{{$id}}" name="{{$name}}"
            {{($required) ? 'required' : '' }} {{($disabled) ? 'disabled' : '' }} {{($multiple) ? 'multiple' : '' }}>
            <option value=""></option>
            @foreach ($topics as $topic)
            <option @if ($old==$topic->id) selected @endif value="{{$topic->id}}">
                {{$topic->name}}
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
        placeholder: 'Select Topic',
        theme: 'bootstrap4' ,
        dropdownCssClass : 'bigdrop',
        }); 
    })
</script>
@endpush