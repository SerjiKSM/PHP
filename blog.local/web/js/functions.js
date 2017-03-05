const DELAY = 250;
const DELAY_SLIDE = 7000;


$(document).ready(function() {
    var items = $(".slider_item");
    var bullets = $("#bullets div");
    var courses = $("#courses .course");
    var online = $("#online .course");
    var minicourses = $("#minicourses .course");

    $(".fancybox").fancybox({
        minWidth: 900
    });

    var i = 0;
    var i_course = 0;
    var i_online = 0;
    var i_minic = 0;
    var block = false;

    if ($("#left").height() > $("#right").height()) {
        var height = $("#left").height() - 55;
        if ($("#pagination").length) height -= $("#pagination").height() + 30;
        $("#right").height(height);
    }
    else {
        var height = $("#right").height() - 10;
        $("#other").height(height);
    }

        var timer = setInterval(nextSlide, DELAY_SLIDE);

    VK.init({apiId: 3233942, onlyWidgets: true});
    if ($("*").is("#vk_comments")) VK.Widgets.Comments("vk_comments", {limit: 10, width: "496", attach: "graffiti,photo,link"});
    if ($("*").is("#vk_like")) VK.Widgets.Like("vk_like", {type: "button", verb: 1});

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }
    (document, 'script', 'facebook-jssdk'));

    $("#bullets div").on("click", function(event) {
        clearInterval(timer);
        old = i;
        i = $(event.target).prevAll("div").length;
        showSlide();
    });

    $("#courses .left img").on("click", function(event) {
        if (block) return;
        var old = i_course;
        i_course--;
        if (i_course < 0) i_course = courses.length - 1;
        showCourse(courses, i_course, old);
    });

    $("#courses .right img").on("click", function(event) {
        if (block) return;
        var old = i_course;
        i_course++;
        if (i_course == courses.length) i_course = 0;
        showCourse(courses, i_course, old);
    });

    $("#online .left img").on("click", function(event) {
        if (block) return;
        var old = i_online;
        i_online--;
        if (i_online < 0) i_online = online.length - 1;
        showCourse(online, i_online, old);
    });

    $("#online .right img").on("click", function(event) {
        if (block) return;
        var old = i_online;
        i_online++;
        if (i_online == online.length) i_online = 0;
        showCourse(online, i_online, old);
    });

    $("#minicourses .left img").on("click", function(event) {
        if (block) return;
        var old = i_minic;
        i_minic--;
        if (i_minic < 0) i_minic = minicourses.length - 1;
        showCourse(minicourses, i_minic, old);
    });

    $("#minicourses .right img").on("click", function(event) {
        if (block) return;
        var old = i_minic;
        i_minic++;
        if (i_minic == minicourses.length) i_minic = 0;
        showCourse(minicourses, i_minic, old);
    });

    $(".captcha").on("click", function(event) {
        var rand = Math.random();
        var img = $(event.target);
        img.attr("src", img.attr("src") + "?r=" + rand);
    });

    $(".tc").on("click", function(event) {
        var tc = $(event.target).html();
        var tc_array = tc.split(":");
        var tc = Number(tc_array[0]) * 60 + Number(tc_array[1]);
        var src = $(".youtube").attr("src");
        var regEx = /\&start=.*$/g;
        src = src.replace(regEx, "");
        src = src.replace("autoplay=1", "");
        src += "&autoplay=1&start=" + tc;
        $(".youtube").attr("src", src);
    });

    $("#close").on("click", function(event) {
        history.back();
    });

    $("#link_s").on("click", function(event) {
        closePopupElements();
        $("#popup_form_subscribe").show();
    });

    $("#link_c").on("click", function(event) {
        closePopupElements();
        $("#popup_form_code").show();
    });

    $("#link_cr").on("click", function(event) {
        closePopupElements();
        $("#popup_form_code_reset").show();
    });

    $(".link_back").on("click", function(event) {
        closePopupElements();
        $("#popup_main").show();
    });

    $("#slider").on("mouseleave", function(event) {
        clearInterval(timer);
        timer = setInterval(nextSlide, DELAY_SLIDE);
    });

    function showCourse(courses, i, i_old) {
        block = true;
        $(courses.get(i_old)).fadeOut(DELAY, function() {
            block = false;
            $(courses.get(i)).fadeIn(DELAY);
        });
    }

    function showSlide() {
        if ($(bullets.get(i)).hasClass("active")) return;
        $(items.get(old)).fadeOut(DELAY, function() {
            $(items.get(i)).fadeIn(DELAY);
        });
        bullets.removeClass("active");
        $(bullets.get(i)).addClass("active");
    }

    function nextSlide() {
        old = i;
        i++;
        if (i == bullets.length) i = 0;
        showSlide();
    }

 });





function SR_IsListSelected(el) {
    for (var i = 0; i < el.length; i ++)
        if (el[i].selected || el[i].checked) return i;
    return -1;
}

function SR_trim(f) {
    return f.toString().replace(/^[ ]+/, '').replace(/[ ]+$/, '');
}

