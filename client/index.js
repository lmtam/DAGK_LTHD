//bien toan cuc
var strSoHanhKhach = 1;
var strGiaVe = 0;
var strTongTien = 0;

$('#dtpNgayDi').datetimepicker({
    format: 'YYYY-MM-DD',
    defaultDate: new Date()
});

$('#dtpNgayVe').datetimepicker({
    format: 'YYYY-MM-DD',
    defaultDate: new Date()
});

var data = [
    { "MaCB": "HN", "GioDi": "12:20", "GioDen": "14:20", "Gia": "1000000" },
    { "MaCB": "HN", "GioDi": "12:20", "GioDen": "14:20", "Gia": "1000000" },
    { "MaCB": "HN", "GioDi": "12:20", "GioDen": "14:20", "Gia": "1000000" },
    { "MaCB": "HN", "GioDi": "12:20", "GioDen": "14:20", "Gia": "1000000" },
];

$("table[id$=tblDanhSachChuyenBayDi]").bootstrapTable({
    classes: 'table table-hover',
    //data: data
});

$("table[id$=tblDanhSachChuyenBayVe]").bootstrapTable({
    classes: 'table table-hover',
    //data: data
});

function ShowTimKiem() {
    $('#divTimKiem').removeClass("hidden");
    $('#divDatCho').addClass("hidden");
    $('#divThongTinKH').addClass("hidden");
    $('#divHoanTat').addClass("hidden");
};

function ShowDatCho() {
    var strNguoiLon = $('#cboNguoiLon :selected').text();
    var strTreEm = $('#cboTreEm :selected').text();
    var strEmBe = $('#cboEmBe :selected').text();
    // var strNgayDi = $('#txtNgayDi').val().split("/");
    // var strNgayVe = $('#txtNgayVe').val().split("/");
    var strNgayDi = $('#txtNgayDi').val();
    var strNgayVe = $('#txtNgayVe').val();
    var strDiemdi = $('#cboDiemDi :selected').val();
    var strDiemden = $('#cboDiemDen :selected').val();
    var strHang    = $('#cboHangVe :selected').val();
    var soluongve;
    strSoHanhKhach = parseInt(strNguoiLon) + parseInt(strTreEm) + parseInt(strEmBe);
    if (strSoHanhKhach > 5) {
        sweetAlert("Chỉ đặt vé tối đa là 6 người", "", "error");
        return;
    }
    soluongve = strSoHanhKhach.toString();
    //if (parseInt(strNgayVe[2]) < parseInt(strNgayDi[2])
    //    || parseInt(strNgayVe[1]) < parseInt(strNgayDi[1])
    //    || parseInt(strNgayVe[0]) < parseInt(strNgayDi[0])) {
    //    sweetAlert("Ngày về phải nhỏ hơn ngày đi", "", "error");
    //    return;
    //}


    $('#divTimKiem').addClass("hidden");
    $('#divDatCho').removeClass("hidden");
    $('#divThongTinKH').addClass("hidden");
    $('#divHoanTat').addClass("hidden");
    $('#divColorDatCho').css("color", "red");
    $("table[id$=tblDanhSachChuyenBay]").bootstrapTable('load', data);

    $.ajax({
        type: "GET",
        url: '../server/flights/'+strDiemdi +'/'+strDiemden+'/'+strNgayDi+'/'+soluongve+'/'+strHang,
        dataType: 'json',
        data: '',
        success:function (respones) {

            $("table[id$=tblDanhSachChuyenBayDi]").bootstrapTable('load', respones);
        }
    });
};

//var strSelected_CB = 0
$('table[id$=tblDanhSachChuyenBayDi]').on('click-row.bs.table', function (row, $element, field) {
    $('#divChoNgoi').removeClass("hidden");
    $('#divTenChuyenBayDi').text($element["Machuyenbay"]);
    $('#divGiaBan').text($element["Giaban"]);
    strGiaVe = $element["Giaban"];
    //strSelected_CB = 1;
});

//$('table[id$=tblDanhSachChuyenBayVe]').on('click-row.bs.table', function (row, $element, field) {
//    $('#divChoNgoi').removeClass("hidden");
//    $('#divTenChuyenBayVe').text($element["MaCB"]);
//    strSelected_CB = 2;
//});

function ShowThongTinKH() {
    $('#divTimKiem').addClass("hidden");
    $('#divDatCho').addClass("hidden");
    $('#divThongTinKH').removeClass("hidden");
    $('#divHoanTat').addClass("hidden");
    $('#divColorTTKH').css("color", "red");

    if(strSoHanhKhach == 2)
    {
        $('#divThongtinHanhKhach2').removeClass('hidden');
        $('#divThongtinHanhKhach3').addClass('hidden');
        $('#divThongtinHanhKhach4').addClass('hidden');
        $('#divThongtinHanhKhach5').addClass('hidden');

    }
    else if(strSoHanhKhach == 3)
    {
        $('#divThongtinHanhKhach2').removeClass('hidden');
        $('#divThongtinHanhKhach3').removeClass('hidden');
        $('#divThongtinHanhKhach4').addClass('hidden');
        $('#divThongtinHanhKhach5').addClass('hidden');
    }else if(strSoHanhKhach == 4)
    {
        $('#divThongtinHanhKhach2').removeClass('hidden');
        $('#divThongtinHanhKhach3').removeClass('hidden');
        $('#divThongtinHanhKhach4').removeClass('hidden');
        $('#divThongtinHanhKhach5').addClass('hidden');
    }else if(strSoHanhKhach == 5)
    {
        $('#divThongtinHanhKhach2').removeClass('hidden');
        $('#divThongtinHanhKhach3').removeClass('hidden');
        $('#divThongtinHanhKhach4').removeClass('hidden');
        $('#divThongtinHanhKhach5').removeClass('hidden');
    }
    else{
        $('#divThongtinHanhKhach2').addClass('hidden');
        $('#divThongtinHanhKhach3').addClass('hidden');
        $('#divThongtinHanhKhach4').addClass('hidden');
        $('#divThongtinHanhKhach5').addClass('hidden');
    }

    // tinh tien ve
    strTongTien = parseInt(strSoHanhKhach) * parseInt(strGiaVe);
    $('#divTienVe').text(strTongTien);

    strSoHanhKhach = 1;
};

