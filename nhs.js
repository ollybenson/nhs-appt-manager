function accordion(id) {
    var x = document.getElementById('content-' + id);
	var y = document.getElementById('accordion-' + id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
		y.className = "fa fa-minus-square-o";
    } else { 
        x.className = x.className.replace("w3-show", "w3-hide");
		y.className = "fa fa-plus-square-o";

    }
}
var people = ['Olly','Jamie','Jessica'];
var daysOfWeek = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
var monthsOfYear = ['January','February','March','April','May','June','July','August','September','October','November','December'];
var presetNotices = {
	dna:'If you do not attend for your appointment without notifying us beforehand you may be discharged back to your doctor.',
	pregnant : 'Please notify us at the appointment if you are, or think you are, pregnant.',
	pregnantBefore : 'Please contact us prior to the appointment if you are, or think you are, pregnant.',
	breastfeeding : 'Please notify us at the appointment if you are currently breastfeeding a baby.',
	medicines : 'Please bring all medicines that you are currently taking, in their original containers.',
	medicinesList : 'Please bring a list of all medicines, including dosages, that you are currently taking.',
	late : 'If you are more than 10 minutes late then you will not be seen and will need to book a new appointment.  This excludes patients who have booked transport through us.',
	details : 'Please check in at reception and make sure we have your up-to-date personal details, such as your address, phone number and the name and address of your GP.',
	letter : 'Please bring the appointment letter with you when you come to your appointment.'};
var colours = {
	acute: 'light-blue',
	primary: 'deep-purple',
	pharmacy: 'green'
	};
var appointmentTypes = {
	outpatientAppointment: 'outpatient appointment'
	};

	
// GENERAL
	
function makeIfEmpty(v,f,e) {
	if (v && v.length) return f;
		else return e;
	}

function makeLinkable(label,url) {
	output = '';
	if (label) {
		if(url) output = "<a href='" + url +"'>" + label + "</a>"
			else output = label;
			}
	return output;
	}
	
function makeObject(label,url) {
	output = '';
	if (label) output = "<p>" + makeLinkable(label,url) + "</p>";
	return output;
	}
		
function makePerson(n,u) {
	return makeObject(n,u);
	}	

function makeRole(n,u) {
	return makeObject(n,u);
	}	

function makeOrg(n) {
	return makeObject(n,null);
	}	

function makeDepartment(d) {
	if (d) return d + ", ";
		else return "";
	}
	
	
function makeAddress(add) {
	var r = "";
	add.forEach(function(l) {
		r+= l + ", ";
		});
	return r;
	}	
	
function makePrettyAddress(w) {
	return makeAddress(w.address) + w.postcode + "</p><p class='w3-center'><a class='w3-button w3-blue' href='https://www.google.com/maps/search/?api=1&query=" + w.postcode + "'>Find on map</a>";
	}	
	
function makeTelephone(t) {
	var linkNo = "+44" + t.substr(1);
	return "<a href='tel:" + linkNo +"'>" + t + "</a>"; 
	}
	
function makeTelephones(t) {
	if (Array.isArray(t)==false) {
		return makeTelephone(t);
		}
		else {
			output = "";
			t.forEach(function(val) {				
				output+=makeTelephone(val) +" or ";
				});	
			return output.substr(0,output.length-4);
		}	
	}
	
function makeMessageList(l) {
	var list = [];
	l.forEach(function(v) {
		if (presetNotices[v]) list.push(presetNotices[v]);
			else list.push(v);
			});
	return list;
	}
	
function makeList(l) {
	var output = "";
	if (l) {
		var list = ""
		l.forEach(function(v) {
			if (v) list+="<li>" + v + "</li>";
			});
		if (list) return "<ul class='w3-ul' style='list-style-type: square; list-style-position: inside;'>" + list + "</ul>";
		}
	if (output) return output;
		else return "";
	}


function makeMiniCard(h,c,hc,cc) {
	return makeCard(h,c,hc,cc,"w3-third");
	}
	
function makeCard(h,c,hc,cc,t) {
	if (!t) t = "";
	if (!hc) hc = 'dark-gray';
	if (!cc) cc = 'light-gray';
	
	return "<div class='w3-container w3-margin-bottom " + t +"'><h3 class='w3-" + hc + " w3-large w3-padding'>" + h + "</h3><div class='w3-padding w3-" + cc +"'>" + c + "</div></div>";
	}	
	
function showMessages(type,a,d,e,s) {
	if (!d) d="dark-gray";
	if (!e) e="light-gray";
	if (a) {
		a = makeMessageList(a);
		return makeCard(type,makeList(a),d,e,s);
		}
		else return "";
	}


// DATE AND TIME
	
function makeDate(d) {
	if (d) return daysOfWeek[d.getDay()] + " " 
		+ d.getDate() + " "
		+ monthsOfYear[d.getMonth()] + " " 
		+ d.getFullYear();
		else return "";
	}
	
