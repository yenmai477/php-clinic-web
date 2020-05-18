<?php

namespace App\Http\Controllers;

use App\BaoCaoSuDungThuoc;
use App\ChiTietBCSDT;
use App\ChiTietPKB;
use App\PhieuKhamBenh;
use App\Thuoc;
use Illuminate\Http\Request;

class BaoCaoSDTController extends Controller
{
    //
    protected function ThongKeThuoc($t, $n)
    {
        $Thang = $t . "/" . $n;
        $Thang2 = $n . "-" . $t;
        $DemBCSDT = BaoCaoSuDungThuoc::where('ThangNam', $Thang)->count();
        if ($DemBCSDT == 0) //bao cao chua duoc tao
        {
//          tao bao cao va thong ke
            $BCSDT = new BaoCaoSuDungThuoc();
            $BCSDT->ThangNam = $Thang;
            $BCSDT->save();

            $PKB = PhieuKhamBenh::where('NgayKham', 'like', $Thang2 . '%')->get();

            $dsThuoc = Thuoc::all();
            foreach ($dsThuoc as $detail) {
                $SoLuongDung = 0;
                $SoLanDung = 0;

//                SQL thay the
//                SELECT MaThuoc, SUM(chitietphieukham.SoLuong),COUNT(chitietphieukham.MaThuoc) FROM phieukham,chitietphieukham
//	               WHERE phieukham.NgayKham LIKE '2018-05%'
//                  AND phieukham.MaPKB = chitietphieukham.MaPKB
//                  GROUP BY chitietphieukham.MaThuoc
                foreach ($PKB as $detail1) {
                    $CTPKB = ChiTietPKB::where('MaThuoc', $detail->MaThuoc)->where('MaPKB', $detail1->MaPKB)->first();
                    if (isset($CTPKB)) {
                        $SoLuongDung += $CTPKB->SoLuong;
                        $SoLanDung++;
                    }
                }
                $CTBCSDT = new ChiTietBCSDT();
                $CTBCSDT->MaBCSDT = $BCSDT->MaBCSDT;
                $CTBCSDT->MaThuoc = $detail->MaThuoc;
                $CTBCSDT->SoLuongDung = $SoLuongDung;
                $CTBCSDT->SoLanDung = $SoLanDung;
                $CTBCSDT->save();
            }
        } else //bao cao Thang da duoc tao
        {
            //thong ke lai
            $BCSDT = BaoCaoSuDungThuoc::where('ThangNam', $Thang)->first();
//
            $PKB = PhieuKhamBenh::where('NgayKham', 'like', $Thang2 . '%')->get();
//
            $dsThuoc = Thuoc::all();
            foreach ($dsThuoc as $detail) {
                $SoLuongDung = 0;
                $SoLanDung = 0;

//                SQL thay the
//                SELECT MaThuoc, SUM(chitietphieukham.SoLuong),COUNT(chitietphieukham.MaThuoc) FROM phieukham,chitietphieukham
//	               WHERE phieukham.NgayKham LIKE '2018-05%'
//                  AND phieukham.MaPKB = chitietphieukham.MaPKB
//                  GROUP BY chitietphieukham.MaThuoc
                foreach ($PKB as $detail1) {
                    $CTPKB = ChiTietPKB::where('MaThuoc', $detail->MaThuoc)->where('MaPKB', $detail1->MaPKB)->first();
                    if (isset($CTPKB)) {
                        $SoLuongDung += $CTPKB->SoLuong;
                        $SoLanDung++;
                    }
                }
                $CTBCSDT = ChiTietBCSDT::where('MaThuoc', $detail->MaThuoc)->where('MaBCSDT', $BCSDT->MaBCSDT)->first();
                if (isset($CTBCSDT)) {
                    $CTBCSDT->SoLuongDung = $SoLuongDung;
                    $CTBCSDT->SoLanDung = $SoLanDung;
                    $CTBCSDT->save();
                } else {
                    $CTBCSDT = new ChiTietBCSDT();
                    $CTBCSDT->MaBCSDT = $BCSDT->MaBCSDT;
                    $CTBCSDT->MaThuoc = $detail->MaThuoc;
                    $CTBCSDT->SoLuongDung = $SoLuongDung;
                    $CTBCSDT->SoLanDung = $SoLanDung;
                    $CTBCSDT->save();
                }
            }
        }
    }

    protected function SoSanhThang($Month, $Year)
    {
        if ($Year > date('Y'))
            return false;
        elseif ($Year == date('Y')) {
            if ($Month > date('m'))
                return false;
            else return true;
        } else return true;
    }

    public function getDSBaoCaoSDT()
    {
        $Month = date('m');
        $Year = date('Y');
        $MonthYear = date('m/Y');
        $this->ThongKeThuoc($Month, $Year);
        $BCSDT = BaoCaoSuDungThuoc::where('ThangNam', $MonthYear)->first();
        $CTBCSDT = ChiTietBCSDT::where('MaBCSDT', $BCSDT->MaBCSDT)->get();
        return view('index.baocaosdt.danhsach', compact('CTBCSDT'));
    }

    public function getAjaxBaoCaoSDT(Request $request)
    {
        if ($request->ajax()) {
            $Key = $request->key;
            $Key = explode('-', $Key);
            $Month = $Key[1];
            $Year = $Key[0];
            $MonthYear = $Month . "/" . $Year;
            //chon thang lon hon thang hien tai
            if ($this->SoSanhThang($Month, $Year) == false) {
                echo "<tr>";
                echo "<td colspan='5'>Không có dữ liệu</td>";
                echo "</tr>";
            } else {
                $this->ThongKeThuoc($Month, $Year);
                $BCSDT = BaoCaoSuDungThuoc::where('ThangNam', $MonthYear)->first();
                if (isset($BCSDT)) {
                    $CTBCSDT = ChiTietBCSDT::where('MaBCSDT', $BCSDT->MaBCSDT)->get();
                    $i = 0;
                    foreach ($CTBCSDT as $detail) {
                        echo "<tr>";
                        echo "<td>" . ++$i . "</td>";
                        echo "<td>" . $detail->thuoc->TenThuoc . "</td>";
                        echo "<td>" . $detail->thuoc->donvi->TenDonVi . "</td>";
                        echo "<td>" . number_format($detail->SoLuongDung, 0, ',', '.') . "</td>";
                        echo "<td>" . number_format($detail->SoLanDung, 0, ',', '.') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='5'>Không có dữ liệu</td>";
                    echo "</tr>";
                }
            }
        }
    }

    public function getCronjobBaoCaoSDT()
    {
        $Month = date('m');
        $Year = date('Y');
        $json = array();
        $this->ThongKeThuoc($Month, $Year);
//        if ($this->ThongKeThuoc($t, $n))
//        {
            $json['status'] = "success";
            return json_encode($json);
//        }
//        else {
//            $json['status'] = "error";
//            return json_encode($json);
//        }

    }
}
