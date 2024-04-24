<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViDuController extends Controller
{
    function vidu1()
    {
        $name = "HUB";
        return view('vidu1', compact("name"));
    }
    function vidu2()
    {
        return view('vidu2');
    }
    function tinhtong(Request $request)
    {
        $so_a = $request->input("so_a");
        $so_b = $request->input("so_b");
        $ket_qua = $so_a + $so_b;
        return "Kết quả là: " . $ket_qua;
    }
    function formbai1()
    {
        return view('bai1.form'); 
    }
    function chuoiInHoa(Request $request)
    {
        $chuoi = $request->input("chuoi");
        $ket_qua = strtoupper($chuoi);
        return view('bai1.ketqua', compact("ket_qua")); 
    }
    function formbai2()
    {
        return view('bai2.form'); 
    }
    function MaxMin(Request $request)
    {
        $n_array = explode(';', $request->input("n_array"));
        function Tim_Max($n_array)
        {
            $n_max = $n_array[0];
            foreach ($n_array as $value) {
                if ($n_max < $value) {
                    $n_max = $value;
                }
            }
            return $n_max;
        }
        function Tim_Min($n_array)
        {
            $n_min = $n_array[0];
            foreach ($n_array as $value) {
                if ($n_min > $value) {
                    $n_min = $value;
                }
            }
            return $n_min;
        }
        $n_max = Tim_Max($n_array);
        $n_min = Tim_Min($n_array);
        return view('bai2.ketqua', compact("n_max", "n_min"));
    }
    function formbai3(){
        return view('bai3.form'); 
    }
    function inSo(Request $request)
    {
        $n_array = explode(';', $request->input("n_array"));
        function Is_Odd($n){
            return $n % 2 ? "blue" : "red"; 
        }

        foreach($n_array as $value){
            echo "<span style='color:" . Is_Odd($value) . "'>". $value . "</span> ";
        }
    }
    function formbai4(){
        return view('bai4.form'); 
    }
    function inthongtinsv(Request $request)
    {
        $thong_tin_sv = $request->input("thong_tin_sv");
        $sinh_vien= explode(";", $thong_tin_sv); //["MaaSV1_HoTenSV1","MaSV2_HoTenSV2",...]
        $list_sv = [];
        foreach($sinh_vien as $sv)
        {
            $tmp = explode("_", $sv);//["MaSv1","HoTenSV1"]
            $list_sv[]= $tmp; //thêm sinh viên đã xử lý vào biến $list_sv //[["MaSV1";"HoTenSV1"], ["MaSV2", "HoTenSV2"],...]
        }
        return view("bai4.ketqua", compact("list_sv"));
    }
}