function makeShortDate(d) {
	if (d) return daysOfWeek[d.getDay()].substr(0,3) + " " 
		+ d.getDate() + " "
		+ monthsOfYear[d.getMonth()].substr(0,3);
		else return "";
	}	
	
function makeTime(d) {
	m = (d.getHours()*60) + d.getMinutes()
	if (m>0) return d.toLocaleTimeString('en-GB',{hour12:true}).replace(/([\d]+:[\d]{2})(:[\d]{2}) (.*)/, "$1$3");
		else return "";
	}	

function makePrettyTime(a) {
	return "Your appointment is on <b>" + makeDate(a) + "</b> at <b>" + makeTime(a) + "</b>.";
	}

	
// APPOINTMENTS
	
function makeAppointmentType(t) {
	if (appointmentTypes[t]) return appointmentTypes[t];
		else return t;
	}

function minusTime(t,m) {
	return new Date(t - (m * 60 * 1000));
	}	

function makearriveBefore(b) {
	if (b) return " You should arrive <b>" + b + " minutes</b> before your appointment.";
		else return "";
	}

function makeDuration(d) {
	if (d) return "<p>Your appointment should last no longer than " + d + " minutes, although this can not always be guaranteed.</p>";
		else return "";
	}

function makeBookBefore(a,b) {
	if (b!=null) {
		d = minusTime(a,b*60);
		return " before " + makeTime(d) + " on " + makeDate(d);
		}
		else return "";
	}

function showAppointmentHeader(t,n,v,d,i,s,c) {
	var isShow = 'plus';
	let m;
	if (t=='advice') m = "Recommended for you in " + monthsOfYear[d.getMonth()] + "...";
		else m = "<span class='w3-hide-medium w3-hide-large'>" + makeShortDate(d) + "</span><span class='w3-hide-small'>"
		+ makeDate(d) + "</span> "
		+ makeTime(d);
	if (s=="isHide") isShow = 'minus';
	return "<div class='w3-display-container w3-" + c + " w3-padding-16' onclick='accordion(\"" + i + "\");'><h3 id='theDate' class='w3-container w3-large'>" 
		+ m +
		"</h3><h2 class='w3-xxlarge w3-container'>" 
		+ n + "</h2><h3 id='theVenue' class='w3-container w3-large'>" + v + "</h3><div class='w3-margin-top w3-margin-right w3-display-topright w3-xxlarge'><span id='accordion-" + i + "' class='fa fa-" + isShow + "-square-o'></span></div></div>"
	}
	
function showAbout(t, w,r,s) {
	var output = [];
	
	if (r && r.length) output.push("You have been referred to us by " + r);
	if (w.about && w.about.length) output.push(w.about);
	if (w.moreInfoURL && w.moreInfoURL.length) {
		output.push("More information about your " + makeLinkable(w.simpleName,w.moreInfoURL));
		}
	if (output.length>0) return showMessages('About your ' + makeAppointmentType(t),output,null,null,s);
		else return "";
	}
	
	
function showChange(a,b) {
	var c="";
	if (b) {
		c = "<br>When you contact them, you'll probably need your hospital number, which is <b>" + b + "</b>.";
		}
	if (a && a.telephone && a.telephone.length) {
		return makeCard("Changing or cancelling your appointment", "If you need to change or cancel your appointment, please contact " + makeTelephones(a.telephone) +" at the earliest opportunity, so the appointment can be given to someone else." + c);
		}
		else return "";
	}
	
function showTransport(a,t) {
	if (t && t.length) {
		return makeCard("Transport to your appointment","If you need to book patient transport to get your appointment, please contact " + makeTelephones(t.telephone) +  makeBookBefore(a,t.bookBefore));
		}
		else return "";
	}
	
function showWhere(w,n) {
	if (n) n=n + ", ";
	return makeCard("Where", makeDepartment(w.department) + n + makePrettyAddress(w),null,null,'w3-third');
	}	
	
function showWhen(w,a) {
	return makeMiniCard("Date &amp; Time", makePrettyTime(a) + makearriveBefore(w.arriveBefore));
	}		

function showWho(w) {
	var m = "";
	if (w.orTeam) m = " or a member of their team"
	var p = makeLinkable(w.personName,w.personURL) + m;
	var r = makeLinkable(w.role,w.roleURL);
	var o = makeLinkable(w.orgName,w.orgURL);
	if (p!="" && r!="") var output = p + ", " + r;
	if (p!="" && r=="") var output = p;
	if (p=="" && r!="") var output = "A " + r;
	if (p=="" && r=="") var output = "";
	if (o!="") {
		if (p) output += " at " + o;
			else if (r) output += " from " + o;
			else output = '';
		}			
	
	if (output!="") return makeMiniCard("Who you are seeing",output);
		else return '';

	}
	
