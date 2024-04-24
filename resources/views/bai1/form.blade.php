<form action="{{url('chuoiInHoa')}}" method="post">
    Nhập chuỗi in thường: <input type='text' name='chuoi'><br>
    <input type='submit' value='Kết quả'>
    {{ csrf_field() }}
</form>