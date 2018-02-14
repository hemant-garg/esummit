

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );


;(function(window){
	var polyfilter = {
		// Detect if we are dealing with IE <= 9
		// http://james.padolsey.com/javascript/detect-_ie-in-js-using-conditional-comments/
		_ie:			(function(){
			var undef,
			v = 3,
			div = document.createElement('div'),
			all = div.getElementsByTagName('i');
			
			while(
				div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
				all[0]
			);
			
			return v > 4 ? v : undef;
		}()),
		
	
		process_stylesheets: function(){
			var xmlHttp = [];
			
		
			
			
			var stylesheets = document.querySelectorAll ? document.querySelectorAll('style,link[rel="stylesheet"]') : document.getElementsByTagName('*');
			
			for(var i = 0; i < stylesheets.length; i++){
				(function(i){
					switch(stylesheets[i].nodeName){
						default:
						break;
						
						case 'STYLE':
							polyfilter._stylesheets.push({
								media:		stylesheets[i].media || 'all',
								content: 	stylesheets[i].innerHTML
							});
						break;
						
						case 'LINK':
							if(stylesheets[i].rel === 'stylesheet'){
								var index = polyfilter._stylesheets.length;
							
								polyfilter._stylesheets.push({
									media:		stylesheets[i].media || 'all'
								});
								
								polyfilter._pending_stylesheets++;
								
								// Fetch external stylesheet
								var href = stylesheets[i].href;
								
								// Use localStorage as cache for stylesheets, if available
								if(!polyfilter._development_mode && window.localStorage && window.localStorage.getItem('polyfilter_' + href)){
									polyfilter._pending_stylesheets--;
									polyfilter._stylesheets[index].content = localStorage.getItem('polyfilter_' + href);
									if(polyfilter._pending_stylesheets === 0){
										polyfilter.process();
									}
								}
	
								// Always fetch stylesheets to reflect possible changes
								try{
									if(window.XMLHttpRequest) {
										var xmlHttp = new XMLHttpRequest();
									} else if(window.ActiveXObject) {
										var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
									}
									xmlHttp.open('GET', href, true);
									xmlHttp.onreadystatechange = function(){
										if(xmlHttp.readyState === 4){
											if(xmlHttp.status === 0){
												if(window.console) console.log('Could not fetch external CSS via HTTP-Request ' + href + '. Probably because of cross origin.');
												if(!polyfilter._stylesheets[index].content){
													polyfilter._pending_stylesheets--;
													polyfilter._stylesheets[index].content = xmlHttp.responseText;
													if(polyfilter._pending_stylesheets === 0){
														polyfilter.process();
													}
												}
											} else {
												if(!polyfilter._stylesheets[index].content){
													polyfilter._pending_stylesheets--;
													polyfilter._stylesheets[index].content = xmlHttp.responseText;
													if(polyfilter._pending_stylesheets === 0){
														polyfilter.process();
													}
												}
												// Cache stylesheet in localStorage, if available
												if(!polyfilter._development_mode && window.localStorage){
													try{
														window.localStorage.setItem('polyfilter_' + href,polyfilter._stylesheets[index].content)
													}
													catch(e){
														if(window.console) console.log('Local storage quota have been exceeded. Caching of stylesheet ' + href + ' is not possible');
													}
												}
											}
										}
									};
									
								} catch(e){}
							}
						break;
					}
				})(i);
			}
			
		},
	
		
		
		init:				function(){
			if(Object.defineProperty){
				Object.defineProperty(CSSStyleDeclaration.prototype, 'polyfilter', {
					get:	function(){
						return this.polyfilterStore;
					},
					set:	function(gluedvalues){
						values = gluedvalues.split(/\)\s+/);
						var properties = {
							filtersW3C:		[],
							filtersWebKit: 	[],
							filtersSVG:		[],
							filtersIE:		[],
							behaviorsIE:	[]
						}
				
						for(idx in values){
							var value = values[idx] + ')';
							
							currentproperties = polyfilter.convert(value);
							
							for(key in currentproperties){
								if(typeof properties[key] !== 'undefined'){
									properties[key] = properties[key].concat(currentproperties[key]);
								}
							}
						}
			
						if(properties['filtersW3C'].length > 0){
							if(typeof polyfilter._ie === 'undefined'){
								this.msFilter = 
									properties['filtersW3C'].join(' ');
							}
							
							this.webkitFilter = 
							this.mozFilter = 
							this.oFilter = 
								properties['filtersW3C'].join(' ');
						}
						if(properties['filtersWebKit'].length > 0){
							this.webkitFilter = properties['filtersWebKit'].join(' ');
						}
						if(properties['filtersSVG'].length > 0){
							if(properties['filtersSVG'][0] != 'none'){
								var id = gluedvalues.replace(/[^a-z0-9]/g,'');
					
								if(typeof polyfilter._svg_cache[id] === 'undefined'){
									polyfilter._svg_cache[id] = polyfilter._create_svg(id,properties['filtersSVG']);

									if(typeof XMLSerializer === 'undefined'){
										document.body.appendChild(polyfilter._svg_cache[id]);
									}
									else {
										var s = new XMLSerializer();
										var svgString = s.serializeToString(polyfilter._svg_cache[id]);
										if(svgString.search('SourceGraphic') != -1){
											document.body.appendChild(polyfilter._svg_cache[id]);
										}
									}
								}
			
								if(typeof XMLSerializer === 'undefined'){
									this.filter = 'url(#' + id + ')';
								}
								else {
									var s = new XMLSerializer();
									var svgString = s.serializeToString(polyfilter._svg_cache[id]);
									if(svgString.search('SourceGraphic') != -1){
										this.filter = 'url(#' + id + ')';
									}
									else {
										this.filter = 'url(\'data:image/svg+xml;utf8,' + svgString + '#' + id + '\')';
									}
								}
							}
							else {
								this.filter = 'none';
							}
						}
						if(typeof polyfilter._ie !== 'undefined'){
							if(properties['filtersIE'].length > 0){
								this.filter = 
									properties['filtersIE'].join(' ');
							}
							else {
								this.filter = '';
							}
							if(properties['behaviorsIE'].length > 0){
								this.behavior = 
									properties['behaviorsIE'].join(' ');
							}
							else {
								this.behavior = '';
							}
						}
						this.polyfilterStore = gluedvalues;
					}
				});
			}
		},
		
	

	}

	// Inialize, either via jQuery...
	if(window.jQuery){
		window.jQuery(document).ready(function(e) {
			polyfilter.process_stylesheets();
		});
	}
	// or via contentLoaded...
	else if(window.contentLoaded){
		contentLoaded(window,function(){
			polyfilter.process_stylesheets();
		});
	}
	// or on DOM ready / load
	else {
		if(window.addEventListener) // W3C standard
		{
			document.addEventListener('DOMContentLoaded', function(){
				polyfilter.process_stylesheets();
			}, false);
		} 
		else if(window.attachEvent) // Microsoft
		{
			window.attachEvent('onload', function(){
				polyfilter.process_stylesheets();
			});
		}
	}
	
	// Install style setters and getters
	polyfilter.init();
})(window);



