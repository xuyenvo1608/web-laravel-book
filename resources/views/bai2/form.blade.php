<form action="{{url('MaxMin')}}" method="post">
    Nhập mảng số nguyên: <input type="text" name="n_array" placeholder="Nhập mảng số nguyên" /><br/>
    <input type="submit" value="Gửi">
    {{ csrf_field() }}
</form>