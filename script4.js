var btnNum = document.getElementById('number');
var btnOpt = document.getElementById('operator');

for (let i = 0; i < 10; i++) {
  let btn = document.createElement('button');
  btn.innerHTML = i;
  btn.className = 'btn btn-primary m-2';
  btn.onclick = function() {
    document.getElementById('hasil').value += i;
  }
  btnNum.appendChild(btn);
}

var opt = ['+', '-', '*', '/', '='];
for (let i = 0; i < opt.length; i++) {
  let btn = document.createElement('button');
  btn.innerHTML = opt[i];
  btn.className = 'btn btn-success m-2';
  if (i == 4) {
    btn.onclick = function () {
      let hasil = eval(document.getElementById('hasil').value);
      document.getElementById('hasil').value = hasil;
    }
  } else {
    btn.onclick = function () {
      document.getElementById('hasil').value += opt[i];
    }
  }
  btnNum.appendChild(btn);
}