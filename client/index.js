

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

