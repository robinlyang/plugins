/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function FormatComma(txtCur) {

	if (txtCur*1<0) {
		var dg = 4;
	} else {
		var dg = 3;
	}
	var txtCur = txtCur.toString();
	var Dec = /\./;

	if (txtCur.search(Dec)!=-1) {
		var p = txtCur.split(Dec);
		var pa = p[0];
		var pb = p[1];
	} else {
		var pa = txtCur;
		var pb = "00";
	}
	var n = pa.length;

	if (n > dg) {
		if (n > dg+3) {
			var paa = pa.substr(0, (pa.length-(dg+3)));
			var pab = pa.substr((pa.length-(dg+3)), 3);
			var pac = pa.substr((pa.length-dg), 3);
			var txtCurn = paa+","+pab+","+pac+"."+pb;
		} else {
			var paa = pa.substr(0, (pa.length-3));
			var pab = pa.substr((pa.length-3), 3);
			var txtCurn = paa+","+pab+"."+pb;
		}	
	} else {
		var txtCurn = pa+"."+pb;
	}

	return txtCurn;
} 

function Calc() {

	if(document.getElementById("txSfhr").disabled){
		valida();
	} 
	if(document.getElementById("txHrc").disabled) {
		validb();
	}

}

function Rst() {

	if(document.getElementById("txHrc").disabled){
		document.getElementById("txHrc").disabled=false;
	}
	if(document.getElementById("txSfhr").disabled){
		document.getElementById("txSfhr").disabled=false;
	} 
	if(document.getElementById("txPrsf").disabled){
		document.getElementById("txPrsf").disabled=false;
	} 
	if(document.getElementById("txPrhr").disabled){
		document.getElementById("txPrhr").disabled=false;
	} 
	if(document.getElementById("txDy").disabled){
		document.getElementById("txDy").disabled=false;
	} 
	if(document.getElementById("txMn").disabled){
		document.getElementById("txMn").disabled=false;
	} 
	if(document.getElementById("txYr").disabled){
		document.getElementById("txYr").disabled=false;
	} 
	for (var j=1; j<11; j++) {
		var nm = "txTm"+j;
		if (!document.getElementById(nm).disabled){
			document.getElementById(nm).disabled=true;
		} 
	}
}

function valida() {

	var Sqft = document.getElementById("txSqft").value;
	var Hrc = document.getElementById("txHrc").value;
	var Sfhr = document.getElementById("txSfhr").value;

	if ((Sqft !="") || (Sqft!=0)) {
		if ((Hrc != "") || (Hrc != 0)) {
			document.getElementById("txSfhr").value = (Math.round((Sqft/Hrc)*100)/100).toFixed(2);
			document.getElementById("txSfhr").disabled = true;
			document.getElementById("txPrsf").focus();
		} else {
			document.getElementById("txSfhr").value = "";
			document.getElementById("txSfhr").disabled = false;
		}
	}

	validf();
	Calca();

}

function validb() {

	var Sqft = document.getElementById("txSqft").value;
	var Hrc = document.getElementById("txHrc").value;
	var Sfhr = document.getElementById("txSfhr").value;

	if ((Sqft !="") || (Sqft!=0)) {
		if ((Sfhr != "") || (Sfhr != 0)) {
			document.getElementById("txHrc").value = (Math.round((Sqft/Sfhr)*100)/100).toFixed(2);
			document.getElementById("txHrc").disabled = true;
		}else {
			document.getElementById("txHrc").value = "";
			document.getElementById("txHrc").disabled = false;
		}
	}

	validf();
	Calca();

}

function validc() {

	var Prsf = document.getElementById("txPrsf").value;

	if ((Prsf != "") || (Prsf != 0)) {
		document.getElementById("txPrhr").disabled = true;
//		document.getElementById("txDy").disabled = true;
		document.getElementById("txMn").disabled = true;
		document.getElementById("txYr").disabled = true;
	} else {
		document.getElementById("txPrhr").disabled = false;
//		document.getElementById("txDy").disabled = false;
		document.getElementById("txMn").disabled = false;
		document.getElementById("txYr").disabled = false;
	}

	Calca();

}

