function checkForm(form) {
    var elements = $(form).find("[data-type]");
    var bad = "";
    for(var i = 0; i < elements.length; i++) {
        bad += checkElement(elements.get(i));
    }
    if(bad = ""){
        var t_confirm = $(form).find(["data-tconfirm"]).attr("data-tconfirm");
        if(t_confirm) {
            return confirm(t_confirm);
        }
        return true;
    }
}