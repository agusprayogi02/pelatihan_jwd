function tambah() {
	var num1 = document.getElementById('num1').value;
	var num2 = document.getElementById('num2').value;
	var hasil = document.getElementById('hasil');
	hasil.value = Number(num1) + Number(num2);
}

function warna(color) {
	document.body.style.backgroundColor = color;
}