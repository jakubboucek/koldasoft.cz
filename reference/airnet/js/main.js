function addEvent(obj, event, funct) {  
  if (obj.attachEvent) { //IE  
    obj['e' + event + funct] = funct;  
    obj['x' + event + funct] = function() {  
      obj['e' + event + funct](window.event);  
    }  
    obj.attachEvent('on' + event, obj['x' + event + funct]);  
  } else // other browser  
    obj.addEventListener(event, funct, false);  
}   

function init_me() {
  acka = document.getElementsByTagName('a');
  for(i=0;i<acka.length;i++) {
    if(elementInClass(acka[i], 'newwin'))
      acka[i].onclick = clickme;
  }
}

function doLogin() {
	document.getElementById('hiddenlogin').value = document.getElementById('login').value;
	document.getElementById('hiddenpassword').value = hexMD5(mikrotik_chapid + document.getElementById('heslo').value + mikrotik_chapchallenge);
	document.getElementById('hiddenform').submit();
	return false;
}

function elementInClass(element, className) {
  if(!element.className)
    return false;
  var classes = element.className.split(' ');
  for(j=0;j<classes.length;j++) {
    if(classes[j] == className)
      return true;
  }
  return false;
}

function clickme(e) {
  if(!e) e = window.event; 
    
  if(document.all)
    po = e.srcElement;
  else
    po = e.target;
  
  return new_win_viz(po);
}
 
function new_win_viz(elem) {
  var win = window.open(elem.href, 'airnetwin', 'width=500,resizable,scrollbars=yes');
  return (typeof win == 'object' ? false : true);
}


addEvent(window, 'load', init_me);
