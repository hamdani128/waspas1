"use strict";
$(document).ready(function () {
    // card js start
    $(".card-header-right .close-card").on('click', function () {
        var $this = $(this);
        $this.parents('.card').animate({
            'opacity': '0',
            '-webkit-transform': 'scale3d(.3, .3, .3)',
            'transform': 'scale3d(.3, .3, .3)'
        });

        setTimeout(function () {
            $this.parents('.card').remove();
        }, 800);
    });
    $(".card-header-right .reload-card").on('click', function () {
        var $this = $(this);
        $this.parents('.card').addClass("card-load");
        $this.parents('.card').append('<div class="card-loader"><i class="fa fa-circle-o-notch rotate-refresh"></div>');
        setTimeout(function () {
            $this.parents('.card').children(".card-loader").remove();
            $this.parents('.card').removeClass("card-load");
        }, 3000);
    });
    $(".card-header-right .card-option .open-card-option").on('click', function () {
        var $this = $(this);
        if ($this.hasClass('fa-times')) {
            $this.parents('.card-option').animate({
                'width': '30px',
            });
            $(this).removeClass("fa-times").fadeIn('slow');
            $(this).addClass("fa-wrench").fadeIn('slow');
        } else {
            $this.parents('.card-option').animate({
                'width': '140px',
            });
            $(this).addClass("fa-times").fadeIn('slow');
            $(this).removeClass("fa-wrench").fadeIn('slow');
        }
    });
    $(".card-header-right .minimize-card").on('click', function () {
        var $this = $(this);
        var port = $($this.parents('.card'));
        var card = $(port).children('.card-block').slideToggle();
        $(this).toggleClass("fa-minus").fadeIn('slow');
        $(this).toggleClass("fa-plus").fadeIn('slow');
    });
    $(".card-header-right .full-card").on('click', function () {
        var $this = $(this);
        var port = $($this.parents('.card'));
        port.toggleClass("full-card");
        $(this).toggleClass("fa-window-restore");
    });
    $("#more-details").on('click', function () {
        $(".more-details").slideToggle(500);
    });
    $(".mobile-options").on('click', function () {
        $(".navbar-container .nav-right").slideToggle('slow');
    });
    $(".search-btn").on('click', function () {
        $(".main-search").addClass('open');
        $('.main-search .form-control').animate({
            'width': '200px',
        });
    });
    $(".search-close").on('click', function () {
        $('.main-search .form-control').animate({
            'width': '0',
        });
        setTimeout(function () {
            $(".main-search").removeClass('open');
        }, 300);
    });
    $(document).ready(function () {
        $(".header-notification").click(function () {
            $(this).find(".show-notification").slideToggle(500);
            $(this).toggleClass('active');
        });
    });
    $(document).on("click", function (event) {
        var $trigger = $(".header-notification");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".show-notification").slideUp(300);
            $(".header-notification").removeClass('active');
        }
    });

    // card js end
    $.mCustomScrollbar.defaults.axis = "yx";
    $("#styleSelector .style-cont").slimScroll({
        setTop: "1px",
        height: "calc(100vh - 320px)",
    });
    $(".main-menu").mCustomScrollbar({
        setTop: "1px",
        setHeight: "calc(100% - 56px)",
    });
    /*chatbar js start*/
    /*chat box scroll*/
    var a = $(window).height() - 80;
    $(".main-friend-list").slimScroll({
        height: a,
        allowPageScroll: false,
        wheelStep: 5,
        color: '#1b8bf9'
    });

    // search
    $("#search-friends").on("keyup", function () {
        var g = $(this).val().toLowerCase();
        $(".userlist-box .media-body .chat-header").each(function () {
            var s = $(this).text().toLowerCase();
            $(this).closest('.userlist-box')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
        });
    });

    // open chat box
    $('.displayChatbox').on('click', function () {
        var my_val = $('.pcoded').attr('vertical-placement');
        if (my_val === 'right') {
            var options = {
                direction: 'left'
            };
        } else {
            var options = {
                direction: 'right'
            };
        }
        $('.showChat').toggle('slide', options, 500);
    });

    //open friend chat
    $('.userlist-box').on('click', function () {
        var my_val = $('.pcoded').attr('vertical-placement');
        if (my_val == 'right') {
            var options = {
                direction: 'left'
            };
        } else {
            var options = {
                direction: 'right'
            };
        }
        $('.showChat_inner').toggle('slide', options, 500);
    });
    //back to main chatbar
    $('.back_chatBox').on('click', function () {
        var my_val = $('.pcoded').attr('vertical-placement');
        if (my_val == 'right') {
            var options = {
                direction: 'left'
            };
        } else {
            var options = {
                direction: 'right'
            };
        }
        $('.showChat_inner').toggle('slide', options, 500);
        $('.showChat').css('display', 'block');
    });
    $('.back_friendlist').on('click', function () {
        var my_val = $('.pcoded').attr('vertical-placement');
        if (my_val == 'right') {
            var options = {
                direction: 'left'
            };
        } else {
            var options = {
                direction: 'right'
            };
        }
        $('.p-chat-user').toggle('slide', options, 500);
        $('.showChat').css('display', 'block');
    });
    // /*chatbar js end*/

    $('[data-toggle="tooltip"]').tooltip();

    // wave effect js
    Waves.init();
    Waves.attach('.flat-buttons', ['waves-button']);
    Waves.attach('.float-buttons', ['waves-button', 'waves-float']);
    Waves.attach('.float-button-light', ['waves-button', 'waves-float', 'waves-light']);
    Waves.attach('.flat-buttons', ['waves-button', 'waves-float', 'waves-light', 'flat-buttons']);

    $('.form-control').on('blur', function () {
        if ($(this).val().length > 0) {
            $(this).addClass("fill");
        } else {
            $(this).removeClass("fill");
        }
    });
    $('.form-control').on('focus', function () {
        $(this).addClass("fill");
    });
});
$(document).ready(function () {
    $(".theme-loader").animate({
        opacity: "0"
    }, 1000);
    setTimeout(function () {
        $(".theme-loader").remove();
    }, 1000);

});

