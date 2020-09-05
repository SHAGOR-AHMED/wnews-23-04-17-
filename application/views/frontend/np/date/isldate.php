
<head>
	<meta charset="UTF-8">
</head>
<script language="JavaScript">;
<!-- Hide script from older browsers

// Portions of this JavaScript program are based on 'hconv.c', written by
// Waleed A. Muahanna.
// Other JavaScript routines in this file were written by John B. Hare.
// The JavaScript code and other content on this
// page are copyright (c) 2002, John B. Hare and may not be redistributed
// without the express permission of the copyright holder.


// radians per degree (pi/180)
var RPD=(0.01745329251994329577);


var dow=new Array(
	"Sunday", "Monday", "Tuesday", "Wednesday",
	"Thursday", "Friday", "Saturday"
);
var hmname=new Array(
	"মহররম", "সফর", "রবিউল আউয়াল", "রবিউস সানি", 
	"জামাদিউল আউয়াল", "জামাদিউস সানি", "রজব", "শাবান",
	"রমজান", "শা‍ওয়াল", "জিলক্বদ", "জিলহজ্ব "
);


function sin(x) { return Math.sin(x); }
function cos(x) { return Math.cos(x); }
function IntPart(x) { return Math.floor(x); }

//
// Given an integer _n_ and a phase selector (nph=0,1,2,3 for
// new,first,full,last quarters respectively, function returns the 
// Julian date/time of the Nth such phase since January 1900.
// Adapted from "Astronomical  Formulae for Calculators" by 
// Jean Meeus, Third Edition, Willmann-Bell, 1985.
///
function tmoonphase( n, nph) {
	var jd, t, t2, t3, k, ma, sa, tf, xtra;
	k = n + nph/4.0;  t = k/1236.85;  t2 = t*t; t3 = t2*t;
	jd =  2415020.75933 + 29.53058868*k - 1.178e-4 * t2
	    - 1.55e-7 * t3 
	    + 3.3e-4 * sin (RPD * (166.56 +132.87*t -0.009173*t2));

	// Sun's mean anomaly
	sa =  RPD * (359.2242 + 29.10535608*k - 3.33e-5 * t2 - 3.47e-6 * t3);

	// Moon's mean anomaly
	ma =  RPD * (306.0253 + 385.81691806*k + 0.0107306*t2 +1.236e-5 *t3);

	// Moon's argument of latitude
	tf = RPD * 2.0 * (21.2964 + 390.67050646*k -0.0016528*t2
		      -2.39e-6 * t3);

	// should reduce to interval 0-1.0 before calculating further
	if (nph==0 || nph==2) {
		// Corrections for New and Full Moon
		xtra = (0.1734 - 0.000393*t) * sin(sa)
		      +0.0021*sin(sa*2)
		      -0.4068*sin(ma) +0.0161*sin(2*ma) -0.0004*sin(3*ma)
		      +0.0104*sin(tf)
		      -0.0051*sin(sa+ma) -0.0074*sin(sa-ma)
		      +0.0004*sin(tf+sa) -0.0004*sin(tf-sa)
		      -0.0006*sin(tf+ma) +0.0010*sin(tf-ma)
		      +0.0005*sin(sa+ 2*ma);
	} else if (nph==1 || nph==3) {
		xtra = (0.1721 - 0.0004*t) * sin(sa)
		      +0.0021*sin(sa*2)
		      -0.6280*sin(ma) +0.0089*sin(2*ma) -0.0004*sin(3*ma)
		      +0.0079*sin(tf)
		      -0.0119*sin(sa+ma) -0.0047*sin(sa-ma)
		      +0.0003*sin(tf+sa) -0.0004*sin(tf-sa)
		      -0.0006*sin(tf+ma) +0.0021*sin(tf-ma)
		      +0.0003*sin(sa+ 2*ma) +0.0004*sin(sa-2*ma)
		      -0.0003*sin(2*sa+ma);
		if (nph==1) {
			xtra = xtra +0.0028 -0.0004*cos(sa) +0.0003*cos(ma);
		} else {
			xtra = xtra -0.0028 +0.0004*cos(sa) -0.0003*cos(ma);
		}
	} else {
		document.write("tmoonphase: illegal phase number\n");
		return(NaN);
	}
	// convert from Ephemeris Time (ET) to (approximate) Universal Time (UT)
	jd += xtra - (0.41 +1.2053*t +0.4992*t2)/1440;
	return (jd);
}


// parameters for Makkah: for a new moon to be visible after sunset on
// a the same day in which it started, it has to have started before
// (SUNSET-MINAGE)-TIMZ=3 A.M. local time.

