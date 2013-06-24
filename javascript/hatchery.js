/*!
 * Hive Core JavaScript Library v2.4
 * http://hcore.mental-orb.com/
 *
 * Copyright 2010, mental orb
 *
 * Based on Prototype v1.6.0.3 & Scriptaculous v1.8.3
 * Documentation : http://hcore.mental-orb.com/docs/
 */
 
var currentURL = window.location.hash;
var currentURL = currentURL.substring(1,currentURL.length);
var oldURL;
var changePage = false;

var loadingScreen = function(xstat)
{
	if(xstat=="show")
	{
		$('loadScreen').show();
	}else
	{
		$('loadScreen').hide();
	}
}

// Navigation stacks
var wind = function(href, ScndArg)
{
	var ScndArg = ScndArg || 0;
	hx.setEvent($H({drn:'wind', href: href, ScndArg: ScndArg, callbackJS: 'force'}));
	return false;
};

// ForceLoader by Anchor
var forcingWind = function(locationByAnchor)
{
	/*var locationByAnchor= locationByAnchor || window.location;
	locationByAnchor = locationByAnchor.toString().split('/');
	wind(locationByAnchor[locationByAnchor.length-2]+'/'+locationByAnchor[locationByAnchor.length-1]);*/
	
	if(currentURL != oldURL)
	{
		//alert("Forcing\ncur: "+currentURL+"\nOld: "+oldURL);
		var URLanchor =window.location.hash;
		var URLanchor = URLanchor.substring(1,URLanchor.length);
		currentURL = URLanchor;
		oldURL = URLanchor;
		wind(oldURL);
	}
}

// Action stacks
var use = function(dothis, param, param2, param3, param4)
{
	var param = param || 0;
	var param2 = param2 || 0;
	var param3 = param3 || 0;
	var param4 = param4 || 0;
	switch(dothis)
	{
		case 'setLang':
			hx.setEvent($H({drn:'setLang', callbackJS: 'force'}));
			break;
		case 'sum':
			hx.setEvent($H({update:'summary', drn:'summ', path:param, lang:param2, callbackJS: 'force'}));
			break;
		case 'onFly':
			window.t = setTimeout(function taMere(){
				// ne pas traduire 2 fois le même terme
				if(document.getElementById(param3).innerHTML == "Translating word ...")
				{
					hx.setEvent($H({update:param3, drn:'pali_translate', term:param, lang:param2}));
				}
			}, 600);
			break;
		// Pop signin
		case 'signin':
			if(param == 'open')
			{
				hx.setEvent($H({update:'lite', drn:'signin', meth:param2}));
				hx.setEvent($H({type:'static', method: showLB}));
			}
			else if(param == 'close')
			{
				hx.setEvent($H({type:'static', method: hideLB}));
			}
			break;
		case 'didyouknow':
			hx.setEvent($H({update:'didyouknow', drn:'didyouknow', lang:param}));
			
		// Nothing
		default:
			Prototype.emptyFunction;
			break;
	}
	return false;
};

var validateForm = function()
{
	if (document.getElementById)
	{
		var i,p,q,nm,test,num,min,max,errors='',args=validateForm.arguments;
		for (i=0; i<(args.length-2); i+=3)	
		{
			test=args[i+2]; val=document.getElementById(args[i]);
			if (val)
			{	 nm=val.name;	 if ((val=val.value)=="")
				{
					errors += '- '+nm+' est obligatoire.\n';
				}
			}
		}
		if(errors)
		{
			alert('- Please fill all the required fields\n- Ci voli à compia tuttu\n- Vous devez remplir tous les champs obligatoires');
			//document.returnValue = false;
			return false;
		}else
		{
			//document.returnValue = true;
			return true;
		}
	}
}

var scrolltotop = function()
{
	new Effect.ScrollTo('header',0.01);
	return false;
};

var hform = function(action, param)
{
	var param = param || 0;
	switch(action)
	{
		case 'contact_form':
			if(validateForm('nom','','R','email','','R'))
			{
				hx.setEvent($H({method: 'post', drn:'contact', form: 'form_contact', callbackJS: 'force'}));
			}
			break;
		
		// Nothing
		default:
			Prototype.emptyFunction;
			break;
	}
			
	return false;
};

// LiteBox display functions
var hideLB = function() { $('lite').hide(); $('lite').update(''); };
var showLB = function() {	$('lite').show(); };

function listenURL()
{
	var currentURL = window.location.hash;
	var currentURL = currentURL.substring(1,currentURL.length);
	if(changePage == true)
	{
		oldURL = currentURL;
		changePage = false;
	}

	if(currentURL != oldURL)
	{
		var URLanchor =window.location.hash;
		var URLanchor = URLanchor.substring(1,URLanchor.length);
		oldURL = URLanchor;
		if(URLanchor!="" && URLanchor!="/")
		{
			window.location='#'+URLanchor;
			forcingWind(oldURL);
		}
		
		setTimeout("listenURL()", 1500);
	}
	else
	{
		setTimeout("listenURL()", 500);
	}
}

function parallax(event)
{
	var mouseX= event.clientX;
	var middleWin = $('wrapper').offsetWidth /2;
	var parallaxFactor = (mouseX);
	if(((middleWin - parallaxFactor)  - 1250) + middleWin < 0 && parallaxFactor < 1250)
	{
		// debug
			//$('mmargin').value=$('parallax').style.marginLeft;
			//$('posX').value=mouseX;
			//$('middWin').value=middleWin;
		$('parallax').style.marginLeft = ((middleWin - parallaxFactor)  - 1250)+'px';
	}
	return 0;
}

function addEvent(obj,event,fct)
{
	if( obj.attachEvent)
		obj.attachEvent('on' + event,fct);
	else
		obj.addEventListener(event,fct,true);
}

listenURL();