// toggle full screen
function toggleFullScreen() {
    var a = $(window).height() - 10;

    if (!document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement) { // current working methods
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

function insert_alternatif() {
    // var alternatif_id = document.getElementById('alternatif_id').value();
    var alternatif_id = $("#alternatif_id").val();
    var inisialisasi = $("#inisialisasi_id").val();
    var nama = $("#nama").val();
    var jk = $("#jk").val();
    var alamat = $("#alamat").val();
    var hp = $("#no_hp").val();
    var pendidikan = $("#pendidikan").val();

    if (alternatif_id == '') {
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Alternatif ID Tidak Boleh Kosong !',
        })
    } else if (inisialisasi == '') {
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Inisialisai ID Tidak Boleh Kosong !',
        })
    } else if (nama == '') {
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nama Kandidat Tidak Boleh Kosong !',
        })
    } else if (jk == "Pilih JK") {
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Jenis Kelamin Harus Dipilih Tidak Boleh Kosong !',
        })
    } else if (alamat == '') {
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Alamat Tidak Boleh Kosong !',
        })
    } else if (hp == '') {
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No Handphone Tidak Boleh Kosong !',
        })
    } else if (pendidikan == '') {
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pendidikan Tidak Boleh Kosong !',
        })
    } else {
        document.getElementById("alternatif_add").submit(function () {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
            });
        });
    }
}

function PesanSuccess(pesan) {
    swal.fire({
        title: 'Good Luck !',
        text: pesan,
        icon: 'success',
        showConfirmButton: false,
        timer: 10000
    })
}

const swal = $('.swal').data('swal');
if (swal) {
    Swal.fire({
        title: 'Good Luck !',
        text: swal,
        icon: 'success',
        showConfirmButton: false,
        timer: 10000
    })
}

function show_update(id) {
    $.ajax({
        url: "/alternatif/get/show",
        data: {
            id: id
        },
        type: 'GET',
        dataType: "json",
        success: function (data) {
            $('.modal-body #id_update').val(id);
            $('.modal-body #alternatif_id_update').val(data[0]);
            $('.modal-body #inisialisasi_id_update').val(data[1]);
            $('.modal-body #nama_update').val(data[2]);
            $('.modal-body #jk_update').val(data[3]);
            $('.modal-body #alamat_update').val(data[4]);
            $('.modal-body #no_hp_update').val(data[5]);
            $('.modal-body #pendidikan_update').val(data[6]);
        }

    });
}

function update_data() {
    document.getElementById("alternatif_update").submit();
}

