var homepage = 'http://localhost/jobs/';
var divid = 'output';
var divida = 'output1';
var dividb = 'output2';
var dividc = 'output3';
var loadingmessage = 'Processing...';
var submitx = 'submit';
var donetext = 'Done Successfully';
var navbox = 'boxnave';

function AJAX(){

var xmlHttp;
try{
xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
return xmlHttp;
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
return xmlHttp;
}
catch (e){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
return xmlHttp;
}
catch (e){
alert("Your browser does not support AJAX!");
return false;
}
}
}

}

function formget(f, url) {

var poststr = getFormValues(f);
postData(url, poststr);

}


function formsearch(f, url) {

var poststr = getFormValues(f);
postData(url, poststr);

}


function postData(url, parameters){

var xmlHttp = AJAX();

xmlHttp.onreadystatechange =  function(){
if(xmlHttp.readyState > 0 && xmlHttp.readyState < 4){
document.getElementById(divid).innerHTML=loadingmessage;
//document.getElementById(divida).innerHTML=loadingmessage;
//document.getElementById(dividb).innerHTML=loadingmessage;
//document.getElementById(dividc).innerHTML=loadingmessage;
//document.getElementById(navbox).innerHTML=loadingmessage;

}
if (xmlHttp.readyState == 4) {
//alert (xmlHttp.responseText);
 //document.getElementById(submitx).disabled = true;
 document.getElementById(navbox).style.right='100px';
document.getElementById(navbox).style.backgroundColor='rgba(0,203,3,0.6)';
document.getElementById(navbox).innerHTML=xmlHttp.responseText;
document.getElementById(divid).innerHTML=xmlHttp.responseText;
//document.getElementById(divida).innerHTML=xmlHttp.responseText;
//document.getElementById(dividb).innerHTML=xmlHttp.responseText;
//document.getElementById(dividc).innerHTML=xmlHttp.responseText;
//document.getElementById(submitx).value=donetext;



$(function() {
  
 setTimeout(function() {
    $('#boxnave').fadeOut('slow');
}, 5000); // <-- time in milliseconds

});



}
}


xmlHttp.open("POST", url, true);
xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlHttp.setRequestHeader("Content-length", parameters.length);
xmlHttp.setRequestHeader("Connection", "close");
xmlHttp.send(parameters);
}

function getFormValues(fobj)

{
var str = "";
var valueArr = null;
var val = "";
var cmd = "";

for(var i = 0;i < fobj.elements.length;i++)

{
switch(fobj.elements[i].type)

{
case "text":

str += fobj.elements[i].name +
"=" + escape(fobj.elements[i].value) + "&";
break;

case "textarea":

str += fobj.elements[i].name +
"=" + escape(fobj.elements[i].value) + "&";
break;

case "select-one":

str += fobj.elements[i].name +
"=" + fobj.elements[i].options[fobj.elements[i].selectedIndex].value + "&";
break;

}
}

str = str.substr(0,(str.length - 1));
return str;

}






///////////









function showcity(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",homepage+"?options=city&q="+str,true);
xmlhttp.send();
}




function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",homepage+"jobs?user=exp&q"+str,true);
xmlhttp.send();
}


function delet(id){
document.getElementById(id).style.display='none';		
	}
	

	
function appendRow(tblid) {

    var tbl = document.getElementById(tblid), // table reference
        row = tbl.insertRow(tbl.rows.length),      // append table row
        i;
    // insert table cells to the new row
    for (i = 0; i < tbl.rows[0].cells.length; i++) {
        createCell(row.insertCell(i), i, 'tox');
		
    }
	
	
}



function createCell(cell, text, style) {

	

var etitle = document.getElementById('etitle').value;
var eorg = document.getElementById('eorg').value;
var eedate = document.getElementById('eedate').value;
var ssdate = document.getElementById('esdate').value;	 
	if(text==0){
	 var div = document.createElement('div'), // create DIV element
	        txt = document.createTextNode(etitle); // create text node	
    div.appendChild(txt);  
	}// append text node to the DIV
	else if(text==1){
		 var div = document.createElement('div'), // create DIV element
	        txt = document.createTextNode(eorg); // create text node	
    div.appendChild(txt);  
	}// append text node to the DIV
	 else if(text==2){
		 var div = document.createElement('div'), // create DIV element
	        txt = document.createTextNode(eedate); // create text node	
    div.appendChild(txt);  
	}// append text node to the DIV
	 else if(text==3){
		 var div = document.createElement('div'), // create DIV element
	        txt = document.createTextNode(ssdate); // create text node	
    div.appendChild(txt);  
	}// append text node to the DIV
	 else if(text==4){
		 var div = document.createElement('div'), // create DIV element
	        txt = document.createTextNode(''); // create text node	
    div.appendChild(txt);  
	}// append text node to the DIV
	

	
	
    div.setAttribute('class', style);        // set DIV class attribute
	 div.setAttribute('id', txt); 
    div.setAttribute('className', style);    // set DIV class attribute for IE (?!)
    cell.appendChild(div);                   // append DIV to the table cell

}
   