//luu xuong co so du lieu
function btnHoanTat() {
    $('#divTimKiem').addClass("hidden");
    $('#divDatCho').addClass("hidden");
    $('#divThongTinKH').addClass("hidden");
    $('#divHoanTat').removeClass("hidden");
    $('#divColorHoanTat').css("color", "red");
    // var strHoten = $('#txtHoTen').val();

    //var strTongTien =
    console.log(strTongTien);
    $.ajax({
        type: "POST",
        url: '../server/booking',
        data: {
            tongtien : strTongTien,
            danhxung : "MR",
            hoten   : "Le minh tam",
            sdt     : "01234567",
            email   :  "adagfafgasdfgasfg"
        },
        dataType: 'json',
        success:function (respones) {
            console.log(respones);
            //sweetAlert("Đặt vé thành công", "", "success");

        },
        error:function (){
            sweetAlert("Lỗi", "", "error");
        }
    });

};

$("input[name='rbChuyenBay']").click(function () {
    if ($("#rbKhuHoi").is(":checked")) {
        $('#divNgayVe').removeClass('hidden');
    }
    else {
        $('#divNgayVe').addClass('hidden');
    }
});

$(document).ready(function () {
    $('#cboDiemDi').append('<option value=""></option>');
    $.ajax({
        type: "GET",
        url: '../server/departureairports ',
        dataType: 'json',
        data: '',
        success:function (respones) {
            //var data = JSON.stringify(respones);
            for(var i=0; i<respones.length; i++){
                $('#cboDiemDi').append('<option value="' +respones[i].Noidi +'">'+ respones[i].tensanbay +'</option>');

            }

        }
    });
    //var strDiemDi = $('#cboDiemDi :selected').val();

});
$('#cboDiemDi').change(function () {
    $('#cboDiemDen').empty();
    var strDiemDi = $('#cboDiemDi :selected').val();
    if(strDiemDi == ''){return;}
    $.ajax({
        type: "GET",
        url: '../server/arrivalairports/'+strDiemDi,
        dataType: 'json',
        data: '',
        success:function (respones) {
            //var data = JSON.stringify(respones);
            for(var i=0; i<respones.length; i++){
                $('#cboDiemDen').append('<option value="' +respones[i].Noiden +'">'+ respones[i].tensanbay +'</option>');

            }

        }
    });
});







// ------------------------------------


//1
function DSSanbaydi() {
    $.ajax({
        type: "GET",
        url: '../server/departureairports ',
        dataType: 'json',
        data: '',
        success:function (respones) {

            return respones;
        }
    });
}
//2
function Sanbayden(noidi) {
    $.ajax({
        type: "GET",
        url: '../server/arrivalairport/'+noidi,
        dataType: 'json',
        data: '',
        success:function (respones) {

            return respones;
        }
    });
}

//3
//có thể truyền vào them tong tin
function Datchomoi(macb,ngaydat) {
    $.ajax({
        type: "POST",
        url: '../server/booking',
        dataType: 'json',
        data: {
            machuyenbay : macb,
            ngaydatcho : ngaydat,
        },
        success:function (respones) {

            return respones;
        }
    });
}
//4
function DSChangbay() {
    $.ajax({
        type: "GET",
        url: '../server/fightdetails',
        dataType: 'json',
        data: '',
        success:function (respones) {

            return respones;
        }
    });
}
//5
function ThemChangbay(madc,macb,hang,gia) {
    $.ajax({
        type: "POST",
        url: '../server/fightdetails',
        dataType: 'json',
        data: {
            madatcho : madc,
            machuyenbay : macb,
            hang : hang,
            mucgia : gia

        },
        success:function (respones) {

            return respones;
        }
    });
}
//6
function DSKhachhang() {
    $.ajax({
        type: "GET",
        url: '../server/passengers',
        dataType: 'json',
        data: '',
        success:function (respones) {

            return respones;
        }
    });
}
//7
function ThemKhachhang(madc, danhxung,ho, ten) {
    $.ajax({
        type: "POST",
        url: '../server/passengers',
        dataType: 'json',
        data: {
            madatcho : madc,
            danhxung : danhxung,
            ho : ho,
            ten : ten

        },
        success:function (respones) {

            return respones;
        }
    });
}
//8
function Timkiemchuyenbay(noidi,noiden,ngaydi,soluong) {
    $.ajax({
        type: "GET",
        url: '../server/fight/'+ noiden+'/'+ noidi + '/' + ngaydi + '/' +soluong,
        dataType: 'json',
        data: '',
        success:function (respones) {

            return respones;
        }
    });
}

