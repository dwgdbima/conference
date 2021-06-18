<div class="form-group {{$topclass}}">
    @if(!is_null($label))
    <label for="{{$id}}">{{$label}}</label>
    @endif
    <div class="input-group">
        <select class="form-control {{$inputclass}} @error($name) is-invalid @enderror" id="{{$id}}" name="{{$name}}"
            {{($required) ? 'required' : '' }} {{($disabled) ? 'disabled' : '' }} {{($multiple) ? 'multiple' : '' }}>
            <option value=""></option>
            @foreach ($countries as $country)
            <option @if ($old==$country['name']) selected @endif value="{{$country['name']}}"
                data-flag="{{$country['flag']}}">
                {{$country['name']}}
            </option>
            @endforeach
        </select>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-globe-asia"></span>
            </div>
        </div>
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@push('scripts')
<script>
    function formatState (state){
        if(!state.id) {
            return state.text;
        }

        let $state = $('<span><img class="img-fluid" style="width: 1.6rem;" /> <span></span></span>');

        $state.find("span").text(state.text);
        $state.find("img").attr("src", state.element.dataset['flag']);
        
        return $state;
    }

    $(()=>{ 
        $('#{{$id}}').select2({
            placeholder: "Country",
            theme: 'bootstrap4', 
            templateResult: formatState,
            templateSelection: formatState,
        })
     })
</script>
@endpush