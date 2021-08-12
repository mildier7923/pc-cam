@if ($message = session('info'))
<div class="container-fluid b-color pb-3 alert p-0 m-0">
    <div class="callout callout-info m-0">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <h4><i class="icon fa fa-info"></i> Keep in mind!</h4>
        <p>{{$message}}</p>
    </div>
</div>
@endif

@if ($message = Session('success'))
<div class="container-fluid b-color pb-3 alert p-0 m-0">
    <div class="callout callout-success m-0">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <h4><i class="icon fa fa-check"></i> Congratulations!</h4>
        <p>{{$message}}</p>
    </div>
</div>
@endif

@if (count($errors))
<div class="container-fluid b-color pb-3 alert p-0 m-0">
    <div class="callout callout-danger m-0">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        <ul class="py-0 m-0">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

@if ($message = session('alert'))
<div class="container-fluid b-color pb-3 alert p-0 m-0">
    <div class="callout callout-warning m-0">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <h4><i class="icon fa fa-warning"></i> Warning!</h4>
        <p>{{$message}}
    </div>
</div>
@endif
