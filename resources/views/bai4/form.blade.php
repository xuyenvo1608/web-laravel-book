<form action="{{url('inthongtinsv')}}" method="post">
    Nhập vào thông tin sinh viên: <input type="text" name="thong_tin_sv" size ='15' /><br/>
    <input type="submit" value="In thông tin">
    {{ csrf_field() }}
</form>