function validd() {

	var Prhr = document.getElementById("txPrhr").value;
	
	if ((Prhr != "") || (Prhr != 0)) {
		document.getElementById("txPrsf").disabled = true;
	}else {
		document.getElementById("txPrsf").disabled = false;
		document.getElementById("txDy").disabled = false;
		document.getElementById("txDy").value = "";
		document.getElementById("txMn").disabled = false;
		document.getElementById("txMn").value = "";
		document.getElementById("txYr").disabled = false;
		document.getElementById("txYr").value = "";
	}

	Calca();
}

function valide() {

	var Dy = document.getElementById("txDy").value;
	var Mn = document.getElementById("txMn").value;
	var Yr = document.getElementById("txYr").value;

	if (Dy > 7) {
		window.alert("Days in week can not be more than 7. Please Enter Again");
		document.getElementById("txDy").value = "";
		document.getElementById("txDy").focus();
	}

	if (Mn > 31) {
		window.alert("Days in month can not be more than 31. Please Enter Again");
		document.getElementById("txMn").value = "";
		document.getElementById("txMn").focus();
	}

	if (Yr > 365) {
		window.alert("Days in year can not be more than 365. Please Enter Again");
		document.getElementById("txDy").value = "";
		document.getElementById("txDy").focus();
	}

	if ((Dy != "") || (Dy != 0)) {
		document.getElementById("txMn").disabled = true;
		document.getElementById("txYr").disabled = true;
	}else if ((Mn != "") || (Mn != 0)) {
		document.getElementById("txDy").disabled = true;
		document.getElementById("txYr").disabled = true;
	}else if ((Yr != "") || (Yr != 0)) {
		document.getElementById("txDy").disabled = true;
		document.getElementById("txMn").disabled = true;
	} else {
		document.getElementById("txDy").disabled = false;
		document.getElementById("txDy").value = "";
		document.getElementById("txMn").disabled = false;
		document.getElementById("txMn").value = "";
		document.getElementById("txYr").disabled = false;
		document.getElementById("txYr").value = "";
	}

	Calca();

}

function validf() {

	var Hrc = document.getElementById("txHrc").value*1;
	
	var Wg1 = document.getElementById("txWg1").value*1;
	var Wg2 = document.getElementById("txWg2").value*1;
	var Wg3 = document.getElementById("txWg3").value*1;
	var Wg4 = document.getElementById("txWg4").value*1;
	var Wg5 = document.getElementById("txWg5").value*1;
	var Wg6 = document.getElementById("txWg6").value*1;
	var Wg7 = document.getElementById("txWg7").value*1;
	var Wg8 = document.getElementById("txWg8").value*1;
	var Wg9 = document.getElementById("txWg9").value*1;
	var Wg10 = document.getElementById("txWg10").value*1;

	if ((Wg1 != "") || (Wg1 != 0)) {
		document.getElementById("txTm1").disabled = false;
		document.getElementById("txTm1").value = "";
	}else {
		document.getElementById("txTm1").disabled = true;
		document.getElementById("txTm1").value = "";
	}

	if ((Wg2 != "") || (Wg2 != 0)) {
		document.getElementById("txTm2").disabled = false;
		document.getElementById("txTm2").value = "";
	}	else {
		document.getElementById("txTm2").disabled = true;
		document.getElementById("txTm2").value = "";
	}

	if ((Wg3 != "") || (Wg3 != 0)) {
		document.getElementById("txTm3").disabled = false;
		document.getElementById("txTm3").value = "";
	}else {
		document.getElementById("txTm3").disabled = true;
		document.getElementById("txTm3").value = "";
	}

	if ((Wg4 != "") || (Wg4 != 0)) {
		document.getElementById("txTm4").disabled = false;
		document.getElementById("txTm4").value = "";
	}else {
		document.getElementById("txTm4").disabled = true;
		document.getElementById("txTm4").value = "";
	}

	if ((Wg5 != "") || (Wg5 != 0)) {
		document.getElementById("txTm5").disabled = false;
		document.getElementById("txTm5").value = "";
	}else {
		document.getElementById("txTm5").disabled = true;
		document.getElementById("txTm5").value = "";
	}

	if ((Wg6 != "") || (Wg6 != 0)) {
		document.getElementById("txTm6").disabled = false;
		document.getElementById("txTm6").value = "";
	}	else {
		document.getElementById("txTm6").disabled = true;
		document.getElementById("txTm6").value = "";
	}

	if ((Wg7 != "") || (Wg7 != 0)) {
		document.getElementById("txTm7").disabled = false;
		document.getElementById("txTm7").value = "";
	}	else {
		document.getElementById("txTm7").disabled = true;
		document.getElementById("txTm7").value = "";
	}

	if ((Wg8 != "") || (Wg8 != 0)) {
		document.getElementById("txTm8").disabled = false;
		document.getElementById("txTm8").value = "";
	}	else {
		document.getElementById("txTm8").disabled = true;
		document.getElementById("txTm8").value = "";
	}

	if ((Wg9 != "") || (Wg9 != 0)) {
		document.getElementById("txTm9").disabled = false;
		document.getElementById("txTm9").value = "";
	}	else {
		document.getElementById("txTm9").disabled = true;
		document.getElementById("txTm9").value = "";
	}

	if ((Wg10 != "") || (Wg10 != 0)) {
		document.getElementById("txTm10").disabled = false;
		document.getElementById("txTm10").value = "";
	}	else {
		document.getElementById("txTm10").disabled = true;
		document.getElementById("txTm10").value = "";
	}

	var cnt = 0;
	for (var j=1; j<11; j++) {
		var nm = "txWg"+j;
		if ((document.getElementById(nm).value != "") && (document.getElementById(nm).value != 0)){
			var cnt = cnt+1;
		} 
	}

	if (cnt >0 ) {
		for (var j=1; j<11; j++) {
			var nm = "txWg"+j;
			var nma = "txTm"+j;
			if ((document.getElementById(nm).value != "") && (document.getElementById(nm).value != 0)){
				document.getElementById(nma).value = (Hrc/cnt).toFixed(2);
			}
		}
	} else {
		for (var j=1; j<11; j++) {
			var nma = "txTm"+j;
			document.getElementById(nma).value = "";
		}
	}

	Calcb();

}

