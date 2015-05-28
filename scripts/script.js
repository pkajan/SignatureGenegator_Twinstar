/* Select text in textfield */
function SelectAll(id) {
    document.getElementById(id).focus();
    document.getElementById(id).select();
}

/* automaticaly select textbox for writing nicknames */
window.onload = function () {
    document.getElementById("textove_pole").focus();
};

/* max 4 checkboxes */
var count = 0;
var MAX = 4;
function countCheckedBoxes(elem) {
    if (elem.checked) {
        if (count <= MAX) {
            count += 1;
            if (count > MAX) {
                count = MAX;
                elem.checked = false;
            }
        }
    } else {
        count = count - 1;
        if (count < 0)
            count = 0;
    }
}
/* changelog */
function showButton() {
    document.getElementById('spoiler_id').style.display = '';
    document.getElementById('spoiler_text').style.display = '';
    document.getElementById('show_id').style.display = 'none';
}

function hideButton() {
    document.getElementById('spoiler_id').style.display = 'none';
    document.getElementById('spoiler_text').style.display = 'none';
    document.getElementById('show_id').style.display = '';

}
/* checkbox color */
function Color() {
    var i = 1;
    var pocetPoloziek = 16;
    var span = 'span';
    for (i; i < pocetPoloziek + 1; i++) {
        var text = span + i;
        if (document.getElementById(i).checked) {
            document.getElementById(text).style.color = 'red';
        } else {
            document.getElementById(text).style.color = 'white';
        }
    }
}