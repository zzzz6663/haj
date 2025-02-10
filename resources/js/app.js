import { data } from "autoprefixer";
import "./bootstrap";
// import "../css/app.less";
import { driver } from "driver.js";
import "driver.js/dist/driver.css";
history.pushState({ page: 'initial' }, '', window.location.href);

   let warning="با توجه به آیین نامه ابلاغی بیمار با شرایط ذیل نمی‌تواند مورد تایید قرارگیرد،  در صورت اطمینان و قبول مسئولیت، نسبت به تایید اقدام می نمایم"


function note(message, type, duration) {
    Swal.fire({
        toast: true,
        position: "top",
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: duration,
        timerProgressBar: true,
    });
}
if (window.jQuery) {
    // jQuery is loaded
    stop_animation();
    if ($(".select2").length) {
        console.log(8080);
        $(".select2").select2();
    }
    $(".form_action").on("change", function (event) {
        $(this).closest("form").submit();
    });
    $("form").on("submit", function (event) {
        const $buttons = $(this).find(".btn"); // انتخاب تمام دکمه‌هایی با کلاس btn

        $buttons.each(function () {
            const $btn = $(this);
            $btn.prop("disabled", true); // غیرفعال کردن
            $btn.text("صبر کنید..."); // تغییر متن
        });
    });

    $(".cha").on("click", function (e) {
        let el = $(this);
        el.slideUp(400);
        el.closest(".px").find(".par_sel").slideDown(400);
    });

    $("#province").on("change", function (e) {


    });
    $(".save_form").on("click", function (e) {
        let el = $(this);
        let reset_reason = el.closest(".cha_s").find('[name="reset_reason"]').val();
        console.log(reset_reason)
        if (!reset_reason) {
            Swal.fire({
                toast: true,
                title: "دلیل تغغیر وضعیت را بنویسید   ",
            })
            return
        }
        let commission_status = el.closest(".cha_s").find('[name=status]').val();
        console.log(commission_status)

        if (!commission_status) {
            Swal.fire({
                toast: true,
                title: "وضعیت را انتخاب کنید    ",
            })
            return
        }
        Swal.fire({
            toast: true,
            title: "شما در حال تغییر وضعیت  کاربر هستید  ?",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                el.closest("form").submit()
            } else if (result.isDenied) {
            }
        });
    });
    $(".change_karevan").on("click", function (e) {
        let el = $(this);
        // let sel=el.closest(".par").find(".sel")
        let par = el.closest(".pare_k")
        let id = el.data("id");
        let ids = par.find(".select2").val();
        console.log(ids)
        console.log(ids)

        Swal.fire({
            toast: true,
            title: "شما در حال تغییر کاروان هستید  ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "تایید  ",
            denyButtonText: `اشتباه شد`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax("/admin/change_karevan/" + id, {
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                    data: { ids: ids },
                    type: "post",
                    success: function (data) {
                        console.log(data);
                        Swal.fire({
                            toast: true,
                            position: "top",
                            icon: "success",
                            title: "کاروان با موفقت اضافه شد       ",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    },
                    error: function (request, status, error) {
                        console.log(request);
                        stop_animation()
                        note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
                    },
                });
            } else if (result.isDenied) {
            }
            $(".par_sel").slideUp(500); 3
            $(".cha").slideDown(500);
        });
    });

    $("input[name='Ordinary']").on("change", function (e) {
        if ($(this).prop("checked") == true) {
            $(".diet_more").each(function (i, obj) {
                let el = $(this);
                el.prop("checked", false);

                el.prop("disabled", true);
                // el.prop('checked', true);
            });
        } else {
            $(".diet_more").each(function (i, obj) {
                let el = $(this);
                el.removeAttr("disabled");
                el.prop("disabled", false);
            });
        }
    });
    $("#province").on("change", function (e) {
        let el = $(this)
        let id = el.find(":selected").val();
        $("#karevan").empty(); // حذف تمام گزینه‌ها
        if (id) {
            $.ajax("/admin/get_karevan/" + id, {
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                method: "post",
                success: function (data) {
                    console.log(data.body)
                    $('#karevan').html(data.body)
                },
                error: function (request, status, error) {
                    console.log(request);
                    stop_animation()
                    note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
                },
            });
        }

    });
    $(".submit_form").on("click", function (e) {
        let el = $(this)
        Swal.fire({
            toast: true,
            title: "شما در حال حذف  پزشک هستید  ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "تایید  ",
            denyButtonText: `اشتباه شد`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                el.closest("form").submit()
            } else if (result.isDenied) {
            }

        });
    });
    $(".change_doctor").on("change", function (e) {
        let el = $(this);
        // let sel=el.closest(".par").find(".sel")
        let id = el.data("id");
        let ids = el.find(":selected").val();

        Swal.fire({
            toast: true,
            title: "شما در حال تغییر پزشک هستید  ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "تایید  ",
            denyButtonText: `اشتباه شد`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax("/admin/change_doctor/" + id, {
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                    data: { ids: ids },
                    type: "post",
                    success: function (data) {
                        console.log(data);
                        Swal.fire({
                            toast: true,
                            position: "top",
                            icon: "success",
                            title: "پزشک با موفقت اضافه شد       ",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                        setTimeout(() => {
                            location.reload();

                        }, 1000);
                    },
                    error: function (request, status, error) {
                        console.log(request);
                        stop_animation()
                        note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
                    },
                });
            } else if (result.isDenied) {
            }
            $(".par_sel").slideUp(500);
            $(".cha").slideDown(500);

        });
    });

    // $('#select_drug3').select2({
    //     ajax: {
    //         url: '/admin/get_drug', // مسیر API لاراول
    //         dataType: 'json',
    //         delay: 250, // تأخیر برای کاهش تعداد درخواست‌ها
    //         headers: {
    //             "X-CSRF-TOKEN": document.head.querySelector(
    //                 'meta[name="csrf-token"]'
    //             ).content,
    //         },
    //         data: function (params) {
    //             console.log(params)
    //             return {
    //                 q: params.term, // متن جستجو که کاربر وارد می‌کند
    //                 page: params.page || 1, // شماره صفحه
    //             };
    //         },
    //         processResults: function (data) {
    //             return {
    //                 results: data.items, // داده‌های برگشتی
    //                 pagination: {
    //                     more: data.pagination.more // آیا داده‌های بیشتری وجود دارد؟
    //                 }
    //             };
    //         },
    //         cache: true,
    //         error: function(xhr) {
    //             console.log(xhr)
    //         }
    //     },

    //     placeholder: 'نام دارو را جستجو کنید',
    //     minimumInputLength: 1, // حداقل 2 کاراکتر برای جستجو
    // });

    $("#select_passenger").select2({
        placeholder: "جستجو کنید...",
        ajax: {
            url: "/admin/get_passenger",
            dataType: "json",
            delay: 50,
            data: function (params) {
                return {
                    search: params.term, // مقدار جستجو
                    page: params.page || 1, // شماره صفحه
                };
            },
            processResults: function (data) {
                return {
                    results: data.data, // داده‌ها
                    pagination: {
                        more: data.more, // وجود صفحه بیشتر
                    },
                };
            },
            cache: true,
        },
        allowClear: true, // دکمه حذف مقدار فعال شود
        closeOnSelect: true,
        templateResult: function (data) {
            if (!data.id) {
                return data.text; // نمایش placeholder
            }

            // ساخت قالب سفارشی برای نمایش
            return $(
                `<div>
                    <span>${data.name}</span> -
                    <span>${data.family}</span> -
                    <span>${data.ssn}</span> -
                    <span>${data.karevanID}</span> -
                </div>`
            );
        },
        templateSelection: function (data) {
            return data.text || data.name; // انتخاب شده را نمایش دهید
        },
    });

    $("#select_passenger").on("select2:close", function (e) {
        let selected = $(this).val();
        if (!selected) {
            $(this).val(null).trigger("change"); // مقدار انتخاب نشده است
        }
    });
if( $("#select_passenger").length){
    console.log("سسسس شد!");
    document.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            console.log("کلید Enter زده شد!");
            $('#s_en').submit()
        }
    });

}
    $("#select_drug").select2({
        placeholder: "جستجو کنید...",
        ajax: {
            url: "/admin/get_drug",
            dataType: "json",
            delay: 50,
            data: function (params) {
                console.log(params)
                return {
                    search: params.term, // مقدار جستجو
                    page: params.page || 1, // شماره صفحه
                };
            },
            processResults: function (data) {
                console.log(data)

                return {
                    results: data.data, // داده‌ها
                    pagination: {
                        more: data.more, // وجود صفحه بیشتر
                    },
                };
            },
            cache: true,
        },
        allowClear: true, // دکمه حذف مقدار فعال شود
        closeOnSelect: true,
        templateResult: function (data) {
            console.log(data)

            if (!data.id) {
                return data.text; // نمایش placeholder
            }

            // ساخت قالب سفارشی برای نمایش
            return $(
                `<div>
                    <span>${data.name}</span> -
                    <span>${data.brand_fa}</span> -
                </div>`
            );
        },
        templateSelection: function (data) {
            console.log(data)

            return data.text || data.name; // انتخاب شده را نمایش دهید
        },
    });

    $(".select4").select2({
        tags: true, // فعال‌سازی قابلیت tagging
        tokenSeparators: [","], // جداکننده‌ها برای تگ‌های جدید
        placeholder: "طریقه مصرف را انتخاب یا وارد کنید ",
        allowClear: true, // امکان پاک کردن تگ‌ها
    });

    $("#select_drug").on("select2:close", function (e) {
        let selected = $(this).val();
        if (!selected) {
            $(this).val(null).trigger("change"); // مقدار انتخاب نشده است
        }
    });
    $(document).on("wheel", 'input[type="number"]', function (e) {
        e.preventDefault();
    });

    $("#examform").submit(function (event) {
        event.preventDefault(); // جلوگیری از ارسال فرم
        let id = $(this).data("id");
        $(".req").each(function (i, obj) {
            let el = $(this);
            if (!el.val()) {
                $("html, body").animate(
                    {
                        scrollTop: el.offset().top - 100,
                    },
                    1000
                );
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "error",
                    title: "لطفا همه مقادیر   را  پر کنید          ",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });
                setTimeout(() => {
                    flashInput(el);
                }, 1500);
                // return false;
            }
        });
        load_animation();

        let allFormData = new FormData();
        allFormData.append("_method", "post");

        $(".save_attr").each(function (i, obj) {
            let elem = $(this);
            let form_data = new FormData(elem.closest("form")[0]);
            form_data.forEach((value, key) => {
                allFormData.append(key, value);
            });
            $.ajax("/admin/save_attr/" + id, {
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                data: allFormData,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false,
                type: "post",
                success: function (data) {
                    console.log(data);
                },
                error: function (request, status, error) {
                    console.log(request);
                    stop_animation()
                    note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
                },
            });
        });

        stop_animation();
        // $("#examform").submit();
    });

    // function flashInput(inputElement) {
    //     var count = 0;

    //     var interval = setInterval(function () {
    //         if (count < 5) {
    //             $(inputElement).css(
    //                 "background-color",
    //                 count % 2 === 0 ? "red" : ""
    //             ); // چشمک زدن قرمز
    //             count++;
    //         } else {
    //             $(inputElement).css("background-color", "#e1e1e1"); // تغییر رنگ به خاکستری بعد از 3 چشمک
    //             clearInterval(interval); // متوقف کردن چشمک زدن
    //         }
    //     }, 500); // هر نیم ثانیه چشمک می‌زند
    // }

    // function flashInput(inputElement) {


    //  }


    $("body").on("click", ".save_attr", function (event) {
        let el = $(this);
        let id = el.data("id");
        let par = el.closest(".pari_s");
        let parent = el.closest("form");
        let go = true


        parent.find(".req").each(function (i, obj) {
            let elw = $(this);
            console.log(elw)
            // بررسی اینکه آیا ورودی از نوع رادیو است
            if (elw.is(':radio')) {
                let name = elw.attr('name'); // گرفتن name گروه رادیو
                console.log(name)
                if (!$(`input[name="${name}"]:checked`).length) {
                    $("html, body").animate(
                        {
                            scrollTop: elw.offset().top - 200,
                        },
                        1000
                    );
                    Swal.fire({
                        toast: true,
                        position: "top",
                        icon: "error",
                        title: "لطفا یکی از گزینه‌ها را انتخاب کنید",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    });
                    setTimeout(() => {
                        const parent = elw.closest('.custom-control-group');
                        if (parent.length) {
                            // افزودن کلاس برای افکت مرزی
                            parent.addClass('blink-border');

                            // حذف کلاس پس از 2 ثانیه
                            setTimeout(() => {
                                parent.removeClass('blink-border');
                            }, 2000);
                        }
                    }, 200);
                    go = false;
                    return false;
                }
            }
            // اگر از نوع رادیو نبود، بررسی مقدار خالی
            else if (!elw.val()) {
                $("html, body").animate(
                    {
                        scrollTop: elw.offset().top - 200,
                    },
                    1000
                );
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "error",
                    title: "لطفا همه مقادیر را پر کنید",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });
                setTimeout(() => {
                    flashInput(elw);
                }, 200);
                go = false;
                return false;
            }
        });
        if (!go) {
            return
        }
        load_animation();
        var form_data = new FormData(el.closest("form")[0]);
        form_data.append("_method", "post");
        $.ajax("/admin/save_attr/" + id, {
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            data: form_data,
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false,
            type: "post",
            success: function (data) {
                console.log(data);
                stop_animation();
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "success",
                    title: "اطلاعات ذخیره شد         ",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });
                setTimeout(() => {
                    if (par.length) {
                        const currentSection = el.closest(".pari_s");
                        const nextSection = currentSection.next(".pari_s");
                        // اگر سکشن بعدی وجود داشت، اسکرول کن

                        if (nextSection.length) {
                            $("html, body").animate(
                                {
                                    scrollTop: nextSection.offset().top,
                                },
                                800
                            ); // مدت زمان انیمیشن (800 میلی‌ثانیه)
                        }
                        console.log('والد مورد نظر یافت نشد.');



                    } else {
                        if (el.closest('#scr').length > 0) {
                            $("html, body").animate(
                                {
                                    scrollTop: $('#para_c_test').offset().top,
                                },
                                800
                            ); // مدت زمان انیمیشن (800 میلی‌ثانیه)
                            console.log('والد مورد نظر یافت شد.');
                        }
                    }
                }, 1000);
            },
            error: function (request, status, error) {
                console.log(request);
                stop_animation()
                note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
            },
        });
    });
    function flashInput(inputElement) {
        var count = 0;
        var interval = setInterval(function () {
            if (count < 3) {
                $(inputElement).css(
                    "background-color",
                    count % 2 === 0 ? "#faa17a" : ""
                ); // چشمک زدن قرمز
                count++;
            } else {
                $(inputElement).css("background-color", "#e1e1e1"); // تغییر رنگ به خاکستری بعد از 5 چشمک
                clearInterval(interval); // متوقف کردن چشمک زدن
            }
        }, 500); // هر نیم ثانیه چشمک می‌زند
    }



    $("body").on("click", ".sf", function (event) {
        Swal.fire({
            toast: true,
            position: "top",
            icon: "error",
            title: "در حال توسعه هستیم ",
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
        });
    });
    $("body").on("click", ".update_psssenger_status", function (event) {

        console.log(95)
        let class_name = "req"
        let element = $(this);
        let id = element.data("id");
        let status = $("#status").val();
        console.log(status)
        let go = true

        if (status == "under_review") {
            class_name = "req_blue"
        }
        console.log(class_name)
        console.log(status)
        $("." + class_name).each(function (i, obj) {
            let el = $(this);
            if (!el.val()) {
                $("html, body").animate(
                    {
                        scrollTop: el.offset().top - 100,
                    },
                    1000
                );
                setTimeout(() => {
                    flashInput(el);
                }, 1500);
                go = false
                return false;
            }
        });

        if (status != "under_review") {


            $('input[type="radio"]').each(function () {
                let el = $(this)
                var name = el.attr('name');

                if (name != "commission_reason" && $('input[name="' + name + '"]:checked').length === 0) {
                    // console.log('برای گروه ' + name + ' هیچ رادیویی انتخاب نشده است.');
                    $('input[name="' + name + '"]').first().get(0).scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    const parent = el.closest('.custom-control-group');
                    if (parent.length) {
                        // افزودن کلاس برای افکت مرزی
                        parent.addClass('blink-border');

                        // حذف کلاس پس از 2 ثانیه
                        setTimeout(() => {
                            parent.removeClass('blink-border');
                        }, 2000);
                    }

                    // متوقف کردن جریان و خروج از تابع
                    go = false;
                    return false; // خروج از حلقه پس از اولین رادیو که شرایط را دارد
                } else {
                    // console.log('برای گروه ' + name + ' یکی از رادیوها انتخاب شده است.');
                }
            });
        }


        if (!go) {
            // Swal.fire({
            //     toast: true,
            //     position: "top",
            //     icon: "error",
            //     title: "لطفا همه مقادیر   را  پر کنید          ",
            //     showConfirmButton: false,
            //     timer: 1000,
            //     timerProgressBar: true,
            // });
            return
        }

        let commission_reason = $(
            'input[name="commission_reason"]:checked'
        ).val();
        console.log(status);

        if (!commission_reason && status == "medical_commission") {
            note("لطفا نوع کمیسیون را انتخاب کنید ", "error");
            return;
        }
        if (status != "under_review" && !$('.exam_listes').length) {
            note("لطفا  نسبت ثبت تصویر ازمایش زائر اقدام نمایید ", "error");
            return
        }
        let ar = []
        $('#checl_boxy input[type="checkbox"]').each(function () {
            let checkbox = $(this);
            console.log(33)
            if (checkbox.is(':checked')) {
                let tet = checkbox.closest(".form-group").find(".cheky").text()
                if (!ar.includes(tet)) {
                    var tets = $.trim(tet);
                    ar.push(tets)

                }
                console.log('چک‌باکس با id=' + checkbox.attr('id') + ' انتخاب شد.');
            } else {
                // console.log('چک‌باکس با id=' + checkbox.attr('id') + ' لغو انتخاب شد.');
            }
        });
        ar = $.unique(ar);
        console.log(ar)
        console.log(ar.length)
        console.log(ar.length && !$(".remove_drug").length)

        if (!status) {
            note("لطفا وضعیت  را انتخاب کنید ", "error");
            return;
        }
        if (status == "medical_commission"){
            if(!$("#doctor_info").val()){
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "error",
                    title: "لطفا توضیحات لازم رو بنویسید          ",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });
            } ;
            return
        }
        if ((ar.length && !$(".remove_drug").length)) {
            let ills = ar.join("، ") + ".";
            let sen = `با توجه به ثبت بیماری  ${ills} توسط جنابعالی و عدم ثبت دارو خواهشمند است نسبت به ثبت داروی زائر اقدام نمایید`
            console.log(sen)
            Swal.fire({
                toast: true,
                title: sen,
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "  بیمار دارویی مصرف نمی نماید  ",
                denyButtonText: `   میخوام دارو اضافه کنم`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {


                } else if (result.isDenied) {
            return;

                }

            });
        }

        load_animation();
        var form_data = new FormData(element.closest("form")[0]);
        form_data.append("_method", "post");
        $.ajax("/admin/update_psssenger_status/" + id, {
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            data: form_data,
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false,

            type: "post",

            success: function (data) {
                console.log(data);
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "success",
                    title: "اطلاعات ذخیره شد         ",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });
            },
            error: function (request, status, error) {
                console.log(request);
                stop_animation()
                note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
            },
        });

        let allFormData = new FormData();
        $(".save_attr").each(function (i, obj) {
            let elem = $(this);
            let form_data = new FormData(elem.closest("form")[0]);
            form_data.forEach((value, key) => {
                allFormData.append(key, value);
            });
        });

        $.ajax("/admin/save_attr/" + id, {
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            data: allFormData,
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false,

            type: "post",
            success: function (data) {
                console.log(data)
                setTimeout(() => {
                    window.location.href = "/admin/passenger";
                }, 1000);
                stop_animation()
            },
            error: function (request, status, error) {
                console.log(request);
                stop_animation()
                note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
            },
        });



    });
    $("body").on("click", ".remove_drug", function (event) {
        let el = $(this);
        let drug = el.data("drug");
        let id = el.data("id");
        Swal.fire({
            toast: true,
            title: "شما درحال حذف این دارو میباشد ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "حذف  ",
            denyButtonText: `اشتباه شد`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax("/admin/remove_drug/" + id, {
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                    data: { drug: drug },
                    type: "post",
                    success: function (data) {
                        console.log(data);
                        $("#drug_list").html(data.body);
                    },
                    error: function (request, status, error) {
                        console.log(request);
                        stop_animation()
                        note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
                    },
                });
            } else if (result.isDenied) {
            }
        });
    });
    $("[name='status']").on("change", function (event) {
        let val = $(this).find(":selected").val();
        console.log(val);
        if (val == "medical_commission") {
            $("#reason_c").slideDown(400);
        } else {
            $("#reason_c").slideUp(400);
        }
    });
    $("input[name='EKG']").on("change", function (event) {
        let val = $(this).val();
        console.log(val);
        if ($(this).val() == "Abnormal") {
            $("#EKG_attach").slideDown(400);
        } else {
            $("#EKG_attach").slideUp(400);
        }
    });
    $("#DIALYSIS2").on("change", function (event) {
        let val = $(this).val();
        console.log(val);
        if ($(this).is(":checked")) {
            $(".more_dia").slideDown(400);
        } else {
            $(".more_dia").slideUp(400);
        }
    });
    if ($(".ragne").length) {
        $(".ragne").each(function (i, obj) {
            let el = $(this);
            // console.log(i);
            var min = parseInt(el.attr("min"));
            var max = parseInt(el.attr("max"));
            var datamin = parseInt(el.data("min"));
            var datamax = parseInt(el.data("max"));
            var value = parseInt(el.val());
            // console.log(value);
            // پاک کردن تایمر قبلی
            clearTimeout(el.data("timeoutId"));

            if (value) {
                var checkAndFixValue = () => {
                    el.css("background-color", "#fff"); //

                    if (value >= datamin && value <= datamax) {
                        el.css("background-color", "#cef0ce"); // مقدار داخل محدوده است -> سبز
                    } else {
                        el.css("background-color", "#f8e7db"); // مقدار خارج از محدوده است -> نارنجی
                    }
                };
                checkAndFixValue();
            }

            // چک کردن مقدار برای رویدادهای مختلف
        });
    }

    function generatePDF() {
        const element = document.getElementById("fom_p1");
        const options = {
            margin: 10, // حاشیه‌های PDF
            filename: "form.pdf", // نام فایل خروجی
            image: { type: "jpeg", quality: 0.98 }, // تنظیمات تصویر
            html2canvas: {
                scale: 2, // وضوح بالا
                useCORS: true, // رفع مشکل CORS برای تصاویر خارجی
                scrollY: 0, // بررسی کل صفحه بدون توجه به اسکرول
            },
            jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
        };
        // تنظیمات برای PDF با عرض 1200px

        html2pdf().set(options).from(element).save();
        stop_animation();
        $("#fom_p1").slideUp(400);
    }

    $("body").on("click", "#get_pdf2", function (e) {
        console.log(22);
        load_animation();
        $("#fom_p1").slideDown(400);
        setTimeout(() => {
            generatePDF();
        }, 500);
    });

    $(".bmi").on("input focusout", function (event) {
        let Height = parseFloat($("#Height").val());
        let Weight = parseFloat($("#Weight").val());
        if (Height && Weight) {
            Height = Math.pow(Height / 100, 2);
            let bmi = Weight / Height;
            bmi = Number(bmi.toPrecision(3)); // 3 رقم معنادار
            console.log(bmi);
            console.log(Height);

            if (event.type === "focusout") {
                if(Number(bmi)>40){
                    Swal.fire({
                        toast: false,
                        position: "top",
                        title:warning,


                        icon: "error",
                        showConfirmButton: true,
                        allowOutsideClick: false, // جلوگیری از بسته شدن با کلیک بیرون
                        allowEscapeKey: false, // جلوگیری از بسته شدن با کلیک بیرون
                        position: "center", // در مرکز صفحه نمایش داده شود
                        backdrop: true // پس‌زمینه را تاریک می‌کند

                    });
                }
                // کدهای موردنظر هنگام focusout
            }


            $("#BMI").val(bmi);
        }
    });


    $('[name="Opium_Test"]').on("change", function (event) {
        let el=$(this)
        console.log(el.val())
        if(el.val()=="positive"){
            Swal.fire({
                toast: false,
                position: "top",
                title:warning,
                icon: "error",
                showConfirmButton: true,
                allowOutsideClick: false, // جلوگیری از بسته شدن با کلیک بیرون
                allowEscapeKey: false, // جلوگیری از بسته شدن با کلیک بیرون
                position: "center", // در مرکز صفحه نمایش داده شود
                backdrop: true // پس‌زمینه را تاریک می‌کند

            });
        }
    });
    $(".mmse").on("input focusout", function (event) {
        var min = parseFloat($(this).attr("min"));
        var max = parseFloat($(this).attr("max"));
        var datamin = parseFloat($(this).data("min"));
        var datamax = parseFloat($(this).data("max"));
        var value = parseFloat($(this).val());

        // پاک کردن تایمر قبلی
        clearTimeout($(this).data("timeoutId"));

        // تعریف تابع برای بررسی مقدار
        var checkAndFixValue = () => {
            $(this).css("background-color", "#fff"); //
            if (value >= min && value <= max) {
                // اگر مقدار در بازه اول باشد

                $(this).css("background-color", "#f8e7db"); // مقدار خارج از محدوده است -> نارن
            } else if (value >= datamin && value <= datamax) {
                // اگر مقدار در بازه دوم باشد
                $(this).css("background-color", "#cef0ce");
            } else {

                // $(this).val("")
                Swal.fire({
                    toast: true,
                    position: "top",
                    title:
                        "مقدار وارد شده باید بین " +
                        min +
                        " و " +
                        datamax +
                        " باشد !",

                    icon: "error",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            }
            if(value>30 || value<23){
                Swal.fire({
                    toast: false,
                    position: "top",
                    title:warning,


                    icon: "error",
                    showConfirmButton: true,
                    allowOutsideClick: false, // جلوگیری از بسته شدن با کلیک بیرون
                    allowEscapeKey: false, // جلوگیری از بسته شدن با کلیک بیرون
                    position: "center", // در مرکز صفحه نمایش داده شود
                    backdrop: true // پس‌زمینه را تاریک می‌کند

                });
            }

        };

        // چک کردن مقدار برای رویدادهای مختلف
        if (event.type === "input") {
            // نمایش اخطار بعد از 1 ثانیه برای input
            var timeoutId = setTimeout(checkAndFixValue, 1500);
            $(this).data("timeoutId", timeoutId);
        } else if (event.type === "focusout") {
            // فوراً چک کردن مقدار در focusout
            checkAndFixValue();
        }
    });



    $(".ragne").on("input focusout", function (event) {
        var min = parseFloat($(this).attr("min"));
        var max = parseFloat($(this).attr("max"));
        var datamin = parseFloat($(this).data("min"));
        var datamax = parseFloat($(this).data("max"));
        var value = parseFloat($(this).val());
        var name = ($(this).attr("name"));

        // پاک کردن تایمر قبلی
        clearTimeout($(this).data("timeoutId"));

        // تعریف تابع برای بررسی مقدار
        var checkAndFixValue = () => {
            // بررسی مقدار و اصلاح آن
            // if (value < datamin) {
            //     $(this).val(datamin); // اگر کمتر از data-min باشد، مقدار به data-min تغییر می‌کند
            //     value = datamin;
            // } else if (value > datamax) {
            //     $(this).val(datamax); // اگر بیشتر از data-max باشد، مقدار به data-max تغییر می‌کند
            //     value = datamax;
            // }
            $(this).css("background-color", "#fff"); //
            if (value < min) {
                $(this).val("")
                // $(this).val(min);
                // value=min // اگر کمتر از min باشد، مقدار به min تغییر می‌کند
                Swal.fire({
                    toast: true,
                    position: "top",
                    title:
                        "مقدار وارد شده باید بین " +
                        min +
                        " و " +
                        max +
                        " باشد!",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                });
            } else if (value > max) {
                $(this).val("")
                // $(this).val(max); // اگر بیشتر از max باشد، مقدار به max تغییر می‌کند
                // value=max // اگر کمتر از min باشد، مقدار به min تغییر می‌کند
                Swal.fire({
                    position: "top",
                    toast: true,
                    title:
                        "مقدار وارد شده باید بین " +
                        min +
                        " و " +
                        max +
                        " باشد!",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                });
            }
            // نمایش اخطار

            // تنظیم رنگ پس‌زمینه بر اساس مقدار وارد شده
            if (value >= datamin && value <= datamax) {
                $(this).css("background-color", "#cef0ce"); // مقدار داخل محدوده است -> سبز
            } else {
                $(this).css("background-color", "#f8e7db"); // مقدار خارج از محدوده است -> نارنجی
            }
            console.log(value);
            console.log(datamin);
            console.log(datamax);
        };

        // چک کردن مقدار برای رویدادهای مختلف
        if (event.type === "input") {
            // نمایش اخطار بعد از 1 ثانیه برای input
            var timeoutId = setTimeout(checkAndFixValue, 1500);
            $(this).data("timeoutId", timeoutId);
        } else if (event.type === "focusout") {
            // فوراً چک کردن مقدار در focusout
            checkAndFixValue();
        }


        if(name=="HbA1C" && value>8.5){
            Swal.fire({
                toast: false,
                position: "top",
                title:warning,
                icon: "error",
                showConfirmButton: true,
                allowOutsideClick: false, // جلوگیری از بسته شدن با کلیک بیرون
                allowEscapeKey: false, // جلوگیری از بسته شدن با کلیک بیرون
                position: "center", // در مرکز صفحه نمایش داده شود
                backdrop: true // پس‌زمینه را تاریک می‌کند

            });
        }




    });

    if ($("#er").length) {
        $("html, body").animate(
            {
                scrollTop: $("#er").offset().top,
            },
            1000
        );
    }

    $("body").on("click", "#send_forget", function (event) {
        let mobile = $('#mobile').val()
        const iranianMobileRegex = /^(?:\+98|0098|98|0)?9\d{9}$/;
        console.log(mobile)
        // تست شماره موبایل
        const testMobile = (mobile) => iranianMobileRegex.test(mobile);
        if (!testMobile) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "همراه خود را به درستی وارد کنید ",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return
        }
        load_animation()
        $.ajax("/admin/forget_password", {
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            data: { mobile: mobile },
            type: "post",
            success: function (data) {
                stop_animation()
                if (data.status == "ok") {
                    Swal.fire({
                        toast: true,
                        title: "رمز عبور برای شما پیامک شد ",
                    })
                    setTimeout(() => {
                        window.location.href = "/admin/login";
                    }, 1500);

                } else {
                    Swal.fire({
                        toast: true,
                        position: "top",
                        icon: "error",
                        title: "کاربری با این مشخصات پیدا نشد ",
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    });
                    setTimeout(() => {
                        window.location.href = "/admin/login";
                    }, 1500);

                }

            },
            error: function (request, status, error) {
                console.log(request);
                stop_animation()
                note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
            },
        });
    });
    $("body").on("click", ".remove_testimage", function (event) {
        let el = $(this);
        let testimage = el.data("testimage");
        let user_id = el.data("user");
        Swal.fire({
            toast: true,
            title: "شما درحال حذف این عکس میباشد ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "حذف  ",
            denyButtonText: `اشتباه شد`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax("/admin/remove_testimage/" + testimage, {
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                    data: { user_id: user_id },
                    type: "post",
                    success: function (data) {
                        console.log(data);
                        $("#testimage_list").html(data.body);
                    },
                    error: function (request, status, error) {
                        console.log(request);
                        stop_animation()
                        note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
                    },
                });
            } else if (result.isDenied) {
            }
        });
    });

    $(".add_new_test_image").on("click", function (e) {
        let el = $(this);
        let id = el.data("id");
        var fileInput = $("#file_attach")[0]; // دریافت عنصر فایل
        var file = fileInput.files[0]; // دریافت فایل انتخاب‌شده

        if (!file) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "ابتدا فایل را انتخاب کنید",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        if (!file.type.startsWith("image/")) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "فرمت قابل قبول نمی باشد",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        var maxSizeInBytes = 5 * 1024 * 1024; // 5 مگابایت به بایت
        if (file.size > maxSizeInBytes) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "حجم فایل نباید بیشتر از 5 مگابایت باشد",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        // فشرده‌سازی تصویر با استفاده از canvas
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (event) {
            const img = new Image();
            img.src = event.target.result;

            img.onload = function () {
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");

                // تنظیم اندازه جدید تصویر (مثلاً نصف اندازه اصلی)
                const maxWidth = 800; // عرض مورد نظر
                const maxHeight = 800; // ارتفاع مورد نظر
                let width = img.width;
                let height = img.height;

                if (width > height) {
                    if (width > maxWidth) {
                        height *= maxWidth / width;
                        width = maxWidth;
                    }
                } else {
                    if (height > maxHeight) {
                        width *= maxHeight / height;
                        height = maxHeight;
                    }
                }
                canvas.width = width;
                canvas.height = height;

                // رسم تصویر در canvas
                ctx.drawImage(img, 0, 0, width, height);

                // تبدیل canvas به Blob
                canvas.toBlob(
                    function (blob) {
                        const form_data = new FormData();
                        form_data.append("_method", "post");
                        form_data.append("file", blob, file.name); // اضافه کردن نام فایل اصلی

                        $("#progressWrapper").show(); // نمایش نوار پیشرفت
                        $("#progressBar").val(0);

                        $.ajax({
                            url: `/admin/save_testimage/${id}`,
                            headers: {
                                "X-CSRF-TOKEN": document.head.querySelector(
                                    'meta[name="csrf-token"]'
                                ).content,
                            },
                            data: form_data,
                            contentType: false,
                            processData: false,
                            type: "post",
                            xhr: function () {
                                var xhr = new XMLHttpRequest();
                                xhr.upload.addEventListener(
                                    "progress",
                                    function (e) {
                                        if (e.lengthComputable) {
                                            var percent =
                                                (e.loaded / e.total) * 100;
                                            $("#progressBar").val(percent); // بروزرسانی نوار پیشرفت
                                            $("#progressPercent").text(
                                                Math.round(percent) + "%"
                                            ); // بروزرسانی درصد
                                        }
                                    }
                                );
                                return xhr;
                            },
                            success: function (data) {
                                console.log(data);
                                $("#progressWrapper").hide();
                                if (data.status === "ok") {
                                    $("#testimage_list").html(data.body);
                                    Swal.fire({
                                        toast: true,
                                        position: "top",
                                        icon: "success",
                                        title: "اطلاعات ذخیره شد",
                                        showConfirmButton: false,
                                        timer: 1000,
                                        timerProgressBar: true,
                                    });
                                } else {
                                    Swal.fire({
                                        toast: true,
                                        position: "top",
                                        icon: "error",
                                        title: "مشکلی پیش آمده، با پشتیبانی در ارتباط باشید",
                                        showConfirmButton: false,
                                        timer: 1000,
                                        timerProgressBar: true,
                                    });
                                }
                            },
                            error: function (request, status, error) {
                                console.error(request);
                                Swal.fire({
                                    toast: true,
                                    position: "top",
                                    icon: "error",
                                    title: "خطایی رخ داده است، لطفاً دوباره تلاش کنید",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            },
                        });
                    },
                    file.type, // فرمت تصویر
                    0.8 // کیفیت فشرده‌سازی (مقدار بین 0 تا 1)
                );
            };
        };
    });
    $(".add_new_test_image2").on("click", function (e) {
        let el = $(this);
        let id = el.data("id");
        var fileInput = $("#file_attach")[0]; // دریافت عنصر فایل
        var file = fileInput.files[0]; // دریافت فایل انتخاب‌شده

        if (!file) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "ابتدا فایل را انتخاب کنید",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        if (!file.type.startsWith("image/")) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "فرمت قابل قبول نمی باشد",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        var maxSizeInBytes = 5 * 1024 * 1024; // 5 مگابایت به بایت
        if (file.size > maxSizeInBytes) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "حجم فایل نباید بیشتر از 5 مگابایت باشد",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (event) {
            const img = new Image();
            img.src = event.target.result;

            img.onload = function () {
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");

                // تنظیم اندازه canvas برابر با ابعاد اصلی تصویر
                canvas.width = img.width;
                canvas.height = img.height;

                // رسم تصویر در canvas
                ctx.drawImage(img, 0, 0);

                // فشرده‌سازی بدون تغییر اندازه
                canvas.toBlob(
                    function (blob) {
                        const form_data = new FormData();
                        form_data.append("_method", "post");
                        form_data.append("file", blob, file.name); // اضافه کردن نام فایل اصلی

                        $("#progressWrapper").show(); // نمایش نوار پیشرفت
                        $("#progressBar").val(0);

                        $.ajax({
                            url: `/admin/save_testimage/${id}`,
                            headers: {
                                "X-CSRF-TOKEN": document.head.querySelector(
                                    'meta[name="csrf-token"]'
                                ).content,
                            },
                            data: form_data,
                            contentType: false,
                            processData: false,
                            type: "post",
                            xhr: function () {
                                var xhr = new XMLHttpRequest();
                                xhr.upload.addEventListener(
                                    "progress",
                                    function (e) {
                                        if (e.lengthComputable) {
                                            var percent =
                                                (e.loaded / e.total) * 100;
                                            $("#progressBar").val(percent); // بروزرسانی نوار پیشرفت
                                            $("#progressPercent").text(
                                                Math.round(percent) + "%"
                                            ); // بروزرسانی درصد
                                        }
                                    }
                                );
                                return xhr;
                            },
                            success: function (data) {
                                console.log(data);
                                $("#progressWrapper").hide();
                                if (data.status === "ok") {
                                    $("#testimage_list").html(data.body);
                                    Swal.fire({
                                        toast: true,
                                        position: "top",
                                        icon: "success",
                                        title: "اطلاعات ذخیره شد",
                                        showConfirmButton: false,
                                        timer: 1000,
                                        timerProgressBar: true,
                                    });
                                } else {
                                    Swal.fire({
                                        toast: true,
                                        position: "top",
                                        icon: "error",
                                        title: "مشکلی پیش آمده، با پشتیبانی در ارتباط باشید",
                                        showConfirmButton: false,
                                        timer: 1000,
                                        timerProgressBar: true,
                                    });
                                }
                            },
                            error: function (request, status, error) {
                                console.error(request);
                                Swal.fire({
                                    toast: true,
                                    position: "top",
                                    icon: "error",
                                    title: "خطایی رخ داده است، لطفاً دوباره تلاش کنید",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            },
                        });
                    },
                    file.type, // فرمت تصویر
                    0.7 // کیفیت فشرده‌سازی (بین 0 تا 1)
                );
            };
        };
    });
    $(".add_new_test_image").on("click", async function (e) {
        let el = $(this);
        let id = el.data("id");
        var fileInput = $("#file_attach")[0];
        var file = fileInput.files[0];

        if (!file) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "ابتدا فایل را انتخاب کنید",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        if (!file.type.startsWith("image/")) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "فرمت قابل قبول نمی باشد",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        var maxSizeInBytes = 5 * 1024 * 1024; // 5 مگابایت به بایت
        if (file.size > maxSizeInBytes) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "حجم فایل نباید بیشتر از 5 مگابایت باشد",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        }

        // فشرده‌سازی تصویر
        try {
            const options = {
                maxSizeMB: 1, // حداکثر حجم تصویر بعد از فشرده‌سازی (1 مگابایت)
                maxWidthOrHeight: 800, // حداکثر عرض یا ارتفاع تصویر
                useWebWorker: true, // استفاده از Web Worker برای پردازش سریع‌تر
            };
            const compressedFile = await imageCompression(file, options);
            console.log(compressedFile);
            $("#progressWrapper").show();
            $("#progressBar").val(0);

            var form_data = new FormData();
            form_data.append("_method", "post");
            form_data.append("file", compressedFile); // آپلود فایل فشرده‌شده

            $.ajax({
                url: `/admin/save_testimage/${id}`,
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                data: form_data,
                contentType: false,
                processData: false,
                type: "post",
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (e) {
                        if (e.lengthComputable) {
                            var percent = (e.loaded / e.total) * 100;
                            $("#progressBar").val(percent);
                            $("#progressPercent").text(
                                Math.round(percent) + "%"
                            );
                        }
                    });
                    return xhr;
                },
                success: function (data) {
                    console.log(data);
                    $("#progressWrapper").hide();
                    if (data.status === "ok") {
                        $("#testimage_list").html(data.body);
                        Swal.fire({
                            toast: true,
                            position: "top",
                            icon: "success",
                            title: "اطلاعات ذخیره شد",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                    } else {
                        Swal.fire({
                            toast: true,
                            position: "top",
                            icon: "error",
                            title: "مشکلی پیش آمده، با پشتیبانی در ارتباط باشید",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                    }
                },
                error: function (request, status, error) {
                    console.error(request);
                    Swal.fire({
                        toast: true,
                        position: "top",
                        icon: "error",
                        title: "خطایی رخ داده است، لطفاً دوباره تلاش کنید",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                },
            });
        } catch (error) {
            console.error(error);
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "خطایی در فشرده‌سازی تصویر رخ داده است",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        }
    });
    $(".count_ch").on("input", function () {
        const textLength = $(this).val().length;
        const text = $(this).val();
        const maxLength = 500;

        // اگر طول متن از حداکثر بیشتر شد، مقدار را کوتاه کن
        if (textLength > maxLength) {
            $(this).val(text.substring(0, maxLength));
        }

        // به‌روزرسانی شمارشگر
        $("#charCount").text(`${$(this).val().length} / ${maxLength}`);
    });
    $("#go_more").on("click", function (e) {
        $("#more_filter").toggle("slide");
    });

    $(".psssenger_commission_reslut").on("click", function (e) {
        let el = $(this);
        let id = el.data("id");
        let commission_status = $('input[name=commission_status]').is(":checked")
        console.log(commission_status)
        if (!commission_status) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "لطفا نتیجه کمیسیون را انتخاب نمایید          ",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }


        var fileInput = $("#file_result")[0]; // دریافت عنصر فایل
        var file = fileInput.files[0]; // دریافت فایل انتخاب‌شده
        if (!file) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "ابتدا فایل را انتخاب کنید         ",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        } else {
            if (!file.type.startsWith("image/") && file.type !== "application/pdf") {
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "error",
                    title: "فرمت قابل قبول نمی باشد          ",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                return;
            }

            var maxSizeInBytes = 5 * 1024 * 1024; // 5 مگابایت به بایت
            if (file.size > maxSizeInBytes) {
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "error",
                    title: "حجم فایل نباید بیشتر از 5 مگابایت باشد          ",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                return;
            }
            $("#progressWrapper2").show(); // نمایش نوار پیشرفت
            $("#progressBar2").val(0);
            var form_data = new FormData(el.closest("form")[0]);
            form_data.append("_method", "post");
            $.ajax("/admin/psssenger_commission_reslut/" + id, {
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                data: form_data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false,
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    // اضافه کردن رویداد progress برای پیگیری پیشرفت
                    xhr.upload.addEventListener("progress", function (e) {
                        if (e.lengthComputable) {
                            var percent = (e.loaded / e.total) * 100;
                            $("#progressBar2").val(percent); // بروزرسانی نوار پیشرفت
                            $("#progressPercent2").text(
                                Math.round(percent) + "%"
                            ); // بروزرسانی درصد
                        }
                    });
                    return xhr;
                },
                type: "post",
                success: function (data) {
                    console.log(data);
                    stop_animation();
                    if (data.status == "ok") {
                        Swal.fire({
                            toast: true,
                            position: "top",
                            icon: "success",
                            title: "اطلاعات ذخیره شد         ",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                        setTimeout(() => {
                            window.location.href = "/admin/passenger";
                        }, 2000);
                    } else {
                        Swal.fire({
                            toast: true,
                            position: "top",
                            icon: "error",
                            title: "مشکلی پیش آمده  با پشتیبانی در ارتباط باشید          ",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                    }
                    $("#progressWrapper2").hide(); //
                },
                error: function (request, status, error) {
                    console.log(request);
                    stop_animation()
                    note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
                },
            });
        }
    });




    $(".save_form_result").on("click", function (e) {
        let el = $(this);
        let id = el.data("id");

        let commission_status = $('input[name=commission_status]').is(":checked")

        var fileInput = $("#file_result")[0]; // دریافت عنصر فایل
        var file = fileInput.files[0]; // دریافت فایل انتخاب‌شده
        if (!file) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "ابتدا فایل را انتخاب کنید         ",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        } else {
            if (!file.type.startsWith("image/") && file.type !== "application/pdf") {
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "error",
                    title: "فرمت قابل قبول نمی باشد          ",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                return;
            }
            var maxSizeInBytes = 5 * 1024 * 1024; // 5 مگابایت به بایت
            if (file.size > maxSizeInBytes) {
                Swal.fire({
                    toast: true,
                    position: "top",
                    icon: "error",
                    title: "حجم فایل نباید بیشتر از 5 مگابایت باشد          ",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                return;
            }
            $("#progressWrapper2").show(); // نمایش نوار پیشرفت
            $("#progressBar2").val(0);
            var form_data = new FormData(el.closest("form")[0]);
            form_data.append("_method", "post");
            form_data.append("commission_status", commission_status);
            $.ajax("/admin/psssenger_commission_reslut/" + id, {
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                data: form_data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false,
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    // اضافه کردن رویداد progress برای پیگیری پیشرفت
                    xhr.upload.addEventListener("progress", function (e) {
                        if (e.lengthComputable) {
                            var percent = (e.loaded / e.total) * 100;
                            $("#progressBar2").val(percent); // بروزرسانی نوار پیشرفت
                            $("#progressPercent2").text(
                                Math.round(percent) + "%"
                            ); // بروزرسانی درصد
                        }
                    });
                    return xhr;
                },
                type: "post",
                success: function (data) {
                    console.log(data);
                    stop_animation();
                    if (data.status == "ok") {
                        Swal.fire({
                            toast: true,
                            position: "top",
                            icon: "success",
                            title: "اکنون نظر نهایی کمیسیون را انتخاب و در انتها دکمه ارسال نتیجه به پزشک را بزنید          ",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                        $('.psssenger_pa').slideDown(400)
                    } else {
                        Swal.fire({
                            toast: true,
                            position: "top",
                            icon: "error",
                            title: "مشکلی پیش آمده  با پشتیبانی در ارتباط باشید          ",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });
                    }
                    $("#progressWrapper2").hide(); //
                },
                error: function (request, status, error) {
                    console.log(request);
                    stop_animation()
                    note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
                },
            });
        }
    });



    $(".psssenger_commission_reslut").on("click", function (e) {
        let el = $(this);
        let id = el.data("id");
        let commission_status = $('input[name=commission_status]').is(":checked")
        console.log(commission_status)
        if (!commission_status) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "لطفا نتیجه کمیسیون را انتخاب نمایید          ",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }


        // var fileInput = $("#file_result")[0]; // دریافت عنصر فایل
        // var file = fileInput.files[0]; // دریافت فایل انتخاب‌شده
        // if (!file) {
        //     Swal.fire({
        //         toast: true,
        //         position: "top",
        //         icon: "error",
        //         title: "ابتدا فایل را انتخاب کنید         ",
        //         showConfirmButton: false,
        //         timer: 3000,
        //         timerProgressBar: true,
        //     });
        //     return;
        // } else {
        //     if (!file.type.startsWith("image/") && file.type !== "application/pdf") {
        //         Swal.fire({
        //             toast: true,
        //             position: "top",
        //             icon: "error",
        //             title: "فرمت قابل قبول نمی باشد          ",
        //             showConfirmButton: false,
        //             timer: 3000,
        //             timerProgressBar: true,
        //         });
        //         return;
        //     }

        //     var maxSizeInBytes = 5 * 1024 * 1024; // 5 مگابایت به بایت
        //     if (file.size > maxSizeInBytes) {
        //         Swal.fire({
        //             toast: true,
        //             position: "top",
        //             icon: "error",
        //             title: "حجم فایل نباید بیشتر از 5 مگابایت باشد          ",
        //             showConfirmButton: false,
        //             timer: 3000,
        //             timerProgressBar: true,
        //         });
        //         return;
        //     }
        // $("#progressWrapper2").show(); // نمایش نوار پیشرفت
        // $("#progressBar2").val(0);
        var form_data = new FormData(el.closest("form")[0]);
        form_data.append("_method", "post");
        $.ajax("/admin/psssenger_commission_reslut/" + id, {
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            data: form_data,
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false,
            xhr: function () {
                var xhr = new XMLHttpRequest();
                // اضافه کردن رویداد progress برای پیگیری پیشرفت
                xhr.upload.addEventListener("progress", function (e) {
                    if (e.lengthComputable) {
                        var percent = (e.loaded / e.total) * 100;
                        $("#progressBar2").val(percent); // بروزرسانی نوار پیشرفت
                        $("#progressPercent2").text(
                            Math.round(percent) + "%"
                        ); // بروزرسانی درصد
                    }
                });
                return xhr;
            },
            type: "post",
            success: function (data) {
                console.log(data);
                stop_animation();
                if (data.status == "ok") {
                    Swal.fire({
                        toast: true,
                        position: "top",
                        icon: "success",
                        title: "اطلاعات ذخیره شد         ",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    });
                    setTimeout(() => {
                        window.location.href = "/admin/passenger";
                    }, 2000);
                } else {
                    Swal.fire({
                        toast: true,
                        position: "top",
                        icon: "error",
                        title: "مشکلی پیش آمده  با پشتیبانی در ارتباط باشید          ",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    });
                }
                $("#progressWrapper2").hide(); //
            },
            error: function (request, status, error) {
                console.log(request);
                stop_animation()
                note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
            },
        });
        // }
    });

    $(".add_drug").on("click", function (e) {
        let el = $(this);
        let id = el.data("id");
        let dose = $("#dose").find(":selected").val();
        let drug = $("#select_drug").find(":selected").val();
        dose = dose.trim();
        drug = drug.trim();
        console.log(typeof drug);
        console.log(drug.length);
        console.log(dose);
        console.log(Number(drug.length) == 0);
        if (Number(drug.length) == 0) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "لطفا دارو را انتخاب کنید        ",
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
            });
            return;
        }
        if (!dose.length) {
            Swal.fire({
                toast: true,
                position: "top",
                icon: "error",
                title: "لطفا دز را انتخاب کنید        ",
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
            });
            return;
        }
        console.log(id);
        $.ajax("/admin/add_drug/" + id, {
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            data: { dose: dose, drug: drug },
            type: "post",
            success: function (data) {
                console.log(data);
                $("#drug_list").html(data.body);
            },
            error: function (request, status, error) {
                console.log(request);
                stop_animation()
                note("مشکلی پیش آمد. با پشتیبانی سایت در تماس باشید", "error")
            },
        });
    });
    // $('#select_drug2').select2({
    //     placeholder: 'جستجو کنید...',
    //     ajax: {
    //         url: '/admin/get_drug', // URL برای دریافت داده‌ها
    //         dataType: 'json',
    //         headers: {
    //             "X-CSRF-TOKEN": document.head.querySelector(
    //                 'meta[name="csrf-token"]'
    //             ).content,
    //         },
    //         method:"post",
    //         delay: 20, // تأخیر در ارسال درخواست
    //         // minimumInputLength:2,
    //         data: function (params) {
    //             console.log(params)
    //             return {
    //                 search: params.term // مقدار جستجو که کاربر وارد کرده است
    //             };
    //         },
    //         processResults: function (data) {
    //             console.log(data)
    //             // داده‌ها را به فرمت مورد قبول Select2 تبدیل کنید
    //             return {
    //                 results: data.map(item => ({
    //                     id: item.id, // مقدار اصلی (مثلاً ID)
    //                     text: item.name // مقدار قابل نمایش
    //                 }))
    //             };
    //         },
    //         cache: true,
    //         error: function(xhr) {
    //             console.log(xhr)
    //         }
    //     }
    // });

    console.log(12121);
    if ($(".select3").length) {
        $(".select3").select2({
            closeOnSelect: false, // جلوگیری از بسته شدن منو پس از انتخاب
        });
        //
    }
    if (typeof lightbox !== "undefined") {
        lightbox.option({
            resizeDuration: 200,
            wrapAround: true,
        });
    } else {
        console.log("Lightbox library is not loaded");
    }

    if (
        window.performance.navigation.type ==
        window.performance.navigation.TYPE_BACK_FORWARD
    ) {
        console.log("backkkkkkkkkk");
        stop_animation();
    }

    if ($(".modal-mask").length) {
        console.log(9090909);

        $(".modal-mask").remove();
    }
    window.addEventListener("popstate", function (event) {
        stop_animation();
    });

    stop_animation();
} else {
    console.log("Lssed");
}
function stop_animation() {
    if ($(".modal-mask").length) {
        $(".modal-mask").remove();
    }
}
function load_animation() {
    console.log(44);
    var loading = new Loading({
        // 'ver' or 'hor'
        direction: "ver",

        // loading title
        title: "در حال پردازش اطلاعات",

        // text color
        titleColor: "#FFF",

        // font size
        titleFontSize: 14,

        // extra class(es)
        titleClassName: undefined,

        // font family
        titleFontFamily: undefined,

        // loading description
        discription: "لطفا صبر کنید",

        // text color
        discriptionColor: "#FFF",

        // font size
        discriptionFontSize: 14,

        // extra class(es)
        discriptionClassName: undefined,

        // font family
        directionFontFamily: undefined,

        // width/height of loading indicator
        loadingWidth: "auto",
        loadingHeight: "auto",

        // padding in pixels
        loadingPadding: 20,

        // background color
        loadingBgColor: "#252525",

        // border radius in pixels
        loadingBorderRadius: 12,

        // loading position
        loadingPosition: "fixed",

        // shows/hides background overlay
        mask: true,

        // background color
        maskBgColor: "rgba(0, 0, 0, .6)",

        // extra class(es)
        maskClassName: undefined,

        // mask position
        maskPosition: "fixed",

        // 'image': use a custom image

        // path to loading spinner
        animationSrc: undefined,

        // width/height of loading spinner
        animationWidth: 40,
        animationHeight: 40,
        animationOriginWidth: 4,
        animationOriginHeight: 4,

        // color
        animationOriginColor: "#FFF",

        // extra class(es)
        animationClassName: undefined,

        // auto display
        defaultApply: true,

        // animation options
        animationIn: "animated fadeIn",
        animationOut: "animated fadeOut",
        animationDuration: 1000,

        // z-index property
        zIndex: 0,
    });
}
