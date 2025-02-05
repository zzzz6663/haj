import './bootstrap';

function stop_animation() {
    if ($('.modal-mask').length) {
        $('.modal-mask').remove()
    }
}
function load_animation() {
    var loading = new Loading({

        // 'ver' or 'hor'
        direction: 'ver',

        // loading title
        title: 'در حال پردازش اطلاعات',

        // text color
        titleColor: '#FFF',

        // font size
        titleFontSize: 14,

        // extra class(es)
        titleClassName: undefined,

        // font family
        titleFontFamily: undefined,

        // loading description
        discription: 'لطفا صبر گنید',

        // text color
        discriptionColor: '#FFF',

        // font size
        discriptionFontSize: 14,

        // extra class(es)
        discriptionClassName: undefined,

        // font family
        directionFontFamily: undefined,

        // width/height of loading indicator
        loadingWidth: 'auto',
        loadingHeight: 'auto',

        // padding in pixels
        loadingPadding: 20,

        // background color
        loadingBgColor: '#252525',

        // border radius in pixels
        loadingBorderRadius: 12,

        // loading position
        loadingPosition: 'fixed',

        // shows/hides background overlay
        mask: true,

        // background color
        maskBgColor: 'rgba(0, 0, 0, .6)',

        // extra class(es)
        maskClassName: undefined,

        // mask position
        maskPosition: 'fixed',

        // 'image': use a custom image

        // path to loading spinner
        animationSrc: undefined,

        // width/height of loading spinner
        animationWidth: 40,
        animationHeight: 40,
        animationOriginWidth: 4,
        animationOriginHeight: 4,

        // color
        animationOriginColor: '#FFF',

        // extra class(es)
        animationClassName: undefined,

        // auto display
        defaultApply: true,

        // animation options
        animationIn: 'animated fadeIn',
        animationOut: 'animated fadeOut',
        animationDuration: 1000,

        // z-index property
        zIndex: 0,

    });
}

window.onload = function () {
    //    let popunder = window.open("https://www.google.com/", "popupWindow", "width=600,height=600,scrollbars=yes,");



    if (window.jQuery) {



    stop_animation()
    $("form").submit(function (e) {
        load_animation()
    });

    $("a").click(function (e) {
        console.log(222)
        let el = $(this)
        let h = el.attr('href')

        console.log(el.hasClass("no_link"))

        if (h.search('#') == -1 && !el.hasClass("no_link")) {
            load_animation()

        }
    });











    $('.number_format').on("keyup change", function (e) {
        let el = $(this);
        let val = el.val();
        console.log(60)
        if (val > 0) {
            let num = String(val).replace(/(.)(?=(\d{3})+$)/g, '$1,')

            console.log(num)
            val = val.num2persian()
            $('.persian_number').text(val + " تومان")
            $('#amount_total').text(num + " تومان")
            $('.amount_total').text(num + " تومان")
            // if (el.closest('.col-12').find('.green_label').length) {
            //     console.log(80)
            //     console.log(num)
            //     el.closest('.col-12').find('.green_label').html(val + " تومان" + num)
            //     el.closest('.col-12').find('.yellow_label').html(num + " تومان" + num)
            // } else {
            //     console.log(70)
            //     console.log(num)
            //     el.closest('.col-12').append(`
            //     <p class="yellow_label badge badge-success">
            //     ${num}
            //     </p>
            //     <p class="green_label badge badge-success">  ${val} -     ${num}
            //     تومان</p>


            //     `)
            // }

        } else {
            $('.persian_number').text(0 + " تومان")
            $('#amount_total').text(0 + " تومان")
        }
    })





    let count = 0
    $(document).on('click', '#check_code', function (event) {

        let code = $('#code').val()
        if (count == 3) {
            Swal.fire({
                text: "تعداد سعی شما  بیشتر از حد مجاز هست!",
                showConfirmButton: false,
                timer: 1500,
                icon: "error",
            });
            setTimeout(() => {
                location.reload();
            }, 2000);
            return
        }

        if (!code) {
            Swal.fire({
                text: "لطفا کد   را به درستی وارد کنید!",
                showConfirmButton: false,
                timer: 1500,
                icon: "error",
            });
            return
        }

        load_animation()
        $.ajax('/check_code', {
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            },
            type: 'post',
            data: { code: code },
            datatype: 'json',
            success: function (data) {
                console.log(data)
                stop_animation()
                if (data.status == "ok") {
                    window.location.href = "/redirect"

                } else {
                    count++
                    Swal.fire({
                        text: "لطفا کد   را به درستی وارد کنید!",
                        showConfirmButton: false,
                        timer: 1500,
                        icon: "error",
                    });
                }



            },
            error: function (request, status, error) {
                console.log(request);
                stop_animation()
            }
        })
    });


    console.log(80808)

    $(document).on('click', '#send_code', function (event) {
        let mobile = $('#mobile').val()
        console.log(80808)
        var regex = new RegExp("^(\\+98|0)?9\\d{9}$");
        var result = regex.test(mobile);
        if (!result) {
            Swal.fire({
                text: "لطفا همراه خود را به درستی وارد کنید!",
                showConfirmButton: false,
                timer: 1500,
                icon: "error",
            });
            return
        }
        $('.mobile').text(mobile)
        load_animation()
        $.ajax('/mobile_login', {
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            },
            type: 'post',
            data: { mobile: mobile },
            datatype: 'json',
            success: function (data) {
                console.log(data);
                stop_animation()
                $('#first').slideUp(400)
                $('#second').slideDown(400)


            },
            error: function (request, status, error) {
                console.log(request);
                stop_animation()
            }
        })

    });





}





}


