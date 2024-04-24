@foreach ($day_so_new as $so)
    if ($so%2==0)
        <span style ="color:red">{{$so}}</span>
    else
        <span style ="color:blue">{{$so}}</span>
    @endif
@endforeach