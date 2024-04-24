<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;

/*
class BookController extends Controller
{
    function laythongtintheloai()
    {
        $the_loai_sach = DB::table("dm_the_loai")->get();
        return view("qlsach.the_loai", compact("the_loai_sach"));
    }
    function laythongtinsach()
    {
        $sach = DB::table("sach")->select("tieu_de", "tac_gia")
            ->where("nha_xuat_ban", "Văn Học")->get();
        return view("qlsach.thong_tin_sach", compact("sach"));
    }
    /*1. Tạo 1 trang web hiển thị thông tin các cuốn sách có hình thức "Bìa mềm" và sắp xếp 
    theo giá tăng dần. Thông tin hiển thị gồm: Tiêu đề, NXB, Tác giả, Hình thức bìa, Mô tả, Giá bán
    2. Tạo 1 trang web thống kê số lượng cuốn sách của mỗi thể loại. Thông tin hiển thị gồm:
    Tên thể loại, số lượng sách */
/*
    function biamem()
    {
        $sach_bia_mem = DB::table("sach")->select("tieu_de", "nha_xuat_ban", "tac_gia", "hinh_thuc_bia", "mo_ta", "gia_ban")
            ->where("hinh_thuc_bia", "Bìa Mềm")->get();
        return view("qlsach.biamem", compact("sach_bia_mem"));
    }
    function soluongsach()
    {
        $so_luong_sach = DB::select("select d.ten_the_loai, count(*) as sl
                                    from sach s, dm_the_loai d
                                    where s.the_loai = d.id
                                    group by d.ten_the_loai);
    }
}*/
class BookController extends Controller
{
    function laythongtintheloai()
    {
        $the_loai_sach = Category::all();
        return view("qlsach.the_loai", compact("the_loai_sach"));
    }
    function laythongtinsach()
    {
        $sach = Book::where("nha_xuat_ban", "Văn Học")->get();
        return view("qlsach.thong_tin_sach", compact("sach"));
    }
    //lấy cuốn sách có giá nhỏ hơn 7.000
    function sachnhohon7000()
    {
        $sach = Book::where("gia_ban", "<", 70000)->get();
        return view("qlsach.<7000", compact("sach"));
    }
    //Lấy các cuốn sách có giá bán nhỏ hơn 70000 và sắp xếp theo giá giảm dần. Thông tin hiển thị gồm tiêu đề và tác giả.

    //Thêm dữ liệu
    function themtheloai()
    {
        $data = ["id" => 4, "ten_the_loai" => "Trinh thám"];
        DB::table("dm_the_loai")->insert($data);
    }
    //Thêm nhiều dòng
    function themnhieudong()
    {
        $data = [
            ["id" => 4, "ten_the_loai" => "Trinh thám"],
            ["id" => 5, "ten_the_loai" => "Văn học"],
        ];
        DB::table("dm_the_loai")->insert($data);
    }
    //Sửa dữ liệu
    function suadulieu()
    {
        $data = ["ten_the_loai" => "Văn học"];
        DB::table("dm_the_loai")->where("id", 4)
            ->update($data);
    }
    //Xóa dữ liệu
    function xoadulieu()
    {
        $data = ["ten_the_loai" => "Văn học"];
        DB::table("dm_the_loai")->where("id", 4)
            ->delete();
    }
    public function booklist()
    {
        $data = DB::table("sach")->get();
        return view("vidusach.book_list", compact("data"));
    }
    public function bookcreate()
    {
        $the_loai = DB::table("dm_the_loai")->get();
        $action = "add";
        return view("vidusach.book_form", compact("the_loai", "action"));
    }
    /*public function booksave($action, Request $request)
    {
        $request->validate([
            'tieu_de' => ['required', 'string', 'max:200'],
            'nha_cung_cap' => ['required', 'string', 'max:50'],
            'nha_xuat_ban' => ['required', 'string', 'max:50'],
            'tac_gia' => ['required', 'string', 'max:50'],
            'hinh_thuc_bia' => ['required', 'string', 'max:50'],
            'gia_ban' => ['required', 'numeric'],
            'the_loai' => ['required', 'max:3'],
            'file_anh_bia' => ['nullable', 'image']
        ]);
        $data = $request->except("_token");
        if ($request->hasFile("file_anh_bia")) {
            $fileName = $request->input("tieu_de") . "_" . rand(1000000, 9999999) . '.' . $request->file('file_anh_bia')->extension();
            $request->file('file_anh_bia')->storeAs('public/book_image', $fileName);
            $data['file_anh_bia'] = $fileName;
        }
        $message = "";
        if ($action == "add") {
            DB::table("sach")->insert($data);
            $message = "Thêm thành công";
        }
        return redirect()->route('booklist')->with('status', $message);
    }*/
    public function booksave($action, Request $request)
    {
        $request->validate([
            'tieu_de' => ['required', 'string', 'max:200'],
            'nha_cung_cap' => ['required', 'string', 'max:50'],
            'nha_xuat_ban' => ['required', 'string', 'max:50'],
            'tac_gia' => ['required', 'string', 'max:50'],
            'hinh_thuc_bia' => ['required', 'string', 'max:50'],
            'gia_ban' => ['required', 'numeric'],
            'the_loai' => ['required', 'max:3'],
            'file_anh_bia' => ['nullable', 'image']
        ]);
        $data = $request->except("_token");
        if ($action == "edit")
            $data = $request->except("_token", "id");
        if ($request->hasFile("file_anh_bia")) {
            $fileName = $request->input("tieu_de") . "_" . rand(1000000, 9999999) . '.' . $request->file('file_anh_bia')->extension();
            $request->file('file_anh_bia')->storeAs('public/book_image', $fileName);
            $data['file_anh_bia'] = $fileName;
        }
        //$data = $request->except("id","_token");
        $message = "";
        if ($action == "add") {
            DB::table("sach")->insert($data);
            $message = "Thêm thành công";
        } else if ($action == "edit") {
            $id = $request->id;
            DB::table("sach")->where("id", $id)->update($data);
            $message = "Cập nhật thành công";
        }
        return redirect()->route('booklist')->with('status', $message);
    }
    public function bookedit($id)
    {
        $action = "edit";
        $the_loai = DB::table("dm_the_loai")->get();
        $sach = DB::table("sach")->where("id", $id)->first();
        return view("vidusach.book_form", compact("the_loai", "action", "sach"));
    }
    public function bookdelete(Request $request)
    {
        $id = $request->id;
        DB::table("sach")->where("id", $id)->delete();
        return redirect()->route('booklist')->with('status', "Xóa thành công");
    }
}

