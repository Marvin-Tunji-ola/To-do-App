@if(count($errors))
    @foreach($errors->all() as $error)
    <span class="help-block ">
        <strong>{{ $error}}</strong>
    </span>
    @endforeach
@endif