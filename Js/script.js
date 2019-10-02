//Codice che gestisce i contatori
$(document).ready(function () {
    const EmptyDiv = document.getElementById('EmptyDiv');
    const eDiv = document.getElementById('eDiv');
    const input_bambino = document.querySelector('#numBambini');
    var countOver = false;

    //Funzionamento pulsante "-" per i campi con valore minimo 0
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 0 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    //Funzionamento pulsante "-" per i campi con valore minimo 1
    $('.meno').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    //Funzionamento pulsante "+" per i campi con valore massimo 5
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        var count = (parseInt($input.val()) + 1);
        count = count > 5 ? 5 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.piu').click(function () {
        var $input = $(this).parent().find('input');
        var count = (parseInt($input.val()) + 1);
        count = count > 5 ? 5 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.minusBambini').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 0 : count;
        $input.val(count);
        $input.change();
        $('#EmptyDiv').children().last().remove();
        if (count == 0) {
            EmptyDiv.className = "";
        }
        countOver = false;
        return false;
    });

    $('.plusBamibini').click(function () {
        var $input = $(this).parent().find('input');
        var count = (parseInt($input.val()) + 1);
        count = count > 5 ? 5 : count;
        $input.val(count);
        $input.change();
        EmptyDiv.classList.add("row", "d-flex", "flex-row", "input-spacing");
        if (count <= 5) {
            if (count == 5) {
                if (!countOver) {
                    addSelect(EmptyDiv, count, "form-select");
                    countOver = true;
                }
            } else {
                addSelect(EmptyDiv, count, "form-select");
            }

        }
        return false;
    });

    $('.minusB2').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 0 : count;
        $input.val(count);
        $input.change();
        $('#eDiv').children().last().remove();
        if (count == 0) {
        }
        countOver = false;
        document.getElementById("nBambini").value = count;
        return false;
    });

    $('.plusB2').click(function () {
        var $input = $(this).parent().find('input');
        var count = (parseInt($input.val()) + 1);
        count = count > 5 ? 5 : count;
        $input.val(count);
        $input.change();
        if (count <= 5) {
            if (count == 5) {
                if (!countOver) {
                    addS2(eDiv, count, "form-style");
                    countOver = true;
                } else {

                }
            } else {
                addS2(eDiv, count, "form-style");
            }

        }
        document.getElementById("nBambini").value = count;
        return false;
    });
    

    function addSelect(div, count, style) {
        var name = 'bambino' + count;
        var selectText = "Seleziona l'età del bambino " + count;
        var x = document.createElement("div");
        x.setAttribute("data-toggle", "tooltip-select");
        x.setAttribute("data-placement", "top");
        x.setAttribute("title", "");
        x.setAttribute("data-original-title", selectText);
        if(count<=3){
            x.classList.add("form-group", "col-auto");
        }else{
            x.classList.add("form-group", "col-auto");
        }
        var s = document.createElement("select");
        s.classList.add("form-control", style);
        s.setAttribute("name", name);
        for (var i = 0; i <= 15; i++) {
            var opt = document.createElement('option');
            opt.value = i;
            opt.innerHTML = i;
            s.appendChild(opt);
        }
        x.appendChild(s);
        div.appendChild(x);
        $('[data-toggle="tooltip-select"]').tooltip();
    }

    function addS2(div, count, style) {
        var name = 'bambino' + count;
        var testo = "Età Bambino "+ count;
        var x = document.createElement("div");
        x.classList.add("col-6", "col-md-2");
        x.style.color = "white";
        x.textContent = testo;
        var d = document.createElement("div");
        d.classList.add("form-group")
        var s = document.createElement("select");
        s.classList.add("form-control", style, "bAge");
        s.style.paddingLeft = "40%";
        s.setAttribute("name", name);
        for (var i = 0; i <= 15; i++) {
            var opt = document.createElement('option');
            opt.value = i;
            opt.innerHTML = i;
            s.appendChild(opt);
        }
        
        d.appendChild(s);
        x.appendChild(d);
        div.appendChild(x);
        $('[data-toggle="tooltip-select"]').tooltip();
    }
});