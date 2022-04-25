
/* ------ [Default Template] NodeFire LightBox Script Settings - (customize any portion below to suit your needs) ------ */

	/*
		%% -Basic Info. / Help- %%
		     
			*Turning off word wrapping in your text-editor will make this document easier to read and edit. Use a plain text editor (ANSI)! 
			 
			*The paramter settings below fully define the functionality and layout of the lightbox, style options are all CSS
			based and located in the coooresonding .css file for this template.
			
			*Most paramters can accept an object of environment specific settings which specify different values for different
			browsers or mobile devices such as iPad, Android, Small Devices, IE, Chrome, ect. Typical options include...
			
				isModal       (LightBoxes set to a modal state vs. inline)
				mobile        (Any mobile device including iPad & Android tablets.)
				smallMobile   (Mobile devices with a screen pixel ratio greater than 1, typically smart phones.)
				ipad
				ios
				android
				ie, ie7, ie8, ie9
				firefox
				chrome
				safari
				opera
				webkit
				
			*All paramters below are optional, you can run your lightbox with an empty or null paramter set.  However, advanced features
			such as gallery slide shows, zooming, frame links, animations, etc... will not be present.
			
			*The top and bottom control bars are highly customizable.  Controls (titles, nav buttons, frame links, etc.) can be custom tailored
			and added in any order to the top or bottom bars.  Multiple controls of the same type are allowed.
			
			*Frame links (AKA: slide show gallery links) have many customizable options.  Use auto numbers, titles, ID's, or even thumbnail images for
			your frame links.  Display links in multiple rows and columns, clip or fit thumbnail images, fully CSS style all aspects, plus much more.
			
			*Use paramter hooks with any control (text, button, frame link, etc...).  Parameter hooks allow you to grab specific data from the current
			frame (title, src, size, position, custom property, etc...) and dynamically insert the content within any control.  See it in action below...
			
			*Titles and custom content controls may use any HTML markup necessary, e.g. add a 'more info' link to a title with a paramter hook and HTML.
			
			*All animations utilize the OpenCube NodeFire API and are fully customizable.  Animate any numeric based CSS style for any lightbox sequence.
			The API is timeline based and includes fully synchronized multiple clip and track options capable of producing very advanced animation effects.
			Animations are optionally GPU accelerated and include easing options. Targeting features allow start and end values to be dynamically obtained
			from a specific node, e.g. 100% the current width of a target node, or 100% the width of a target - the bottom border size, etc...
			
			*The NodeFire lightbox is fully contained within it's own name space (no JavaScript conflicts).  Each box you define is it's own object and
			fully independant of other lightboxes in the same document.  Add multiple boxes with unique CSS, paramter options, and content if necessary.
		
	*/


