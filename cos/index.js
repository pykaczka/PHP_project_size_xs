var licznik=0;
var tekst="";

function sprawdz(){
	var text = "" ;
	var tmp="";
	with ( document.forms[0]) {
		if ( tyt.value == "" ) text += "Brak tytułu!<br>" ;
		if ( autn.value == "" ) text += "Brak nazwiska autora!<br>" ;
		if ( auti.value == "" ) text += "Brak imienia autora!<br>" ;
		if ( wyd.value == "" ) text += "Brak wydawnictwa!<br>" ;
		if ( rok.value == "" ) text += "Brak roku wydania!<br>" ;
		if ( isNaN(rok.value) ) text += "Niedozwolone znaki w roku!<br>" ;
		if ( text != "" ) {
			document.getElementById('stan').innerHTML = text ; 
			return ;
		}
		tmp +='{';
		tmp +='"tyt":"'+tyt.value.toString()+'",';
		tmp +='"autn":"'+autn.value.toString()+'",';
		tmp +='"auti":"'+auti.value.toString()+'",';
		tmp +='"wyd":"'+wyd.value.toString()+'",';
		tmp +='"rok":"'+rok.value.toString()+'"';
		tmp +='}';
		encodeURIComponent(tmp);
		zapisz(tmp);
	}
}

function zapisz(wartosc) {
	if(tekst !=""){
		tekst+=",";	
	}
	tekst+=wartosc;
	licznik++;
	localStorage.setItem('off_data', tekst);
	document.getElementById('stan').innerHTML = "zapisano";
}

function podglad() {
	var tmp='{"tab":[';
	sem=0;
	if (localStorage.getItem('off_data')!="") { 
		var ciastka=localStorage.getItem('off_data');
		tmp+=decodeURIComponent(ciastka);
		tmp+="]}";
		wyswietl(tmp);
	}
}

function wyswietl(text){
	var objJSON = JSON.parse(text);
	var txt = "<select>";
	for (i = 0; i<objJSON.tab.length;i++) {
		txt +=  "<option value='"+i+"'>" ;
		txt += "tytuł:"+objJSON.tab[i].tyt+"|";
		txt += "nazwisko:"+objJSON.tab[i].autn+"|";
		txt += "imię:"+objJSON.tab[i].auti+"|";
		txt += "wydawnictwo:"+objJSON.tab[i].wyd+"|";
		txt += "rok wydania:"+objJSON.tab[i].rok+"|";
		txt +="<br></option>";	
	}
	txt += "</select>";
	document.getElementById('stan').innerHTML = txt;
}

function czysc(){
	localStorage.removeItem('off_data');
	tekst="";
	zapisz(tekst);
	licznik=0;
	document.getElementById('stan').innerHTML = "wyczyszczono";
}

//Funkcje wywolywane po zalogowaniu sie do bazy
function fn_save() {
	var tyt = document.getElementById("tyt").value ;
	var autn = document.getElementById("autn").value ;
	var auti = document.getElementById("auti").value ;
	var wyd  = document.getElementById("wyd").value ;
	var rok  = document.getElementById("rok").value ;
	var json_data = "{\"tyt\":\"" + tyt + "\",\"autn\":\"" + autn + "\",\"auti\":\"" + auti + "\",\"wyd\":\"" + wyd + "\",\"rok\":\"" + rok + "\"}" ;
	var msg = "data=" + encodeURIComponent(json_data) ;
	var url = "saver.php" ;
	resp = function(response) {
		alert ( response ) ; 
	}
	xmlhttpPost (url, msg, resp) ;                          
}


function fn_save_loc() {
	var msg = "data=" + localStorage.getItem('off_data') ;
	var url = "saver_o.php" ;
	resp = function(response) {
		alert ( response ) ; 
	}
	xmlhttpPost (url, msg, resp) ;                          
}


function fn_show(){
	var msg = "data=" +localStorage.getItem('off_data') ;
	var url = "shower.php" ;
	resp = function(response) {
		document.getElementById('stan').innerHTML = response;
	}
	xmlhttpPost (url, msg, resp) ;                          
}
   
//Normalna funkcja xmlhttpPost, stosowana do AJAXa.
function xmlhttpPost(strURL, mess, respFunc) {
	var xmlHttpReq = false;
	var self = this;

	// Mozilla/Safari
	if (window.XMLHttpRequest) {
		self.xmlHttpReq = new XMLHttpRequest();
	}

	// IE
	else if (window.ActiveXObject) {
		self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	self.xmlHttpReq.onreadystatechange = function() {
		if(self.xmlHttpReq.readyState == 4){
			if ( self.xmlHttpReq.status == 200 ) {    
				respFunc( self.xmlHttpReq.responseText ) ;
			}
			else if ( self.xmlHttpReq.status == 401 ) {
				window.location.reload() ;
			} 
		}
	}
	self.xmlHttpReq.open('POST', strURL);
	self.xmlHttpReq.setRequestHeader("X-Requested-With","XMLHttpRequest");
	self.xmlHttpReq.setRequestHeader("Content-Type","application/x-www-form-urlencoded; ");
	self.xmlHttpReq.setRequestHeader("Content-length", mess.length);
	self.xmlHttpReq.send(mess);        
}
