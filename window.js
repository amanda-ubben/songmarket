// JavaScript Document

  function getWidth(){
    xWidth=null;
    if(window.screen != null)
      xWidth = window.screen.availWidth;

    if(window.innerWidth != null)
      xWidth = window.innerWidth;

    if(document.body != null)
      xWidth = document.body.clientWidth;

    return xWidth;
  }
function getHeight() {
  xHeight = null;
  if(window.screen != null)
    xHeight = window.screen.availHeight;

  if(window.innerHeight != null)
    xHeight =   window.innerHeight;

  if(document.body != null)
    xHeight = document.body.clientHeight;

  return xHeight;
}
function onLoad() {
	console.log(screen.height);           /*shows the height of the screen*/
	console.log(screen.width);            /*shows the width of the screen*/
	console.log(screen.availHeight);  /*shows height but removes the interface height like taskbar, and browser menu etc.*/
	console.log(screen.availWidth);   /*same as above,instead gives available width*/
	
}