function showMeta(m) {
	if (m) return "<div class='w3-container w3-text-grey w3-small w3-margin-top w3-padding w3-border-top'>" +
		makeIfEmpty(m.dateIssued,"Date Issued: " + makeDate(new Date(m.dateIssued)) + "</br>","") +
		makeIfEmpty(m.dateUpdated,"Date Updated: " + makeDate(new Date(m.dateUpdated)) + "</br>","") +
		makeIfEmpty(m.clinicId,"Clinic ID: " + m.clinicId,"") +
		"</div>";
		else return "";
	}
	





	

	
	
function previousPerson(n) {
	n = Number(n);
	n-=1;
	if (n<0) n = Number(people.length)-1;
	return n;
	}

function nextPerson(n) {
	n = Number(n);
	n+=1;
	if (n==(Number(people.length))) n = 0;
	return n;
	}	



getTheData(0);	


function getTheData(thePerson) {	
	personName = people[thePerson];
	$.getJSON( "default.php", function(data) {
		displayThePerson(data['appointments'],personName);
		displayPreviousNext(thePerson);
		getTheAppointment(data['appointments'],personName);
		});
	}	
	
function displayThePerson(defaults,personName) {
	$.getJSON( "data.php?" + personName, function( data ) {
		console.log(data);
		if(data.person.name) $('#personName').text(data.person.name);
		$('#personName').attr('personNumber',0);
		if(data.person.nhsNumber) $('#nhsNumber').html("NHS Number: <b>" + data.person.nhsNumber +"</b>");
		});
	}

function displayPreviousNext(thePerson) {	
	$('#previousPerson').attr('onclick',"getTheData(" + previousPerson(thePerson) + ");");
	$('#nextPerson').attr('onclick',"getTheData(" + nextPerson(thePerson) + ");");
	}	
	
function getTheAppointment(defaults,personName) {
	$.getJSON( "data.php?" + personName, function( data ) {
	var orderedItems = [];
	$('#appointments').html("");
	
	$.each(data.appointments,function( key, v ) {
		orderedItems.push([key,new Date(v.when.dateTime)]);
		});
		orderedItems.sort(function(a, b) {
		return a[1] - b[1];
		});

	  var items = [];
	  $.each(orderedItems,function( key, w ) {
		var v = Object.assign({}, defaults, data.appointments[w[0]]);

		
		var a = new Date(v.when.dateTime);
		var d = a;
		if (v.when.arriveBefore) d = minusTime(a.getTime(),v.when.arriveBefore);
		var isShow = 'hide';
		// if (w[0]==1) isShow = 'show';
			
		var colour = colours[v.meta.orgType];
		
		let when = '';
		let who = '';
		let where = '';
		let whereName = '';
		let about = '';
		
		if (v.meta.type!='reminder') {
			when = showWhen(v.when,a);
			who = showWho(v.who);
			}
			else whereName = v.who.orgName;
		if (v.where.address) where = showWhere(v.where,whereName);
		
		if (v.meta.type=='reminder' || v.meta.type=='advice') {
			if (where) cells = showAbout(v.meta.type, v.what, v.referredBy,'w3-twothird') + where;
				else cells = showAbout(v.meta.type, v.what, v.referredBy);
			about = "";
			}
			else {
				cells = when + where + who;
				about = showAbout(v.meta.type, v.what,v.referredBy);
				}
				
		var whoHeader = v.who.orgName;
		if (v.where.venueName) whoHeader = v.where.venueName;
		
		items.push(
			"<div class='w3-card w3-margin-bottom'>" + showAppointmentHeader(v.meta.type,v.what.simpleName,whoHeader,d,w[0],isShow,colour) +
			"<div id='content-" + w[0] + "' class='w3-" + isShow +" w3-white'>" + 
			"<div class='w3-row-padding w3-padding-16 w3-border-bottom w3-border-light-gray'>" +
			cells +
			"</div>" +
			about +
			showMessages("Important information",v.notices.warnings,"orange","pale-yellow") +
			showTransport(a,v.transport) +
			showMessages("Before the appointment",v.notices.before) +
			showMessages("At the appointment",v.notices.during) +
			showMessages("After the appointment",v.notices.after) +
			showChange(v.amend, v.meta.hospitalNumber) +
			showMeta(v.meta) +
			"</div></div>"
			);
	  });
	 
	  $( "<ul/>", {
		"class": "w3-ul w3-padding-16",
		html: items.join( "" )
	  }).appendTo( "#appointments" );
	});
	window.setTimeout(function() {
	$("#launch").fadeOut(1000);
	},20);
	}


	
$(function(){
  $( "#header" ).on( "swiperight", swiperightHandler);
  $( "#header" ).on( "swipeleft", swipeleftHandler);
 
  function swiperightHandler( event,n ){
	n = $('#personName').attr('personNumber');
	getTheData(previousPerson(n));

  }
  
  function swipeleftHandler( event,n ){
	n = $('#personName').attr('personNumber');
	getTheData(nextPerson(n));
  }
  });

  
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.minWidth = "300px";  
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").onclick = function() { w3_close() };;
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
  document.getElementById("openNav").onclick = function() { w3_open() };;
}  