function delete_alternatif(id, alterntif) {
    Swal.fire({
        title: 'Apakah Anda Yakin Data Akan Menghapus ' + alterntif + ' ?',
        text: "Data Yang Telah Terhapus Tidak Bisa Dikembalikan !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            const act = '/alternatif/delete/' + id;
            document.location.href = act;
        }
    })
}


// Paramater Penilaian
$("#kriteria1").change(function () {
    var bil;
    if ($("#kriteria1 option:selected").text() === "Sangat Baik") {
        bil = 90;
    } else if ($("#kriteria1 option:selected").text() === "Baik") {
        bil = 80;
    } else if ($("#kriteria1 option:selected").text() === "Cukup Baik") {
        bil = 70;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'kriteria Anda Ditolak',
            text: 'Harap Memilih Diantaranya : Sangat Baik, Baik, Cukup Baik ',
            showConfirmButton: false,
            timer: 2000
        })
        $("#nilai1").val() = '';
    }
    $("#nilai1").val(bil);
})



$("#kriteria2").change(function () {
    var bil;
    if ($("#kriteria2 option:selected").text() === "Sangat Baik") {
        bil = 90;
    } else if ($("#kriteria2 option:selected").text() === "Baik") {
        bil = 80;
    } else if ($("#kriteria2 option:selected").text() === "Cukup Baik") {
        bil = 70;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'kriteria Anda Ditolak',
            text: 'Harap Memilih Diantaranya : Sangat Baik, Baik, Cukup Baik ',
            showConfirmButton: false,
            timer: 2000
        })
        $("#nilai2").val() = '';
    }
    $("#nilai2").val(bil);
})

$("#kriteria3").keyup(function (event) {
    if (event.keyCode === 13) {
        var bil3 = $("#kriteria3").val();
        var nilai3;
        if (bil3 === '') {
            Swal.fire({
                icon: 'error',
                title: 'kriteria Anda Ditolak',
                text: 'Harap Memasukkan Nilai Range 1 - 100 ',
                showConfirmButton: false,
                timer: 2000,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok',
            })
            $("#nilai3").val('');
        } else {
            if (bil3 < 2650000) {
                nilai3 = 90;
            } else if (bil3 > 2650001 && bil3 < 4000000) {
                nilai3 = 80;
            } else if (bil3 >= 4000001) {
                nilai3 = 70;
            }
            $("#nilai3").val(nilai3)
        }
    }
});

$("#kriteria4").change(function () {
    var bil;
    if ($("#kriteria4 option:selected").text() === "Sangat Bagus") {
        bil = 90;
    } else if ($("#kriteria4 option:selected").text() === "Bagus") {
        bil = 80;
    } else if ($("#kriteria4 option:selected").text() === "Cukup Bagus") {
        bil = 70;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'kriteria Anda Ditolak',
            text: 'Harap Memilih Diantaranya : Sangat Baik, Baik, Cukup Baik ',
            showConfirmButton: false,
            timer: 2000
        })
        $("#nilai4").val() = '';
    }
    $("#nilai4").val(bil);
})


$("#kriteria5").change(function () {
    var bil;
    if ($("#kriteria5 option:selected").text() === "Sangat Bagus") {
        bil = 90;
    } else if ($("#kriteria5 option:selected").text() === "Bagus") {
        bil = 80;
    } else if ($("#kriteria5 option:selected").text() === "Cukup Bagus") {
        bil = 70;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'kriteria Anda Ditolak',
            text: 'Harap Memilih Diantaranya : Sangat Baik, Baik, Cukup Baik ',
            showConfirmButton: false,
            timer: 2000
        })
        $("#nilai5").val() = '';
    }
    $("#nilai5").val(bil);
})
// simpan data
function simpan_penilaian() {
    var alternatif_id = $("#alternatif_id").val();
    var kandidat = $("#nama").val();
    var Kriteria1 = $("#kriteria1").val();
    var nilai1 = $("#nilai1").val();
    var Kriteria2 = $("#kriteria2").val();
    var nilai2 = $("#nilai2").val();
    var Kriteria3 = $("#kriteria3").val();
    var nilai3 = $("#nilai3").val();
    var Kriteria4 = $("#kriteria4").val();
    var nilai4 = $("#nilai4").val();
    var Kriteria5 = $("#kriteria5").val();
    var nilai5 = $("#nilai5").val();


    if (alternatif_id === 'Pilih alternatif ID') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Alternatif ID Jangan Lupa Dipilih !',
        })
    } else if (kandidat === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nama Kandidat Tidak Boleh Kosong !',
        })
    } else if (Kriteria1 === 'Pilih Penilaian') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kriteria 1 jangan Lupa Pilih !',
        })
    } else if (Kriteria2 === 'Pilih Penilaian') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kriteria 2 jangan Lupa Pilih !',
        })
    } else if (Kriteria3 === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'jangan Lupa Input Penilaian Anda Lalu enter yaa .. !',
        })
    } else if (Kriteria4 === 'Pilih Penilaian') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kriteria 4 jangan Lupa Pilih !',
        })
    } else if (Kriteria5 === 'Pilih Penilaian') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kriteria 5 jangan Lupa Pilih !',
        })
    } else {
        document.getElementById("penilaian_add").submit(function () {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
            });
        });
    }

}