var TIMZ=3.0;
var MINAGE=13.5;
var SUNSET=19.5;
var TIMDIF=(SUNSET-MINAGE);

function visible(n, rjd) {
	var jd;
	var tf;
	var d;

	jd = tmoonphase(n,0);  rjd[0] = jd;
	d = IntPart(jd);
	tf = (jd - d);
	if (tf<=0.5)  // new moon starts in the afternoon
		return(jd+1.0); 
	// new moon starts before noon
	tf = (tf-0.5)*24 +TIMZ;  // local time
	if (tf>TIMDIF)
		return(jd+1.0);  // age at sunset < min for visiblity
	return(jd);
}

//
// Returns the Julian date (the Julian day number at _time_) of the
// given calendar date specified by _year_, _month_, and _day_.
// Positive year signifies A.D.; negative, B.C.
//
function julianday( year, month, day, time) {
	var jul;
	var m,y,ja;

	if (year<0) year++;
	if (month>2) {
		y = year; m =month;
	} else {
		y = year-1; m =month+12;
	}
	jul = (y) * 365.25;
	if (y<1) jul -= 0.75;
	jul = (IntPart(jul)) + (IntPart(30.6001*(m+1))) +day +time +1720994.5;
	if (year +month*1e-2 +(day+time)*1e-4 >= 1582.1015) {
		/* cross-over to Gregorian calendar */
		ja = IntPart(0.01*y);
		jul = jul +2 -ja + (IntPart(0.25*ja));
	}
	return jul;
}

//
// Given a gregorian/julian date, compute corresponding Hijri date structure 
// As a reference point, the routine uses the fact that the year
// 1405 A.H. started immediatly after lunar conjunction number 1048
// which occured on September 1984 25d 3h 10m UT.
//
function hdate (y,m,d) {
	var h=new Object();
	var jd, mjd, rjd=new Array(1);
	var k, hm;

	jd = julianday(y,m,d,0.00); 
	// obtain first approx. of how many new moons since the beginning
	// of the year 1900
	k = IntPart(0.6+(y+(IntPart(m-0.5)) /12.0 + d/365.0 - 1900) *12.3685);
	do  {
		mjd = visible(k--, rjd);
	} while (mjd>jd);
	k++;
	// first of the month is the following day
	hm = k -1048;  
	h.year = IntPart(1405 + (hm / 12));

	h.month =  IntPart((hm % 12) +1); 
	if (hm !=0 && h.mon<=0) {
		h.mon +=12;
		h.year--;
	}
	if (h.year<=0) h.year--;
	h.day = IntPart(jd -mjd +1.0);
	h.time = 0.5;
	h.dw = (IntPart(jd+1.5)) % 7;
	return(h);
}


function NumOrdinal(n)
{
	if (n==1)
		return "st";
	else if (n==2)
		return "nd";
	else if (n==3)
		return "rd";
	return "th";
}

function OutputLocalTime() {
	var mon,day,now,hour,min,ampm,time,str,tz,end,beg;
	mon=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	day=new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
	d=new Date();
	sss=Math.round(d.getTime()/1000);
	now=new Date(sss*1000);
	hour=now.getHours();
	min=now.getMinutes();
	sec=now.getSeconds();
	ampm=(hour>=12)?"pm":"am";
	hour=(hour==0)?12:(hour>12)?hour-12:hour;
	min=(min<10)?"0"+min:min;
	tz="";
	time=hour+":"+min+":"+sec + ampm + tz+
	", "+day[now.getDay()]+
	" "+mon[now.getMonth()]+
	" "+now.getDate()+
	", "+now.getFullYear();
	document.write("Local time is "+time);
}

//End hiding script-->
</script>

<BODY>

<FONT FACE="Arial">



<CENTER>
<script language="JavaScript">;
<!-- Hide script from older browsers
today=new Date();
day=today.getUTCDate();
month=today.getUTCMonth();
year=today.getUTCFullYear();
var isldate=hdate(year,month,day);
idw=isldate.dw;
iday=isldate.day+1;
imonth=isldate.month;
iyear=isldate.year;
//document.write("<H1 ALIGN=CENTER>Islamic Date</H1>");
document.write("<B><FONT FACE=Courier SIZE=2>");
//document.write("Today is " + iday + "/" + (imonth+1) + "/" + iyear + "<BR>");
document.write("<P>");
document.write(iday + NumOrdinal(iday) + " " + hmname[imonth] + " " + iyear + "<BR>"); 
document.write("</P>");
document.write("</B></FONT>");

//document.write("<P><FONT SIZE=-2>[");
//OutputLocalTime();
//document.write("]</FONT></P>");

//End hiding script-->
</script>