<?php

namespace App\Http\Controllers;

use App\BaoCaoDoanhThu;
use App\ChiTietBCDT;
use App\HoaDon;
use App\PhieuKhamBenh;
use Illuminate\Http\Request;

class BaoCaoDTController extends Controller
{
    //
    public function getDSBaoCaoDT()
    {
        $Month = date('m/Y');
        $DemBCDT = BaoCaoDoanhThu::where('ThangNam', $Month)->count();
        $BCDT = BaoCaoDoanhThu::where('ThangNam', $Month)->first();
        if ($DemBCDT != 0) {
            $CTBCDT = ChiTietBCDT::where('MaBCDT', $BCDT->MaBCDT)->get();
        } else $CTBCDT = NULL;
        return view('index.baocaodt.danhsach', compact('BCDT', 'CTBCDT'));
    }

    public function getThemBaoCaoDT()
    {
        $Month = date('m/Y');
        $Day = date('j');
        $DemBCDT = BaoCaoDoanhThu::where('ThangNam', $Month)->count();
        //dem khong thay thi tao moi
        if ($DemBCDT == 0) {
            $BCDT = new BaoCaoDoanhThu();
            $BCDT->ThangNam = $Month;
            $BCDT->TongDoanhThu = 0;
            $BCDT->save();
            $CTBCDT = new ChiTietBCDT();
            $CTBCDT->MaBCDT = $BCDT->MaBCDT;
            $CTBCDT->Ngay = $Day;

            $PKB = PhieuKhamBenh::where('NgayKham', date('Y-m-d'))->get();
            $SoBenhNhan = count($PKB);
            $DoanhThu = 0;
            foreach ($PKB as $detail) {
                $HoaDon = HoaDon::where('MaPKB', $detail->MaPKB)->first();
                $DoanhThu += ($HoaDon->TienKham + $HoaDon->TienThuoc);
            }
            $CTBCDT->SoBenhNhan = $SoBenhNhan;
            $CTBCDT->DoanhThu = $DoanhThu;
            $CTBCDT->save();
            $BCDT->TongDoanhThu = $DoanhThu;
            $BCDT->save();

        } else {
            $BCDT = BaoCaoDoanhThu::where('ThangNam', $Month)->first();
            $DemBCDT = ChiTietBCDT::where('MaBCDT', $BCDT->MaBCDT)->where('Ngay', $Day)->count();
            //truong hop chua co ngay
            if ($DemBCDT == 0) {
                $CTBCDT = new ChiTietBCDT();
                $CTBCDT->MaBCDT = $BCDT->MaBCDT;
                $CTBCDT->Ngay = $Day;

                $PKB = PhieuKhamBenh::where('NgayKham', date('Y-m-d'))->get();
                $SoBenhNhanNgay = count($PKB);
                $DoanhThuNgay = 0;
                foreach ($PKB as $detail) {
                    $HoaDon = HoaDon::where('MaPKB', $detail->MaPKB)->first();
                    $DoanhThuNgay += ($HoaDon->TienKham + $HoaDon->TienThuoc);
                }
                $CTBCDT->SoBenhNhan = $SoBenhNhanNgay;
                $CTBCDT->DoanhThu = $DoanhThuNgay;
                $CTBCDT->save();

                $BCDT->TongDoanhThu = $BCDT->TongDoanhThu + $DoanhThuNgay;
                $BCDT->save();
            } // truong hop da co ngay
            else {
                $CTBCDT = ChiTietBCDT::where('MaBCDT', $BCDT->MaBCDT)->where('Ngay', $Day)->first();
                $PKB = PhieuKhamBenh::where('NgayKham', date('Y-m-d'))->get();
                $PKBThang = PhieuKhamBenh::where('NgayKham', 'like', date('Y-m') . '%')->get();
                $SoBenhNhanNgay = count($PKB);
                $DoanhThuThang = 0;
                $DoanhThuNgay = 0;
                foreach ($PKB as $detail) {
                    $HoaDon = HoaDon::where('MaPKB', $detail->MaPKB)->first();
                    $DoanhThuNgay += ($HoaDon->TienKham + $HoaDon->TienThuoc);
                }
//                echo $DoanhThuNgay."<br/>";
                foreach ($PKBThang as $detail) {
                    $HoaDon = HoaDon::where('MaPKB', $detail->MaPKB)->first();
                    $DoanhThuThang += ($HoaDon->TienKham + $HoaDon->TienThuoc);
                }
//                echo $DoanhThuThang."<br/>";
//                echo count($PKBThang);
                $CTBCDT->SoBenhNhan = $SoBenhNhanNgay;
                $CTBCDT->DoanhThu = $DoanhThuNgay;
                $CTBCDT->save();

                $BCDT->TongDoanhThu = $DoanhThuThang;
                $BCDT->save();
            }
        }
        return redirect()->route('bcdt.get')->with('success', "Lập báo cáo ngày hôm nay thành công");
    }

//    public function getSuaBaoCaoDT($id)
//    {
//        $phieukb = PhieuKhamBenh::find($id);
//        $ngay = explode('-', $phieukb->NgayKham);
//        $month = $ngay[1] . "/" . $ngay[0];
//        $day = $ngay[2] * 1;
//        $namthang = $ngay[0] . "-" . $ngay[1];
//
//        $baocaodt = BaoCaoDoanhThu::where('ThangNam', $month)->first();
//
//        $bcdt = ChiTietBCDT::where('MaBCDT', $baocaodt->MaBCDT)->where('Ngay', $day)->first();
//        $pkb = PhieuKhamBenh::where('NgayKham', $phieukb->NgayKham)->get();
//        $pkbthang = PhieuKhamBenh::where('NgayKham', 'like', $namthang . '%')->get();
//        $sobenhnhanngay = count($pkb);
//        $doanhthuthang = 0;
//        $doanhthungay = 0;
//        foreach ($pkb as $detail) {
//            $hoadon = HoaDon::where('MaPKB', $detail->MaPKB)->first();
//            $doanhthungay += ($hoadon->TienKham + $hoadon->TienThuoc);
//        }
//        foreach ($pkbthang as $detail) {
//            $hoadon = HoaDon::where('MaPKB', $detail->MaPKB)->first();
//            $doanhthuthang += ($hoadon->TienKham + $hoadon->TienThuoc);
//        }
//        echo count($pkbthang);
//        $bcdt->SoBenhNhan = $sobenhnhanngay;
//        $bcdt->DoanhThu = $doanhthungay;
//        $bcdt->save();
//
//        $baocaodt->TongDoanhThu = $doanhthuthang;
//        $baocaodt->save();
//    }