function show_update_penilaian(id) {
    $.ajax({
        url: "/penilaian/get/show",
        data: {
            id: id
        },
        type: 'GET',
        dataType: "json",
        success: function (data) {
            $('.modal-body #id_update').val(id);
            $('.modal-body #alternatif_id_update').val(data[0]);
            $('.modal-body #nama_update').val(data[1]);
            $('.modal-body #kriteria1_update').val(data[2]);
            $('.modal-body #nilai1_update').val(data[3]);
            $('.modal-body #kriteria2_update').val(data[4]);
            $('.modal-body #nilai2_update').val(data[5]);
            $('.modal-body #kriteria3_update').val(data[6]);
            $('.modal-body #nilai3_update').val(data[7]);
            $('.modal-body #kriteria4_update').val(data[8]);
            $('.modal-body #nilai4_update').val(data[9]);
            $('.modal-body #kriteria5_update').val(data[10]);
            $('.modal-body #nilai5_update').val(data[11]);
        }

    });
}


function show_update_kriteria(id) {
    $.ajax({
        url: "/kriteria/get/show",
        data: {
            id: id
        },
        type: 'GET',
        dataType: "json",
        success: function (data) {
            $('.modal-body #id_update').val(id);
            $('.modal-body #kode_update').val(data[0]);
            $('.modal-body #nama_update').val(data[1]);
            $('.modal-body #bobot_update').val(data[2]);
            $('.modal-body #jenis_update').val(data[3]);
            $('.modal-body #keterangan_update').val(data[4]);
        }

    });
}


// Update Penilaian
$("#kriteria1_update").change(function () {
    var bil;
    if ($("#kriteria1_update option:selected").text() === "Sangat Baik") {
        bil = 90;
    } else if ($("#kriteria1_update option:selected").text() === "Baik") {
        bil = 80;
    } else if ($("#kriteria1_update option:selected").text() === "Cukup Baik") {
        bil = 70;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'kriteria Anda Ditolak',
            text: 'Harap Memilih Diantaranya : Sangat Baik, Baik, Cukup Baik ',
            showConfirmButton: false,
            timer: 2000
        })
        $("#nilai1_update").val() = '';
    }
    $("#nilai1_update").val(bil);
})



$("#kriteria2_update").change(function () {
    var bil;
    if ($("#kriteria2_update option:selected").text() === "Sangat Baik") {
        bil = 90;
    } else if ($("#kriteria2_update option:selected").text() === "Baik") {
        bil = 80;
    } else if ($("#kriteria2_update option:selected").text() === "Cukup Baik") {
        bil = 70;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'kriteria Anda Ditolak',
            text: 'Harap Memilih Diantaranya : Sangat Baik, Baik, Cukup Baik ',
            showConfirmButton: false,
            timer: 2000
        })
        $("#nilai2_update").val() = '';
    }
    $("#nilai2_update").val(bil);
})

function myKriteria3_update() {
    /* tombol F11 */
    if (event.keyCode == 13) {
        event.preventDefault()
        var bil3 = $("#kriteria3_update").val();
        var nilai3;
        if (bil3 <= 70) {
            nilai3 = 70;
        } else if (bil3 >= 70 && bil3 <= 86) {
            nilai3 = 80;
        } else if (bil3 >= 85) {
            nilai3 = 90;
        } else {
            Swal.fire({
                icon: 'error',
                title: 'kriteria Anda Ditolak',
                text: 'Harap Memasukkan Nilai Range 1 - 100 ',
                showConfirmButton: false,
                timer: 2000
            })
            $("#nilai3_update").val() = '';
            $("#kriteria3_update").val() = '';
        }
        $("#nilai3_update").val(nilai3);
    }
}