;


var CssInspector = {

  mVENDOR_PREFIXES: null,

  kEXPORTS_FOR_GECKO:   true,
  kEXPORTS_FOR_WEBKIT:  true,
  kEXPORTS_FOR_PRESTO:  true,
  kEXPORTS_FOR_TRIDENT: true,

  

  
   parse: function(aString, aTryToPreserveWhitespaces, aTryToPreserveComments) {
    if (!aString)
      return null; // early way out if we can

    this.mPreserveWS       = aTryToPreserveWhitespaces;
    this.mPreserveComments = aTryToPreserveComments;
    this.mPreservedTokens = [];
    this.mScanner.init(aString);
    var sheet = new jscsspStylesheet();

    // @charset can only appear at first char of the stylesheet
    var token = this.getToken(false, false);
    if (!token.isNotNull())
      return;
    if (token.isAtRule("@charset")) {
      this.parseCharsetRule(token, sheet);
      token = this.getToken(false, false);
    }

    var foundStyleRules = false;
    var foundImportRules = false;
    var foundNameSpaceRules = false;
    while (true) {
      if (!token.isNotNull())
        break;
      if (token.isWhiteSpace())
      {
        if (aTryToPreserveWhitespaces)
          this.addWhitespace(sheet, token.value);
      }

      else if (token.isComment())
      {
        if (this.mPreserveComments)
          this.addComment(sheet, token.value);
      }

      else if (token.isAtRule()) {
        if (token.isAtRule("@variables")) {
          if (!foundImportRules && !foundStyleRules)
            this.parseVariablesRule(token, sheet);
          else {
            this.reportError(kVARIABLES_RULE_POSITION);
            this.addUnknownAtRule(sheet, token.value);
          }
        }
        else if (token.isAtRule("@import")) {
          // @import rules MUST occur before all style and namespace
          // rules
          if (!foundStyleRules && !foundNameSpaceRules)
            foundImportRules = this.parseImportRule(token, sheet);
          else {
            this.reportError(kIMPORT_RULE_POSITION);
            this.addUnknownAtRule(sheet, token.value);
          }
        }
        else if (token.isAtRule("@namespace")) {
          // @namespace rules MUST occur before all style rule and
          // after all @import rules
          if (!foundStyleRules)
            foundNameSpaceRules = this.parseNamespaceRule(token, sheet);
          else {
            this.reportError(kNAMESPACE_RULE_POSITION);
            this.addUnknownAtRule(sheet, token.value);
          }
        }
        else if (token.isAtRule("@font-face")) {
          if (this.parseFontFaceRule(token, sheet))
            foundStyleRules = true;
          else
            this.addUnknownAtRule(sheet, token.value);
        }
        else if (token.isAtRule("@page")) {
          if (this.parsePageRule(token, sheet))
            foundStyleRules = true;
          else
            this.addUnknownAtRule(sheet, token.value);
        }
        else if (token.isAtRule("@media")) {
          if (this.parseMediaRule(token, sheet))
            foundStyleRules = true;
          else
            this.addUnknownAtRule(sheet, token.value);
        }
        else if (token.isAtRule("@keyframes")) {
          if (!this.parseKeyframesRule(token, sheet))
            this.addUnknownAtRule(sheet, token.value);
        }
        else if (token.isAtRule("@charset")) {
          this.reportError(kCHARSET_RULE_CHARSET_SOF);
          this.addUnknownAtRule(sheet, token.value);
        }
        else {
          this.reportError(kUNKNOWN_AT_RULE);
          this.addUnknownAtRule(sheet, token.value);
        }
      }

      else // plain style rules
      {
        var ruleText = this.parseStyleRule(token, sheet, false);
        if (ruleText)
          foundStyleRules = true;
      }
      token = this.getToken(false);
    }

    return sheet;
  }

};




var ModalEffects = (function() {

	function init() {

		var overlay = document.querySelector( '.md-overlay' );

		[].slice.call( document.querySelectorAll( '.md-trigger' ) ).forEach( function( el, i ) {

			var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
				close = modal.querySelector( '.md-close' );

			function removeModal( hasPerspective ) {
				classie.remove( modal, 'md-show' );

				if( hasPerspective ) {
					classie.remove( document.documentElement, 'md-perspective' );
				}
			}

			function removeModalHandler() {
				removeModal( classie.has( el, 'md-setperspective' ) ); 
			}

			el.addEventListener( 'click', function( ev ) {
				classie.add( modal, 'md-show' );
				overlay.removeEventListener( 'click', removeModalHandler );
				overlay.addEventListener( 'click', removeModalHandler );

				if( classie.has( el, 'md-setperspective' ) ) {
					setTimeout( function() {
						classie.add( document.documentElement, 'md-perspective' );
					}, 25 );
				}
			});

			close.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				removeModalHandler();
			});

		} );

	}

	init();

})();