function validg() {

	var Hrc = document.getElementById("txHrc").value*1;
	var cnt = 0;
	var srct = 0;

	for (var j=1; j<11; j++) {
		var nm = "txTm"+j;
		if ((document.getElementById(nm).value != "") && (document.getElementById(nm).value != 0)){
			if (srct==0) {
				var srct = j;
			}
			var cnt = cnt+1;
		} 
	}

	var Adhr=0;

	if (cnt >0 ) {
		for (var j=srct; j< (srct+cnt); j++) {
			var nma = "txTm"+j;
			if ((document.getElementById(nma).value != "") && (document.getElementById(nma).value != 0)){
				Adhr = Adhr + document.getElementById(nma).value*1;
			}
		}
	} 

	var Msg="";

	if ((Hrc - Adhr) !=0) {
		if ((Hrc - Adhr) > 0) {
			Msg = "Less By ";
		} else {
			Msg = "Excess By ";
		}
		window.alert("Please Adjust Total Hours. Total is " + Msg + Math.abs((Hrc - Adhr).toFixed(2)) + " Hours");
	} else {
		window.alert("Hours Balanced Properly");
	}

	Calcb();

}

function Calca() {

	var Sqft = document.getElementById("txSqft").value;
	var Hrc = document.getElementById("txHrc").value;
	var Sfhr = document.getElementById("txSfhr").value;
	var Prsf = document.getElementById("txPrsf").value;
	var Prhr = document.getElementById("txPrhr").value;
	var Dy = document.getElementById("txDy").value;
	var Mn = document.getElementById("txMn").value;
	var Yr = document.getElementById("txYr").value;

	var txTtl = 0;

	if ((Sqft !=0) && ((Prsf !=0) || (Prsf!=""))) {
		txTtl = (Math.round((Sqft*Prsf)*100)/100).toFixed(2);
	} else {
		if ((Dy !=0) || (Dy!="")) {
			txTtl = (Math.round(((Dy*Hrc*Prhr*52)/12)*100)/100).toFixed(2);
		}
		if ((Mn !=0) || (Mn!="")) {
			txTtl = (Math.round(((Mn*Hrc*Prhr))*100)/100).toFixed(2);
		}
		if ((Yr !=0) || (Yr !="")) {
			txTtl = (Math.round(((Yr*Hrc*Prhr)/12)*100)/100).toFixed(2);
		}
	} 

	var txTtlm=FormatComma(txTtl);
	var txTtly = (txTtl*12).toFixed(2);
	var txTtly=FormatComma(txTtly);

	document.getElementById("txTtm").value = txTtlm;

	Calcb();

}