$("#kriteria4_update").change(function () {
    var bil;
    if ($("#kriteria4_update option:selected").text() == "Sangat Bagus") {
        bil = 90;
    } else if ($("#kriteria4_update option:selected").text() == "Bagus") {
        bil = 80;
    } else if ($("#kriteria4_update option:selected").text() == "Cukup Bagus") {
        bil = 70;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'kriteria Anda Ditolak',
            text: 'Harap Memilih Diantaranya : Sangat Baik, Baik, Cukup Baik ',
            showConfirmButton: false,
            timer: 2000
        })
        $("#nilai4_update").val() = '';
    }
    $("#nilai4_update").val(bil);
})


$("#kriteria5_update").change(function () {
    var bil;
    if ($("#kriteria5_update option:selected").text() == "Sangat Bagus") {
        bil = 90;
    } else if ($("#kriteria5_update option:selected").text() == "Bagus") {
        bil = 80;
    } else if ($("#kriteria5_update option:selected").text() == "Cukup Bagus") {
        bil = 70;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'kriteria Anda Ditolak',
            text: 'Harap Memilih Diantaranya : Sangat Baik, Baik, Cukup Baik ',
            showConfirmButton: false,
            timer: 2000
        })
        $("#nilai5_update").val() = '';
    }
    $("#nilai5_update").val(bil);
})

function update_penilaian() {
    var alternatif_id = $("#alternatif_id_update").val();
    var kandidat = $("#nama_update").val();
    var Kriteria1 = $("#kriteria1_update").val();
    var nilai1 = $("#nilai1_update").val();
    var Kriteria2 = $("#kriteria2_update").val();
    var nilai2 = $("#nilai2_update").val();
    var Kriteria3 = $("#kriteria3_update").val();
    var nilai3 = $("#nilai3_update").val();
    var Kriteria4 = $("#kriteria4_update").val();
    var nilai4 = $("#nilai4_update").val();
    var Kriteria5 = $("#kriteria5_update").val();
    var nilai5 = $("#nilai5_update").val();


    if (alternatif_id == 'Pilih alternatif ID') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Alternatif ID Jangan Lupa Dipilih !',
        })
    } else if (kandidat == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nama Kandidat Tidak Boleh Kosong !',
        })
    } else if (Kriteria1 == 'Pilih Penilaian') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kriteria 1 jangan Lupa Pilih !',
        })
    } else if (Kriteria2 == 'Pilih Penilaian') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kriteria 2 jangan Lupa Pilih !',
        })
    } else if (Kriteria3 == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'jangan Lupa Input Penilaian Anda Lalu enter yaa .. !',
        })
    } else if (Kriteria4 == 'Pilih Penilaian') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kriteria 4 jangan Lupa Pilih !',
        })
    } else if (Kriteria5 == 'Pilih Penilaian') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kriteria 5 jangan Lupa Pilih !',
        })
    } else {
        document.getElementById("penilaian_update").submit(function () {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
            });
        });
    }
}


function delete_penilaian(id, alternatif_id) {
    Swal.fire({
        title: 'Apakah Anda Yakin Data Akan Menghapus ' + alternatif_id + ' ?',
        text: "Data Yang Telah Terhapus Tidak Bisa Dikembalikan !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            const act = '/penilaian/delete/' + id;
            document.location.href = act;
        }
    })
}

function Methode() {
    // Normalisasi
    $.ajax({
        url: "/metode/normalisasi",
        success: function (data) {
            $("#normalisasi").html(data);
        }
    });

    // Normalisasi Terbobot
    $.ajax({
        url: "/metode/normalisasi/terbobot",
        success: function (data) {
            $("#normalisasi-terbobot").html(data);
        }
    });

    // Ranking
    $.ajax({
        url: "/metode/normalisasi/ranking",
        success: function (data) {
            $("#rangking").html(data);
        }
    });

    $.ajax({
        url: "/metode/timing",
        dataType: "JSON",
        success: function (data) {
            // data = JSON.parse(data)
            document.getElementById("time_waktu").innerHTML = data + " Detik";
        }
    });

}

function Cetak_Laporan() {
    window.open("/metode/invoice");
}



// $("body").append('<div class="fixed-button active"><a href="https://codedthemes.com/item/flash-able-bootstrap-admin-template/" target="_blank" class="btn btn-md btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro</a> </div>');var $window=$(window),nav=$(".fixed-button");