    public function getAjaxBaoCaoDT(Request $request)
    {
        if ($request->ajax()) {
            $Key = $request->key;
            $Month = explode('-', $Key)[1];
            $Year = explode('-', $Key)[0];
            $DemBCDT = BaoCaoDoanhThu::where('ThangNam', $Month . "/" . $Year)->count();
            $i = 0;
            if ($DemBCDT == 0) {
                echo "<tr>";
                echo "<td colspan='5'>Không có dữ liệu</td>";
                echo "</tr>";
//                echo count($CTBCDT);
            } else {
                $BCDT = BaoCaoDoanhThu::where('ThangNam', $Month . "/" . $Year)->first();
                $CTBCDT = ChiTietBCDT::where('MaBCDT', $BCDT->MaBCDT)->get();
                foreach ($CTBCDT as $detail) {
                    echo "<tr>";
                    echo "<td>" . ++$i . "</td>";
                    echo "<td>" . ($detail->Ngay < 10 ? "0" . $detail->Ngay : $detail->Ngay) . "/" . $detail->baocaodoanhthu->ThangNam . "</td>";
                    echo "<td>" . $detail->SoBenhNhan . "</td>";
                    echo "<td>" . number_format($detail->DoanhThu) . " VND</td>";
                    echo "<td>" . round(($detail->DoanhThu / $detail->baocaodoanhthu->TongDoanhThu) * 100, 2) . "%</td>";
                    echo "</tr>";
                }
            }
        }
    }
}
