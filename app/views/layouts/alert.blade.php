@if(Session::has('warning'))
    <div class="alert alert-warning fade in">
        {{ Session::get('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
@elseif(Session::has('info'))
    <div class="alert alert-info fade in">
        {{ Session::get('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
@elseif(Session::has('success'))
    <div class="alert alert-success fade in">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('error') }}
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <ul>
        @foreach($errors->all() as $error)
        <li style="margin-left: -25px;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif