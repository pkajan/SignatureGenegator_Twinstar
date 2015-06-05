var max_stats = 4;
stats_checked_count = 0;

function CheckCheckedCheckboxes() {
    stats_checked_count = 0;
    /* first "stat" checkbox have number "8"!!!!! */
    for (i = 8; i <= document.querySelectorAll('input[type=checkbox]').length; i++) {
        if (document.getElementById(i).checked === true) {
            stats_checked_count++;
        }
    }
    return stats_checked_count;
}

function InputColorAndCheck(inp, stats) {
    if (typeof stats !== 'boolean') {
        stats = false;
    }
    else {
        if (stats === true) {
            (inp.checked) ? ++stats_checked_count : --stats_checked_count;
            if (CheckCheckedCheckboxes() > max_stats) {
                alert("Max count of selected stats has been reached. There is no more space for additional stats.");
                inp.checked = false;
                --stats_checked_count;
                return inp.checked;
            }
        }
    }


    var default_color = '';
    var selected_color = '#f00';
    style = document.getElementById('span' + inp.getAttribute('id')).style;
    style.color = (inp.checked) ? selected_color : default_color;
}


function SelectAll(e) {
    document.getElementById(e).focus(), document.getElementById(e).select();
}

/* recolor checkboxes after reload */
function Color() {
    var e = 1, t = 20, n = "span";
    for (e; t + 1 > e; e++) {
        var o = n + e;
        document.getElementById(o).style.color = document.getElementById(e).checked ? "red" : "white";
    }
}

/* changelog */
function showButton() {
    document.getElementById("spoiler_id").style.display = "", document.getElementById("spoiler_text").style.display = "", document.getElementById("show_id").style.display = "none";
}
function hideButton() {
    document.getElementById("spoiler_id").style.display = "none", document.getElementById("spoiler_text").style.display = "none", document.getElementById("show_id").style.display = "";
}

/* foxus name input */
window.onload = function () {
    document.getElementById("textove_pole").focus();
};