function SR_submit(f) {
    f["email"].value = SR_trim(f["email"].value);
    f["name"].value = SR_trim(f["name"].value);
    if (f["name"].value == "Ваше имя") {
        alert("Укажите Ваше имя");
        return false;
    }
    if ((SR_focus = f["email"]) && f["email"].value.replace(/^[ ]+/, '').replace(/[ ]+$/, '').length < 1 || (SR_focus = f["name"]) && f["name"].value.replace(/^[ ]+/, '').replace(/[ ]+$/, '').length < 1) {
        alert("Укажите значения всех полей!");
        SR_focus.focus();
        return false;
    }
    if (!f["email"].value.match(/^[A-Za-z0-9][A-Za-z0-9\._-]*[A-Za-z0-9_]*@([A-Za-z0-9]+([A-Za-z0-9-]*[A-Za-z0-9]+)*\.)+[A-Za-z]+$/)) {
        alert("Некорректный синтаксис email-адреса!");
        f["email"].focus();
        return false;
    }
    return true;
}

function checkFormAddSite(form) {
    var address = form.address.value;
    var description = form.description.value;
    var captcha = form.captcha.value;
    var bad = "";
    if (address.length == 0) bad += "Вы не указали адрес";
    else if (address.length > 255) bad +=  "\n" + "Адрес сайта слишком длинный";
    else if (address.match(/(ht|f)tp(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&%\$#_]*)?/) == null) bad += "\n" + "Адрес сайта некорректный";
    if (description.length == 0) bad += "\n" + "Вы не ввели описание";
    else if (description.length > 255) bad +=  "\n" + "Описание сайта слишком длинный";
    if (captcha.length == 0) bad += "\n" + "Вы не ввели проверочный код";
    if (bad == "") return true;
    alert(bad);
    return false;
}

function closePopupElements() {
    $("#popup_form_subscribe").hide();
    $("#popup_form_code").hide();
    $("#popup_form_code_reset").hide();
    $("#popup_main").hide();
}

function ajax(data, func_error, func_success) {
    $.ajax({
        url: "/api.php",
        type: "POST",
        data: (data),
        dataType: "text",
        error: func_error,
        success: function(result) {
            result = $.parseJSON(result);
            func_success(result);
        }
    });
}

function ajaxFormSubscribe(form) {
    if (SR_submit(form)) {
        $("#button_form_sr").hide();
        $("#form_sr_preloader").show();
        var name = encodeURIComponent(form.name.value);
        var email = encodeURIComponent(form.email.value);
        var delivery_id = encodeURIComponent(form.delivery_id.value);
        var utm_source = encodeURIComponent(form.utm_source.value);
        var utm_campaign = encodeURIComponent(form.utm_campaign.value);
        var utm_content = "";
        if (form.utm_content) utm_content = encodeURIComponent(form.utm_content.value);
        var func ="subscribe";
        var data = {name : name, email : email, delivery_id : delivery_id, utm_source : utm_source, utm_campaign : utm_campaign, utm_content : utm_content, func : func};
        ajax(data, function() {
            alert("Ошибка соединения");
        }, function (result) {
            if (result["e"] == false) {
                $("#form_sr_preloader").hide();
                $("#button_form_sr").show();
                if (result["r"] == 1) alert("Проверьте почтовый ящик (" + form.email.value + ") и подтвердите подписку на рассылку.");
                else if (result["r"] == "already_exists") alert("Вы уже подписаны, поэтому просто восстановите код!");
                else alert("Произошла ошибка при добавлении! Возможно, Вы уже подписаны на рассылку.");
            }
            else alert("Произошла неизвестная ошибка!");
        });
    }
    return false;
}

function ajaxFormCode(form) {
    $("#button_form_code").hide();
    $("#form_code_preloader").show();
    var code = encodeURIComponent(form.code.value);
    if (code.length == 0) {
        alert("Введите код");
        return false;
    }
    var func ="check_code";
    var data = {code : code, func : func};
    ajax(data, function() {
        alert("Ошибка соединения");
    }, function (result) {
        if (result["e"] == false) {
            $("#form_code_preloader").hide();
            $("#button_form_code").show();
            if (result["r"] == 1) {
                document.cookie = "popup=0";
                $("#parent_popup").hide();
            }
            else alert("Неверный код!");
        }
        else alert("Произошла неизвестная ошибка!");
    });
    return false;
}

function ajaxFormCodeReset(form) {
    $("#button_form_code_reset").hide();
    $("#form_code_reset_preloader").show();
    var email = encodeURIComponent(form.email.value);
    if (email.length == 0) {
        alert("Введите e-mail");
        return false;
    }
    var func ="code_reset";
    var data = {email : email, func : func};
    ajax(data, function() {
        alert("Ошибка соединения");
    }, function (result) {
        if (result["e"] == false) {
            $("#form_code_preloader").hide();
            $("#button_form_code").show();
            if (result["r"] == 1) alert("Код отправлен на указанный e-mail");
            else alert("E-mail не найден в базе!");
        }
        else alert("Произошла неизвестная ошибка!");
    });
    return false;
}