function Calcb() {

	var Sqft = document.getElementById("txSqft").value;
	var Hrc = document.getElementById("txHrc").value;
	var Sfhr = document.getElementById("txSfhr").value;
	var Prsf = document.getElementById("txPrsf").value;
	var Prhr = document.getElementById("txPrhr").value;
	var Dy = document.getElementById("txDy").value;
	var Mn = document.getElementById("txMn").value;
	var Yr = document.getElementById("txYr").value;
	var txTtl = 0;

	if ((Sqft !=0) && ((Prsf !=0) || (Prsf!=""))) {
		txTtl = (Math.round((Sqft*Prsf)*100)/100).toFixed(2);
	} else {
		if ((Dy !=0) || (Dy!="")) {
			txTtl = (Math.round(((Dy*Hrc*Prhr*52)/12)*100)/100).toFixed(2);
		}
		if ((Mn !=0) || (Mn!="")) {
			txTtl = (Math.round(((Mn*Hrc*Prhr))*100)/100).toFixed(2);
		}
		if ((Yr !=0) || (Yr !="")) {
			txTtl = (Math.round(((Yr*Hrc*Prhr)/12)*100)/100).toFixed(2);
		}
	} 

	var Exb = document.getElementById("txEx2").value*1;
	var Exc = document.getElementById("txEx3").value*1;

	var Exd = document.getElementById("txEx4").value*1;
	var Exe = document.getElementById("txEx5").value*1;

	var Exf = document.getElementById("txEx6").value*1;
	var Exg = document.getElementById("txEx7").value*1;

	var Exh = document.getElementById("txEx8").value*1;
	var Exi = document.getElementById("txEx9").value*1;

	var Eqrc = document.getElementById("txEqrc").value*1;
	var Eqcc = document.getElementById("txEqcc").value*1;

	var Dwg =0;

	for (var j=1; j<11; j++) {
		var nm = "txWg"+j;
		var nma = "txTm"+j;
		if ((document.getElementById(nm).value != "") && (document.getElementById(nma).value != "")){
			var Dwg = Dwg + (document.getElementById(nm).value*1)*(document.getElementById(nma).value*1);
		} 
	}

	if ((Sqft !=0) && ((Prsf !=0) || (Prsf!=""))) {
		var Exa = (Math.round(((Dwg*Dy*52)/12)*100)/100).toFixed(2);
	} else {
		if ((Dy !=0) || (Dy!="")) {
			var Exa = (Math.round(((Dwg*Dy*52)/12)*100)/100).toFixed(2);
		} else 	if ((Mn !=0) || (Mn!="")) {
			var Exa = (Math.round(((Dwg*Mn))*100)/100).toFixed(2);
		} else 	if ((Yr !=0) || (Yr !="")) {
			var Exa = (Math.round(((Dwg*Yr)/12)*100)/100).toFixed(2);
		} else {
            var Exa = 0;
        }
	} 

	var Exac=FormatComma(Exa);

	var Mex = (Exa*1+Exa*Exb/100+Exa*Exc/100+Exa*Exd/100+Exa*Exe/100+Exa*Exh/100+Exa*Exi/100+txTtl*Exf/100+txTtl*Exg/100+Eqrc*1+Eqcc*1/12).toFixed(2);
	var Mexy = (Mex*12).toFixed(2);
	var Mexc=FormatComma(Mex);
	var Mexyc=FormatComma(Mexy);

	var Mexa =(Exa*1+Exa*Exb/100+Exa*Exc/100+Exa*Exd/100+Exa*Exe/100+Exa*Exh/100+Exa*Exi/100+txTtl*Exf/100+txTtl*Exg/100+Eqrc*1).toFixed(2);
	var Mexay = (Mexa*12).toFixed(2);
	var Mexac=FormatComma(Mexa);
	var Mexayc=FormatComma(Mexay);

	var Prm = (txTtl*1 - Mex*1).toFixed(2);
	var Pry = (Prm*12).toFixed(2);

	if (txTtl*1 !=0) {
		var Prpcm = ((txTtl*1 - Mex*1)*100/(txTtl*1)).toFixed(2);
	} else {
		Prpcm = 0
	}

	var Prma = (txTtl*1 - Mexa*1).toFixed(2);
	var Prya = (Prma*12).toFixed(2);
	
	if (txTtl*1 !=0) {
		var Prpcma = ((txTtl*1 - Mexa*1)*100/(txTtl*1)).toFixed(2);
	} else {
		Prpcma = 0
	}
	
	var txTtlm=FormatComma(txTtl);
	var txTtly = (txTtl*12).toFixed(2);
	var txTtly=FormatComma(txTtly);

	document.getElementById("txEx1").value = Exac;

	document.getElementById("txMex").value = Mexc;
	document.getElementById("txMexa").value = Mexac;

if ((Eqcc != "") || (Eqcc != 0)) {
	document.getElementById("txIncm").value = txTtlm;
	document.getElementById("txIncy").value = txTtly;
	document.getElementById("txCsm").value = Mexc;
	document.getElementById("txPrm").value = FormatComma(Prm);
	document.getElementById("txPrpcm").value = Prpcm;
	document.getElementById("txCsy").value = Mexyc;
	document.getElementById("txPry").value = FormatComma(Pry);
	document.getElementById("txPrpcy").value = Prpcm;
} else {
	document.getElementById("txIncm").value = "";
	document.getElementById("txIncy").value = "";
	document.getElementById("txCsm").value = "";
	document.getElementById("txPrm").value = "";
	document.getElementById("txPrpcm").value = "";
	document.getElementById("txCsy").value = "";
	document.getElementById("txPry").value = "";
	document.getElementById("txPrpcy").value = "";
}

	document.getElementById("txIncma").value = txTtlm;
	document.getElementById("txIncya").value = txTtly;
	document.getElementById("txCsma").value = Mexac;
	document.getElementById("txPrma").value = FormatComma(Prma);
	document.getElementById("txPrpcma").value = Prpcma;
	document.getElementById("txCsya").value = Mexayc;
	document.getElementById("txPrya").value = FormatComma(Prya);
	document.getElementById("txPrpcya").value = Prpcma;
	

	if (Prm<0) {
		document.getElementById("txPrm").style.color = "Red";
		document.getElementById("txPrpcm").style.color = "Red";
		document.getElementById("txPry").style.color = "Red";
		document.getElementById("txPrpcy").style.color = "Red";
	} else if (Prm>0)  {
		document.getElementById("txPrm").style.color = "Green";
		document.getElementById("txPrpcm").style.color = "Green";
		document.getElementById("txPry").style.color = "Green";
		document.getElementById("txPrpcy").style.color = "Green";
	} else {
		document.getElementById("txPrm").style.color = "Black";
		document.getElementById("txPrpcm").style.color = "Black";
		document.getElementById("txPry").style.color = "Black";
		document.getElementById("txPrpcy").style.color = "Black";
	}

	if (Prma<0) {
		document.getElementById("txPrma").style.color = "Red";
		document.getElementById("txPrpcma").style.color = "Red";
		document.getElementById("txPrya").style.color = "Red";
		document.getElementById("txPrpcya").style.color = "Red";
	} else if (Prma>0){
		document.getElementById("txPrma").style.color = "Green";
		document.getElementById("txPrpcma").style.color = "Green";
		document.getElementById("txPrya").style.color = "Green";
		document.getElementById("txPrpcya").style.color = "Green";
	} else {
		document.getElementById("txPrma").style.color = "Black";
		document.getElementById("txPrpcma").style.color = "Black";
		document.getElementById("txPrya").style.color = "Black";
		document.getElementById("txPrpcya").style.color = "Black";
	}

}