function nflbParams_simple(framelinks_type)
{
	var params = {};
	var a;
	
	
	/*######## Basic Paramter Options ########*/
	
		/* ----- Basic Settings ----- */
		params.preloadFrameImages = "load";    //Set to "load" or "ready" - Note: Control button images are automatically preloaded on document load. 
		params.mobileDoubleTapBehaviour = "maximizeBox";    //"maximizeContent" or "maximizeBox" [optionally: Any valid button name may be used]
		params.hasDefaultFocus = true;    //This setting will scroll the page onready if applied to an inline lightbox located below the browser window height.
		params.iframeShowScrollBars = true;
		params.loopFrames = true;
		params.keepAspectRatio = true;
		params.showTooltips = {all:true, ie:false, mobile:false};
		
		/* ----- Blockout Background (opacity + color) - Further customize the background (images, etc...) in the CSS template. ----- */
		params.blockoutOpacity = {opacity:.8, rgb:'0,0,0'}
		
		/* ----- Default LightBox State ----- */
		params.startContentMaximized = {all:false, isModal:false, isInline:true, smallMobile:false, mobile:false};
		params.startBoxMaximized = {all:false, isModal:false, isInline:true, mobile:false};
		
		/* ----- Minimum Dimensions ----- */
		params.minBlockoutPadding = {all:{topBottom:10, leftRight:10}, mobile:{topBottom:10, leftRight:10}};
		params.minContentSpaceDimensions = {img:{w:0, h:0}, iframe:{w:0, h:0}, inlineHTML:{w:0, h:0}, object:{w:0, h:0}};  //'object' type includes videos & flash
		params.matchMinWidthToControlBars = true;
		
		/* ----- Zoom Settings ----- */
		params.zoomStepSize = 1.3;   //value must be greater than 1
		params.zoomMin = ".50";
		params.zoomMax = "16";
		
		/* ----- Animation Speed ----- */
		params.animationFramesFactor = {all:1, mobile:.3, firefox:.7, ie:1, chrome:.7, safari:.5, opera:.8};
		params.animationGPUBoost = {mobile:true, safari:true, chrome:true, opera:true};
			
		/* ----- Delay Timers (MS 1/1000s) ----- */
		params.extraLoadDelay = {normal:{all:0, mobile:0}, boxMaximized:{all:500, mobile:500}};
		params.beforeShowControlBarsDelay = 0;
		
		/* ----- Gallery Slide Show Play Timers (Seconds) ----- */
		params.startPlaying = false;
		params.slideShowTimer = 6; 
		params.slideShowStartDelay = 3; 
		
		/* ----- Video Settings ----- */
		params.flashVideoPlayer = "/flash/player.swf";
		params.defaultVideoPlayer = {ios:'quicktime'};  //Unless otherwise specified an HTML5 video tag or the flash video player will be used.
		
		/* ----- Basic Top & Bottom Control Bar Settings (full cusomtization further down) ----- */
		params.topbarDoubleClickBehaviour = "maximizeBox"
		params.botbarDoubleClickBehaviour = "maximizeContent"
		params.barControlsVerticalAlign = "top";  //align the horizotnal controls to the 'top', 'middle', or 'bottom'
		
		
	
	/*######## Custom Top & Bottom Bars ########*/
	
		/* --- Add Top & Bottom Bar Controls -(controls are rendered left to right in the order they are defined)
		
		------- * Add as many or as few controls as you need. To add multiples of the same type use "text1, text2..." or "textApples, textBanannas...".
		------- * Dynamically customize text content with property hooks, e.g. <propertyhook:frames.title> pulls in the title property for your frame.
		------- * Spacers can be fixed (px) widths or percentage based.
		------- * Several controls like the navPlay and frameLinks optionally accept object literals to futher define them, see the documentation for more details.
		------- * CSS style your control within the .css file for this template, use .nflb-control-?name? (replace '?name?' with your custom controls id / name */
		
		//#### Top Bar Controls (define in order of appearance)
		a = params.topbarControls = {};
		a.navPrevious = 1;
		a.textIndicator = '<propertyhook:framePos+1> / <propertyhook:frameCount>';
		a.navNext = 1;
		a.hSpacer1 = '100%';
		a.close = '[ Esc ]';  //full view port lightboxes only
		a.expand = 1; //inline lightboxes only - Opens the inline box in a modal window (full browser view port).
		
		//#### Bottom Bar Controls (define in order of appearance)
		a = params.bottombarControls = {};
		a.textTitle = '<propertyhook:frames.title>';
				
		
			/*- frameLinks - several basic options are below, uncomment (remove //) the one you want to try, the if (frameLinks... is there for template demonstation only, OK to remove.
			----- Typical linkContent propertyhook uses are... (frames.myCustomName, framePos, frameID), e.g. linkContent:'<propertyhook:frameID>'*/
			//a.frameLinks = {rows:{all:1, mobile:1}, visibleColumns:{all:10, mobile:7}, flowLTR:false, linkContent:''}; //basic numbered frameLinks
			//a.frameLinks = {rows:1, visibleColumns:7, flowLTR:false, linkContent:'<propertyhook:frameID>'}; //uses the frame id name
			//if (framelinks_type=="thumbnails")
				//a.frameLinks = {rows:1, visibleColumns:8, flowLTR:false, linkContent:{thumbNails:true, width:70, height:60, style:'clip-top'}}; //uses thumbnail images
		
	
	
	/*######## Custom Overlay Controls ########*/
	
		/* --- These controls overlay the content. To show / activate the controls, hover or tap (mobile devices) the content.
		
		------- * There is a grid of nine avaialbe spaces to add overlay controls (top, middle, and bottom rows each with left, center, and right columns).
		------- * Overlay controls must be button based, specify the button image with the 'src' property.
		------- * The button image will be scaled to fit the available overlay space or your maximum size specifications.
		------- * Buttons where the defined minWidth exceeds the available space are hidden.*/
		
		params.overlayShowGrid = false; //Show a grid of button locations to aid in design - set to false before deploying
		params.overlayFillContainer = false; //expand the overlay into the full inner container vs. matching the content dimensions
		params.overlayShowOnMouseOver = true;  //Note: Clicking the frame content hides and shows the overlay in most environments.
		params.overlayShowDelay = 500; //(Milliseconds - 1/1000s)
		params.overlayHideDelay = 250; //(Milliseconds - 1/1000s)
		
		
		//#### 3x3 overlay grid w/ 9 possible button locations - row and column scales should each add up to 3, or use the 'auto' option
		params.overlayRowScale = {top:'auto', middle:1.2, bottom:'auto'}
		params.overlayColumnScale = {left:'auto', center:1.2, right:'auto'}
						
		//#### Add a custom control button to any grid location (use: a.top, a.middle, a.bottom - combine with... position:'left','center','right')
		var maxWH = {all:40, smallMobile:120};
		var maxWH1 = {all:90, smallMobile:270};
		a = params.overlay = {top:{},middle:{},bottom:{}};
		a.top.navPrevious = {position:'left', maxWidth:maxWH, maxHeight:maxWH, minWidth:12, minHeight:12, src:'images_lightbox/nf_lb_overlay_navprevious.png', align:'center center'}
		a.top.navNext = {position:'right', maxWidth:maxWH, maxHeight:maxWH, minWidth:12, minHeight:12, src:'images_lightbox/nf_lb_overlay_navnext.png', align:'center center'}
		a.bottom.close = {position:'right', environment:{smallMobile:true}, maxWidth:180, maxHeight:180, minWidth:12, minHeight:12, src:'images_lightbox/nf_lb_overlay_close.png', align:'top right'}
	
	

	/*######## Custom Animations ########*/

		/* ----- Use the animation params to define full clip and track transitions based on any combination of CSS styles.  For more information
		-------- see the documentation.  You can optionally use the Visual NodeFire software to create timeline animation effects. The generated code
		-------- can be copied from the visual tool and pasted here for use.*/
		

		/* ----- Block Out Background - Show / Hide Animations ----- */
		var boBG = {bgColor:params.blockoutOpacity.rgb||'0,0,0',opacity:params.blockoutOpacity.opacity||.7};
		params.blockoutShow = [[[{backgroundColor:{start:'rgba('+(boBG.bgColor)+',0.0)',end:'rgba('+(boBG.bgColor)+','+boBG.opacity+')'}},{frames:20, reset:false, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-out', opacityInsteadOfRGBAInOldBrowsers:'on'}]]];
		params.blockoutHide = [[[{backgroundColor:{start:'rgba('+(boBG.bgColor)+','+boBG.opacity+')',end:'rgba('+(boBG.bgColor)+',0.0)'}},{frames:20, reset:false, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-out', opacityInsteadOfRGBAInOldBrowsers:'on'}]]];
		
		/* ----- Loading Image - Show / Hide Animations ----- */
		params.loadingImageShow = [[[{opacity:{start:.1,end:1}},{frames:100, reset:false, gpuBoost:false, applytype:'inline', node:'this', ease:'quad-in'}]]];
		params.loadingImageHide = [[[{opacity:{start:1,end:.1}},{frames:100, reset:false, gpuBoost:false, applytype:'inline', node:'this', ease:'quad-out'}]]];
						
		/* ----- Box Container (outer box) - initial / change ----- */
		params.boxInit = [[[{opacity:{start:.1,end:1}},{frames:25, reset:false, gpuBoost:false, applytype:'inline', node:'this', ease:'quad-in'}]]];
		params.boxChange = [[[{minWidth:{start:{refNode:"attr-prev_width", value:'100%'},end:{refNode:'attr-cur_width', value:'100%'}},minHeight:{start:{refNode:"attr-prev_height", value:'100%'},end:{refNode:'attr-cur_height', value:'100%'}}},{frames:50, reset:false, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-out'}]]];
		params.boxCenterChange = [[[{marginTop:{start:{refNode:"attr-prev_topm", value:'100%'},end:{refNode:'attr-cur_topm', value:'100%'}}},{frames:70, reset:false, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-out'}]]];
	
		/* ----- Content Box (inner box) - Show / Hide Animations ----- */			
		params.boxContentShow = [[[{transform:{start:'scale(0)',end:'scale(1)'},opacity:{start:'0',end:'1'}},{frames:40, reset:true, gpuBoost:false, applytype:'inline', node:'this', ease:'quad-out'}]]];
		params.boxContentHide = [[[{transform:{start:'scale(1)',end:'scale(0)'},opacity:{start:'1',end:'0'}},{frames:40, reset:true, gpuBoost:false, applytype:'inline', node:'this', ease:'quad-in'}]]];
		
		/* ----- Content Box (inner box) - Show / Hide Animations [UNIQE FOR MAXIMIZED LIGHTBOXES] ----- */						
		var opValHide = NF.util.browser.getValue({all:{start:'1',end:'0'}, chrome:{}}); //fixes a flicker bug with opacities in chrome
		params.boxContentMaximizedShow = [[[{transform:{start:'scale(.70)',end:'scale(1)'},opacity:{start:'0',end:'1'}},{frames:40, reset:true, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-out'}]]];
		params.boxContentMaximizedHide = [[[{transform:{start:'scale(1)',end:'scale(.70)'},opacity:opValHide},{frames:40, reset:true, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-in'}]]];
			
		/* ----- Top Control Bar - Show / Hide Animations ----- */
		var track1,track2,track3;
		track1 = [[{marginTop:{start:{refNode:'self',value:'100%'},end:'2px'}},{frames:80, reset:true, gpuBoost:false, applytype:'inline' ,node:'this', ease:'cubic-out'}]];
		track2 = [[{opacity:{start:'0',end:'1'}},{frames:60, reset:true, gpuBoost:false, applytype:'inline',node:'this',targetClass:'nflb-topbar-container-inner'}]];
		params.topbarShow = [track1,track2];	
		track1 = [[{marginTop:{start:'2px',end:{refNode:'self',value:'100%'}}},{frames:60, frameAnchorPos:20, reset:true, gpuBoost:false, applytype:'inline' ,node:'this', ease:'cubic-in'}]];
		track2 = [[{opacity:{start:'1',end:'0'}},{frames:60,reset:true, gpuBoost:false, applytype:'inline',node:'this',targetClass:'nflb-topbar-container-inner'}]];
		params.topbarHide = [track1,track2];
		
		/* ----- Bottom Control Bar - Show / Hide Animations ----- */
		track1 = [[{marginTop:{start:{refNode:'self',value:'-100%'},end:'-2px'}},{frames:80, reset:true, gpuBoost:false, applytype:'inline' ,node:'this', ease:'cubic-out'}]];
		track2 = [[{opacity:{start:'0',end:'1'}},{frames:60, reset:true, gpuBoost:false, applytype:'inline', node:'this', targetClass:'nflb-bottombar-container-inner'}]];
		params.bottombarShow = [track1,track2];	
		track1 = [[{marginTop:{start:'-2px',end:{refNode:'self',value:'-100%'}}},{frames:60, reset:true, frameAnchorPos:20, gpuBoost:false, applytype:'inline' ,node:'this', ease:'cubic-in'}]];
		track2 = [[{opacity:{start:'1',end:'0'}},{frames:60, reset:true, gpuBoost:false, applytype:'inline', node:'this', targetClass:'nflb-bottombar-container-inner'}]];
		track3 = [[{opacity:{start:'1',end:'0'}},{frames:2, reset:true, gpuBoost:false, applytype:'inline', node:'this', targetClass:'nflb-control-framelinks'}]];
		(NF.util.browser.chrome)?params.bottombarHide=[track1,track2,track3]:params.bottombarHide=[track1,track2];	
		
		/* ----- Top Control Bar - Show / Hide Animations [UNIQE FOR MAXIMIZED LIGHTBOXES] ----- */
		params.topbarMaximizedShow = [[[{opacity:{start:'0',end:'1'}},{frames:80, reset:false, gpuBoost:false, applytype:'inline', node:'this', targetClass:'nflb-topbar-container-inner', ease:'cubic-in'}]]];	
		params.topbarMaximizedHide = [[[{opacity:{start:'1',end:'0'}},{frames:30, reset:false, gpuBoost:false, applytype:'inline', node:'this', targetClass:'nflb-topbar-container-inner', ease:'cubic-in'}]]];
		
		/* ----- Bottom Control Bar - Show / Hide Animations [UNIQE FOR MAXIMIZED LIGHTBOXES] ----- */
		params.bottombarMaximizedShow = [[[{opacity:{start:'0',end:'1'}},{frames:80, reset:false, gpuBoost:false, applytype:'inline', node:'this', targetClass:'nflb-bottombar-container-inner', ease:'cubic-in'}]]];	
		track1 = [[{opacity:{start:'1',end:'0'}},{frames:30, reset:false, gpuBoost:false, applytype:'inline', node:'this', targetClass:'nflb-bottombar-container-inner', ease:'cubic-in'}]];
		track2 = [[{transform:{start:'scale(1)',end:'scale(0)'}},{frames:30, reset:true, gpuBoost:false, applytype:'inline', node:'this', targetClass:'nflb-control-framelinks'}]];
		(NF.util.browser.chrome)?params.bottombarMaximizedHide=[track1,track2]:params.bottombarMaximizedHide=[track1];	
		
		/* ----- Overlay Control Buttons - Show / Hide Animations ----- */
		//params.overlayShow = [[[{transform:{start:'scale(0)',end:'scale(1)'},opacity:{start:'0',end:'1'}},{frames:60, reset:true, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-out'}]]];
		//params.overlayHide = [[[{transform:{start:'scale(1)',end:'scale(0)'},opacity:{start:'1',end:'0'}},{frames:60, reset:true, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-in'}]]];
		params.overlayShow = [[[{opacity:{start:'0',end:'1'}},{frames:200, reset:true, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-out'}]]];
		params.overlayHide = [[[{opacity:{start:'1',end:'0'}},{frames:200, reset:true, gpuBoost:false, applytype:'inline', node:'this', ease:'cubic-in'}]]];
		
	return params;
}
	
