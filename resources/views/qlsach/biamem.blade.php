<html>
    <head>
        <style>
            .table
                {
                    border-collapse:collapse;
                }
            .table tr td
                {
                    border: 1px solid #000;
                    padding: 5px;
                }
        </style>
    </head>
    <body>
        <table class='table'>
            <tr>
                <td align='center'>Tiêu đề</td>
                <td align='center'>Nhà xuất bản</td>
                <td align='center'>Tác giả</td>
                <td align='center'>Hình thức bìa</td>
                <td align='center'>Mô tả</td>
                <td align='center'>Giá bán</td>
            </tr>
        @foreach($sach_bia_mem as $row)
    <tr> 
        <td>{{$row->tieu_de}}</td>
        <td>{{$row->nha_xuat_ban}}</td>
        <td>{{$row->tac_gia}}</td>
        <td>{{$row->hinh_thuc_bia}}</td>
        <td>{{$row->mo_ta}}</td>
        <td>{{$row->gia_ban}}</td>
    </tr>
        
    @endforeach
        </table>
    
    </body>
</html>