setTimeout(function () {
  var text = document.querySelector('#main_dl dd');
  // var text2 = document.querySelectorAll('#main_dl dt p');

  var newDom = '';
  // var newDom2 = '';
  var animationDelay = 20;

  text.style.opacity = 1;

  for (let i = 0; i < text.innerText.length; i++) {
    newDom += '<span class="char">' + (text.innerText[i] == ' ' ? '&nbsp;' : text.innerText[i]) + '</span>';
  }

  text.innerHTML = newDom;
  // text2.innerHTML = newDom2;
  var lengther = text.children.length;
  // var lengther2 = text2.children.length;

  for (let i = 0; i < lengther; i++) {
    text.children[i].style['animation-delay'] = animationDelay * i + 'ms';
  }

  // for (let dt = 0; dt < lengther2; dt++) {
  //   text2.children[dt].style['animation-delay'] = animationDelay * dt + 'ms';
  // }

  // for (var f = 0; f < text2.length; f++) {
  //   var the_dt = text2[f];
  //   for (let dt = 0; dt < text2[f].innerText.length; dt++) {
  //     newDom2 += '<span class="char">' + (text2[f].innerText[dt] == ' ' ? '&nbsp;' : text2[f].innerText[dt]) + '</span>';
  //     alert(dt);
  //   }
  // }

},
  2500);