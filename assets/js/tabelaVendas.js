$(document).ready(function () {
    $(".containerTab").css("display", "none"); 
});

function openTab(tabName) {
    var i, x;
    x = document.getElementsByClassName("containerTab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
}

function buttonToggle(where, pval, nval) {
    var table = document.getElementById(where.attributes.rel.value);
    where.value = (where.value === pval) ? nval : pval;
    table.style.display = (table.style.display === 'block') ? 'none' : 'block';
}
