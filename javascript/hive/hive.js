/*!
 * Hive Core JavaScript Library v2.4
 * http://hcore.mental-orb.com/
 *
 * Copyright 2010, mental orb
 *
 * Based on Prototype v1.6.0.3 & Scriptaculous v1.8.3
 * Documentation : http://hcore.mental-orb.com/docs/
 */
 


var HiveCore = {
	Version: '2.4'
};


var HiveQueue = Class.create(
{
	// Initialize parameters
	initialize: function()
  	{
		this.stack = new Hash();
		this.stack_increment = 0;
		this.listener = new Hash();
		this.selector = 0;
		this.tempo = 25;
		this.currentlyExecuting = false;
	},
	
	// Stack Event
	setEvent: function(value)
	{
		eventParams = value;
		hx.stack.set(hx.stack_increment, eventParams.toObject());
		hx.stack_increment++;

	},
	
	// Unstack Event
	unsetEvent: function(key)
	{
		hx.stack.unset(key);
	},
	
	// Execute current position
	loadEvent: function()
	{
		
		if(hx.stack_increment != hx.selector)
		{
			// Sow loading scr
			loadingScreen('show');
			hx.currentlyExecuting = true;
			var getEvent = $H(hx.stack.get(hx.selector));
			if(Object.isUndefined(getEvent.get("type")))				{ getEvent.set("type", "async"); }
			if(Object.isUndefined(getEvent.get("method")))			{ getEvent.set("method", "get"); }
			if(Object.isUndefined(getEvent.get("update")))			{ getEvent.set("update", false); }
			if(Object.isUndefined(getEvent.get("drn")))				{ getEvent.set("drn", false); }
			if(Object.isUndefined(getEvent.get("callbackJS")))			{ getEvent.set("callbackJS", false); }
			if(Object.isUndefined(getEvent.get("url")))				{ getEvent.set("url", "_hive.php"); }
			if(Object.isUndefined(getEvent.get("load")))				{ getEvent.set("load", false); }
			if(Object.isUndefined(getEvent.get("encoding")))			{ getEvent.set("encoding", "utf-8"); }
			if(Object.isUndefined(getEvent.get("resetForm")))			{ getEvent.set("resetForm", false); }
			if(Object.isUndefined(getEvent.get("callback")))			{ getEvent.set("callback", Prototype.emptyFunction); }
			
			if(getEvent.get("method") == "post")
			{
				var target = getEvent.get("url");
				var drn = getEvent.get("drn");
				//getEvent.update({url: target+"?drn="+drn});
			}
			
			switch(getEvent.get("type"))
			{
				case "async" :
					hx.async(getEvent);
					break;
				case "static" :		
					hx.static(getEvent);						
					break;
			}
			
		}
		else
		{
			setTimeout(hx.loadEvent, hx.tempo);
		}
	},
	
	// AJAX Event
	async: function(getEvent)
	{
		if(getEvent.get("method") == "post")
		{
			var k = $(getEvent.get('form')).serialize(true);
			getEvent = getEvent.merge(k);
		}	
		if(!getEvent.get("update"))
		{
			new Ajax.Request(getEvent.get("url"), {
				parameters: getEvent,
				method: getEvent.get("method"),
				encoding: 'utf-8', //getEvent.get("encoding"),
				evalJS: getEvent.get("callbackJS"),
				onComplete: function() {
					hx.currentlyExecuting = false;
					hx.iSelector();
				}
			});
		}
		else
		{
			new Ajax.Updater(getEvent.get("update"), getEvent.get("url"), {
				parameters: getEvent,
				method: getEvent.get("method"),
				encoding: 'utf-8', //getEvent.get("encoding"),
				evalJS: getEvent.get("callbackJS"),
				onComplete: function() {
					hx.currentlyExecuting = false;
					hx.iSelector();
				}			
			});
		}
	},
	
	// Increment Selector
	iSelector: function()
	{
		if(hx.currentlyExecuting)
		{
			setTimeout(hx.iSelector, hx.tempo);
		}
		else
		{
			hx.stack.unset(hx.selector);
			hx.selector++;
			setTimeout(hx.loadEvent, hx.tempo);
			// Hide loading scr
			loadingScreen('hide');
		}
	},
	
	// Static Event
	static: function(getEvent)
	{
		getEvent.get("method")();
		hx.currentlyExecuting = false;
		hx.iSelector();
	},
	
	// Start HiveCore
	start: function()
	{
		setTimeout(hx.loadEvent, hx.tempo);
	}

});

var HiveNavigation = Class.create(
{
	
	initialize: function()
  	{
		this.current = '';
		this.previous = '';
	},
	
	start: function()
	{

		if(!document.all)
		{
			new PeriodicalExecuter(
			function()
			{
				hn.current = hn.getHash();
				if(hn.current !== '' && hn.previous != hn.current)
				{
					hn.previous = hn.current;
				}
			}, 0.2);
		}
		
	},
	
	getHash: function(){
		return window.location.hash.replace('#h_','');
	}
	
});

var hx = new HiveQueue();
var hn = new HiveNavigation();

Event.observe(window, 'load', function() {
	hx.start();
	hn.start();
	
	/*var analyse=window.location;
	var an=new RegExp("[#]","g");
	if (analyse.toString().match(an)) {
	forcingWind(analyse);
	}*/
	
});

