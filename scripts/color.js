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