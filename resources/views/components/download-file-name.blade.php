@empty($path)
<span class="text-secondary font-italic">No File</span>
@endempty
@isset($path)
<a href="{{route('download', $path)}}">{{Str::afterLast($path, '/')}}</a>
@endisset