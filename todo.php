<!DOCTYPE html>
<html> 
<script language="javascript" src="jquery-1.8.3.js"></script>
<style type ="text/css">
  div.myList 
	{
		width:480px;
		height:40px;
		padding:10px 0 0 0;
		background-color:#FFFF55;
		border-bottom: 1px solid red;
	}
</style>
<body onload="init()">

<div id = "divHead">
	<a name="top"></a>
	<h1 id = "txtHead">My Todo List</h1>
	<input type="button" id="btnLogin" value="Log in" onclick = "userLogin()" />
	<input type="button" id="btnLogout" value="Log out" onclick = "userLogout()" />
	<input type="button" id="btnRegister" value="Register" onclick = "userRegister()" />
	<br>
	<div id = "divLogin">
	user name: <input type="text"  style="width:80px; height:15px;" id="username" value="PlzLogin" />
	<br>
	password: <input type="password"  style="width:80px; height:15px;" id="passwd" />
	<br>
	<input type="button" id="btnLoginSubmit" value="Submit" onclick = "loginSubmit()" />
	<input type="button" id="btnLoginCancel" value="Cancel" onclick = "loginCancel()" />
	</div>
	<hr>
</div>
<div id = "divViewType">
	<input type="checkbox" id="chkViewType" onclick = "displaySubViewType()" />
	<label id = "labelViewType">View</label>
	<div id = "divSubViewType">
		<input type ="radio"  name = "radViewType" id = "radDay" value ="day" onclick = "showListDay()" /><label> Day </label><br>
		<input type ="radio"  name = "radViewType" id = "radMonth" value ="month" onclick = "showListMonth()" /><label> Month </label><br>
		<input type ="radio"  name = "radViewType" id = "radAll" value ="all" onclick = "showListAll()" /><label> All </label><br>
		<input type ="radio"  name = "radViewType" id = "radSearch" value ="search" onclick = "displayDivSearchList()" /><label> Search </label>
	</div>

	<div id = "divSearchList">

		<label style ="background-color:#FFAA55;">Date From</label>
		<label> m</label>
		<select id = "selFromMonth" onchange = "setFromDate()" >
			<option value = "any">any</option>
			<option value = "Jan">Jan</option>
			<option value = "Feb">Feb</option>
			<option value = "Mar">Mar</option>
			<option value = "Apr">Apr</option>
			<option value = "May">May</option>
			<option value = "Jun">Jun</option>
			<option value = "Jul">Jul</option>
			<option value = "Aug">Aug</option>
			<option value = "Sep">Sep</option>
			<option value = "Oct">Oct</option>
			<option value = "Nov">Nov</option>
			<option value = "Dec">Dec</option>
		</select>

		<label> d</label>
		<select id = "selFromDay" onchange = "setFromDate()">	
		</select>

		<label> y</label>
		<select id = "selFromYear" onchange = "setFromDate()">	
		</select> 
		<label> &nbsp &nbsp </label>
		<label style ="background-color:#FFAA55;">To</label>
		<label> m</label>
		<select id = "selToMonth" onchange = "setToDate()" >
			<option value = "any">any</option>
			<option value = "Jan">Jan</option>
			<option value = "Feb">Feb</option>
			<option value = "Mar">Mar</option>
			<option value = "Apr">Apr</option>
			<option value = "May">May</option>
			<option value = "Jun">Jun</option>
			<option value = "Jul">Jul</option>
			<option value = "Aug">Aug</option>
			<option value = "Sep">Sep</option>
			<option value = "Oct">Oct</option>
			<option value = "Nov">Nov</option>
			<option value = "Dec">Dec</option>
		</select>

		<label> d</label>
		<select id = "selToDay" onchange = "setToDate()">	
		</select>

		<label> y</label>
		<select id = "selToYear" onchange = "setToDate()">	
		</select> 
		<br>
		<label style ="background-color:#FFAA55;">Time From</label>
		<label> Hr</label>
		<select id = "selFromHour" onchange = "setFromTime()">
		</select>
		<label> Min</label>
		<select id = "selFromMin" onchange = "setFromTime()">
		</select>
		<label> &nbsp &nbsp </label>
		<label style ="background-color:#FFAA55;">To</label>
		<label> Hr</label>
		<select id = "selToHour" onchange = "setToTime()">
		</select>
		<label> Min</label>
		<select id = "selToMin" onchange = "setToTime()">
		</select>
		<br>
		<label style ="background-color:#FFAA55;">Subject</label>
		<input type="text"  style="width:80px; height:15px;" id="sSubj" value="" />
		<br>
		<input type="button" id="btnSearch" value="Search" onclick = "showListSearch()" />
	
	</div>
	<br>
	<hr>	
</div>

<div id = "divAddList" style = "width:480px; background-color:#FFFF55; border-bottom:1px solid red;">
	
	<label style ="background-color:#FFAA55;">Set Date</label>
	<label> m</label>
	<!-- I want to use onclick function --> 
    <!-- but some smartphone does not support so I use both onclick and onchange -->
	<select id = "selMonth" onclick = "gotoDate()" onchange = "gotoDate()" style = "border:0px;background-color:#FFFF55">
		<option value = "Jan">Jan</option>
		<option value = "Feb">Feb</option>
		<option value = "Mar">Mar</option>
		<option value = "Apr">Apr</option>
		<option value = "May">May</option>
		<option value = "Jun">Jun</option>
		<option value = "Jul">Jul</option>
		<option value = "Aug">Aug</option>
		<option value = "Sep">Sep</option>
		<option value = "Oct">Oct</option>
		<option value = "Nov">Nov</option>
		<option value = "Dec">Dec</option>
	</select>

	<label> d</label>
	<select id = "selDay" onclick = "gotoDate()" onchange = "gotoDate()" style = "border:0px;background-color:#FFFF55">	
	</select>

	<label> y</label>
	<select id = "selYear" onclick = "gotoDate()" onchange = "gotoDate()" style = "border:0px;background-color:#FFFF55">	
	</select>
	<br>
	<label style ="background-color:#FFAA55;">Set Time</label>
	<label>Hr</label>
	<select id = "selHour" onchange = "setDueTime()" style = "border:0px;background-color:#FFFF55">
	</select>
	<label>Min</label>
	<select id = "selMin" onchange = "setDueTime()" style = "border:0px;background-color:#FFFF55">
	</select>
	<br>
    <br>
    <br>
    <label id = "labelDate" style ="background-color:#FFAA55;"></label>
    <label style ="background-color:#FFAA55;"> &nbsp due on &nbsp </label>
    <label id = "labelTime" style ="background-color:#FFAA55;"></label>
    <br>
	<label style ="background-color:#FFAA55;">Subject</label>
	
	<input type="text"  style="width:100px; height:15px;" id="txtSubj" value="subject" />

	<input type="button" id="btnAdd" value="Add" onclick = "addList()" />
</div>

<div id = "divShowList">
</div>


<script>
var phpServerFile = "todoproc.php";
var username="";
var registerClick = false;
var loginClick = false;

var weekDayName = new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");

//index[0] set to 31 instead of 0 because i use to refer to previous month (dec from last year)
var dayInMonth = new Array(31,31,28,31,30,31,30,31,31,30,31,30,31);

var monthName = new Array("none","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
var monthDayNum = new Array(6);
for (var i = 0;i<=5;i++)
{
    monthDayNum[i] = new Array(7);
}
var currentTotalDayInMonth = 31;

var monthInMonthView,yearInMonthView;

var curentM, currentD, currentY;
var setM, setD, setY;
var fromDate, fromM, fromD, fromY;
var toDate, toM, toD, toY;

var currentHr, currentMin;
var setHr, setMin;
var fromTime, fromHr, fromMin;
var toTime, toHr, toMin;

var listMax = 100;
var listCount = 0;
var listCountDisplay = 0;
var listIDDisplay = new Array(listMax);
var listTmp = "";
var listID = new Array(listMax);
var listSubj = new Array(listMax);
var listDueDate = new Array(listMax);
var listDueTime = new Array(listMax);

var viewType; // "day","month","all","search";

//initial element
function init()
{
	document.getElementById("btnLogout").disabled=true;

	$("#divLogin").slideUp();
	$("#divViewType").slideUp();
	$("#divSubViewType").slideUp();
	$("#divSearchList").slideUp();
	$("#divAddList").slideUp();
	registerClick = false;
	loginClick = false;	
	
	
	$("#selFromDay").append("<option value = any>any</option>");
	$("#selToDay").append("<option value = any>any</option>");

	for (var i = 1; i<=31; i++)
	{
		if (i<10)
		{
			var str = "<option value = 0"+i+">0"+i+"</option>";
		}
		else
		{
			var str = "<option value = "+i+">"+i+"</option>";
		}
		$("#selDay").append(str);
		$("#selFromDay").append(str);
		$("#selToDay").append(str);			
	}

	
	$("#selFromYear").append("<option value = any>any</option>");
	$("#selToYear").append("<option value = any>any</option>");

	var myDate = new Date();

	currentY = myDate.getFullYear();
    
	var tmpY = Number(currentY)-1;

	for (var i = 1; i<=3; i++)
	{
		var str = "<option value = "+tmpY+">"+tmpY+"</option>";
		$("#selYear").append(str);
		$("#selFromYear").append(str);
		$("#selToYear").append(str);
		tmpY = tmpY+1;	
	}

	$("#selFromHour").append("<option value = any>any</option>");
	$("#selToHour").append("<option value = any>any</option>");


	for (var i = 0; i<=23; i++)
	{
		if (i <10)
		{
			var str = "<option value = 0"+i+">0"+i+"</option>";
		}
		else
		{
			var str = "<option value = "+i+">"+i+"</option>";
		}
		$("#selHour").append(str);
		$("#selFromHour").append(str);
		$("#selToHour").append(str);
			
	}

	$("#selFromMin").append("<option value = any>any</option>");
	$("#selToMin").append("<option value = any>any</option>");

	for (var i = 0; i<=50; i = i+10)
	{
		if (i ==0)
		{
			var str = "<option value = 00>00</option>";
		}
		else
		{
			var str = "<option value = "+i+">"+i+"</option>";
		}
		$("#selMin").append(str);
		$("#selFromMin").append(str);
		$("#selToMin").append(str);		
	}

}

function userRegister()
{
	$(document).ready(function()
	{
		$("#divLogin").slideDown();
		document.getElementById("txtHead").innerHTML = "Register";
		document.getElementById("btnLogin").disabled=true;
		registerClick = true;
	});    	
}

function userLogin()
{
	$(document).ready(function()
	{
		$("#divLogin").slideDown();
		document.getElementById("txtHead").innerHTML = "Login";
		document.getElementById("btnRegister").disabled=true;
		loginClick = true;	
	});
}

function loginCancel()
{
	$(document).ready(function()
	{
		$("#divLogin").slideUp();
		registerClick = false;
		loginClick = false;
		document.getElementById("txtHead").innerHTML = "My Todo List";
		document.getElementById("btnRegister").disabled=false;
		document.getElementById("btnLogin").disabled=false;
		document.getElementById("username").value = "PlzLogin";
		document.getElementById("passwd").value = "";
	}); 
}

function userLogout()
{
	$(document).ready(function()
	{
		$("#divLogin").slideUp();
		$("#divViewType").slideUp();
		$("#divSubViewType").slideUp();
		$("#divSearchList").slideUp();
		$("#divAddList").slideUp();
		
		document.getElementById("radMonth").checked = true;
		document.getElementById("chkViewType").checked = false;
		document.getElementById("divShowList").innerHTML = "";
					
		document.getElementById("txtHead").innerHTML = "My Todo List";
		registerClick = false;
		loginClick = false;
		document.getElementById("btnRegister").disabled=false;
		document.getElementById("btnLogin").disabled=false;
		document.getElementById("btnLogout").disabled=true;
		username = "";
		document.getElementById("username").value = "PlzLogin";
		document.getElementById("passwd").value = "";
		document.getElementById("txtSubj").value = "subject"
	});
}

function loginSubmit()
{
	$(document).ready(function()
	{
		var dback;
		var n =  document.getElementById("username").value;
		var p = document.getElementById("passwd").value;
		if (n != "" && p != "")
		{
			if (registerClick)
			{
				var c = 'register';			
			}
			else if (loginClick)
			{
				var c = 'login';
			}

			variableString = '&commnd='+c+'&username='+n+'&passwd='+p;

			$.post
			(
				phpServerFile,
				variableString,
				function(databack,status)
				{
					dback = databack;
					$("#txtHead").html(databack);
  					//alert("Data: " + databack + "\nStatus: " + status);

					if (dback == n)
					{
						setCurrentDateTime();
						$("#txtHead").html("TodoList : "+n);
						window.scrollTo(0,0);
						$("#divLogin").slideUp();
						$("#divViewType").slideDown();
						$("#divAddList").slideDown();
						registerClick = false;
						loginClick = false;
						document.getElementById("btnRegister").disabled=true;
						document.getElementById("btnLogin").disabled=true;
						document.getElementById("btnLogout").disabled=false;
						username = n;
						document.getElementById("labelViewType").innerHTML = "View - Month";
						document.getElementById("radMonth").checked = true;
						getListAll();     
					}
				}
			);					
		}
		else
		{
			$("#txtHead").html("need both username and password");	
		}
		
	});
}

function getListAll()
{
	$(document).ready(function()
	{
		$("#divSearchList").slideUp();
	
		listCount = 0;
		var c = 'getlistall';
		var n = username;

		variableString =  '&commnd='+c+'&username='+n+'&subject='+''+'&duedate='+''+'&duetime='+'';

		$.post
		(
			phpServerFile,
			variableString,
			function(databack,status)
			{
				var str = databack;
				listTmp = str.split("!split!");
				var x =0;

				while ( x< (listTmp.length-1))
				{
					listID[listCount] = listTmp[x];
					listSubj[listCount] = listTmp[x+1];
					var cDate = listTmp[x+2];
					cDate =  cDateSQLToUser(cDate);
					listDueDate[listCount] = cDate;
					listDueTime[listCount] = listTmp[x+3];
					x = x+4;
					listCount = listCount+1;	
				}
				viewType = "month";				    
				showList();
			}
		);
	});
}

function addList()
{
	$(document).ready(function()
	{
		var c = 'addlist';
		var n = username;
		var s =  document.getElementById("txtSubj").value;
		var d = setM+" "+setD+" "+setY;
		d = cDateUserToSQL(d);
		var t = setHr+":"+setMin;

		variableString = '&commnd='+c+'&username='+n+'&subject='+s+'&duedate='+d+'&duetime='+t;
		listCount = 0;
		$.post
		(
			phpServerFile,
			variableString,
			function(databack,status)
			{
  				var str = databack;
				listTmp = str.split("!split!");
				var x =0;

				while ( x< (listTmp.length-1))
				{
					listID[listCount] = listTmp[x];
					listSubj[listCount] = listTmp[x+1];
					var cDate = listTmp[x+2];
					cDate =  cDateSQLToUser(cDate);
					listDueDate[listCount] = cDate;
					listDueTime[listCount] = listTmp[x+3];
					x = x+4;
					listCount = listCount+1;	
				}
				showList();
			}
		);
	});
}

function updateList(id)
{
	$(document).ready(function()
	{
		listCount = 0;
		var c = 'updatelist';
		var n = username;
		var s =  document.getElementById("txtSubjClick"+id).value;
		var d = document.getElementById("txtDueDClick"+id).value;
		d = cDateUserToSQL(d);
		var t = document.getElementById("txtDueTClick"+id).value;
		t = cTimeUserToSQL(t);	
		var i = listID[id];

		variableString = '&commnd='+c+'&username='+n+'&subject='+s+'&duedate='+d+'&duetime='+t+'&idTodo='+i;

		$.post
		(
			phpServerFile,
			variableString,
			function(databack,status)
			{
				var str = databack;
				listTmp = str.split("!split!");
				var x =0;

				while ( x< (listTmp.length-1))
				{
					listID[listCount] = listTmp[x];
					listSubj[listCount] = listTmp[x+1];
					var cDate = listTmp[x+2];
					cDate =  cDateSQLToUser(cDate);
					listDueDate[listCount] = cDate;
					listDueTime[listCount] = listTmp[x+3];
					x = x+4;
					listCount = listCount+1;	
				}
				showList();
			}
		);
	});	
}

function deleteList(id)
{
	$(document).ready(function()
	{
		listCount = 0;
		var c = 'deletelist';
		var n = username;
		var i = listID[id];

		variableString = '&commnd='+c+'&username='+n+'&subject='+''+'&duedate='+''+'&duetime='+''+'&idTodo='+i;


		$.post
		(
			phpServerFile,
			variableString,
			function(databack,status)
			{

				var str = databack;
				listTmp = str.split("!split!");
				var x =0;

				while ( x< (listTmp.length-1))
				{
					listID[listCount] = listTmp[x];
					listSubj[listCount] = listTmp[x+1];
					var cDate = listTmp[x+2];
					cDate =  cDateSQLToUser(cDate);
					listDueDate[listCount] = cDate;
					listDueTime[listCount] = listTmp[x+3];
					x = x+4;
					listCount = listCount+1;	
				}
				showList();
			}
		);		
	});	
}

function editList(id)
{
	var x = 0;
	document.getElementById("btnUpdate"+id).style.visibility = "visible";
	document.getElementById("btnDelete"+id).style.visibility = "visible";
	while (x< listCountDisplay)
	{
		if (listIDDisplay[x] != id)
		{
			document.getElementById("txtDueDClick"+listIDDisplay[x]).value = listDueDate[listIDDisplay[x]];
			document.getElementById("txtDueTClick"+listIDDisplay[x]).value = listDueTime[listIDDisplay[x]];
			document.getElementById("txtSubjClick"+listIDDisplay[x]).value = listSubj[listIDDisplay[x]];
			document.getElementById("btnUpdate"+listIDDisplay[x]).style.visibility = "hidden";
			document.getElementById("btnDelete"+listIDDisplay[x]).style.visibility = "hidden";
		}
		x =x+1
	}	
}

function showList()
{
	switch (viewType)
	{
		case "day":
			showListDay();
			break;
		case "month":
			showListMonth();
			break;
		case "all":
			showListAll();
			break;
		case "search":
			showListSearch();
			break;			
	}
}

function showListDay()
{
	$(document).ready(function()
	{
		$("#divSearchList").slideUp();
		viewType = "day";
		document.getElementById("labelViewType").innerHTML = "View - Day";
		createListElement();
	});
}

function showListMonth()
{
	$(document).ready(function()
	{
		$("#divSearchList").slideUp();
		viewType = "month";
		document.getElementById("labelViewType").innerHTML = "View - Month";
		createListElement();
	});
}

function showListAll()
{
	$(document).ready(function()
	{
		$("#divSearchList").slideUp();
		viewType = "all";
		document.getElementById("labelViewType").innerHTML = "View - All";
		createListElement();
	});
}

function showListSearch()
{
	$(document).ready(function()
	{
		viewType ="search";
		document.getElementById("labelViewType").innerHTML = "View - Search";
		createListElement();
	});
}

function createListElement()
{
	var x = 0;
	listCountDisplay = 0;
	document.getElementById("divShowList").innerHTML = "";

	switch (viewType)
	{
		case "day":
			var d = setM+" "+setD+" "+setY;
			while (x< listCount)
			{
				if (listDueDate[x] == d)
				{
					subCreateListElement(x);
					listIDDisplay[listCountDisplay]=x;
					listCountDisplay = listCountDisplay+1;
				}
				x = x+1;
			}
			break;
            
        case "month":
            monthInMonthView = setM;
            yearInMonthView = setY;
            createMonthElement();
            findWeekDayNumInMonth(monthInMonthView,yearInMonthView);
            setDayNumToMonthElement();
            setListToMonthElement();
            break;
            
        case "all":
            while (x< listCount)
            {
                subCreateListElement(x);
                listIDDisplay[listCountDisplay]=x;
                listCountDisplay = listCountDisplay+1;
                x = x+1;
            }
            break;
            
        case "search":
            var fDate = Number(fromDate);
            var tDate = Number(toDate);
            var fTime = Number(fromTime);
            var tTime = Number(toTime);
            var searchSubj = document.getElementById("sSubj").value;
            while (x< listCount)
            {
                var listDueD = Number(cDateUserToSQL(listDueDate[x]));
                var listDueT = Number(listDueTime[x].substring(0,2)+listDueTime[x].substring(3,5));
                if (listDueD>=fDate && listDueD<=tDate && listDueT>= fTime && listDueT <= tTime && listSubj[x].indexOf(searchSubj) >= 0 )
                {                   
                    subCreateListElement(x);
                    listIDDisplay[listCountDisplay]=x;
                    listCountDisplay = listCountDisplay+1;                                
                }
                x = x+1;
            }
            break;	
        }

}

//create list element for viewType = "day", "all", "search"
function subCreateListElement(x)
{
        		var myID = "divList"+x;
		var myeditList = "editList("+x+")";
		var myupdateList = "updateList("+x+")";
		var mydeleteList = "deleteList("+x+")";

		var divL = document.createElement("div");
		divL.id = myID;
		divL.className = "myList";

		var txtDueDClick = document.createElement("input");
		txtDueDClick.setAttribute("type","text");
		txtDueDClick.setAttribute("id","txtDueDClick"+x);
		txtDueDClick.setAttribute("value",listDueDate[x]);
		txtDueDClick.setAttribute("style","background-color:#FFFF55;border:0px;width:90px;height:15px");
		txtDueDClick.setAttribute("onclick", myeditList);	

		var myBR1 = document.createElement("br");
	
		var txtDueTClick = document.createElement("input");
		txtDueTClick.setAttribute("type","text");
		txtDueTClick.setAttribute("id","txtDueTClick"+x);
		txtDueTClick.setAttribute("value",listDueTime[x]);
		txtDueTClick.setAttribute("style","background-color:#FFFF55;border:0px;width:50px;height:15px");
		txtDueTClick.setAttribute("onclick", myeditList);

		var txtSubjClick = document.createElement("input");
		txtSubjClick.setAttribute("type","text");
		txtSubjClick.setAttribute("id","txtSubjClick"+x);
		txtSubjClick.setAttribute("value",listSubj[x]);
		txtSubjClick.setAttribute("style","background-color:#FFFF55;border:0px;width:120px;height:15px");
		txtSubjClick.setAttribute("onclick", myeditList);

		var btnUpdate = document.createElement("input");
		btnUpdate.setAttribute("type","button");
		btnUpdate.setAttribute("id","btnUpdate"+x);
		btnUpdate.setAttribute("value","Update");
		btnUpdate.setAttribute("style","visibility:hidden;");
		btnUpdate.setAttribute("onclick",myupdateList);

		var btnDelete = document.createElement("input");
		btnDelete.setAttribute("type","button");
		btnDelete.setAttribute("id","btnDelete"+x);
		btnDelete.setAttribute("value","Delete");
		btnDelete.setAttribute("style","visibility:hidden;");
		btnDelete.setAttribute("onclick",mydeleteList);
    
        		divL.appendChild(txtDueDClick);   
		divL.appendChild(txtDueTClick);
		divL.appendChild(txtSubjClick);
		//divL.appendChild(myBR1);
		divL.appendChild(btnUpdate);	
		divL.appendChild(btnDelete);	

		var par = document.getElementById("divShowList");
		par.appendChild(divL);
}

//create list element for viewType = "month"
function createMonthElement()
{
        var divMonth = document.createElement("div");
		divMonth.setAttribute("id","divMonth");
		divMonth.setAttribute("style","width:520px; height:700px; text-align:center;");

		var divCrtlMonth = document.createElement("div");
		divCrtlMonth.setAttribute("id","divCrtlMonth");
		divCrtlMonth.setAttribute("style","width:520px; height:30px;");
		
		var btnPrevMonth = document.createElement("input");
		btnPrevMonth.setAttribute("type","button");
		btnPrevMonth.setAttribute("id","btnPrevMonth");
		btnPrevMonth.setAttribute("value","Prev");
		btnPrevMonth.setAttribute("onclick","gotoPrevMonth()");
		
		var labelMonthName = document.createElement("label");
		labelMonthName.setAttribute("id","labelMonthName");
		labelMonthName.innerHTML = "";		

        var btnNextMonth = document.createElement("input");
		btnNextMonth.setAttribute("type","button");
		btnNextMonth.setAttribute("id","btnNextMonth");
		btnNextMonth.setAttribute("value","Next");
		btnNextMonth.setAttribute("onclick","gotoNextMonth()");
        
        divCrtlMonth.appendChild(btnPrevMonth);   
		divCrtlMonth.appendChild(labelMonthName);
		divCrtlMonth.appendChild(btnNextMonth);
	
        var divWeekDayName = document.createElement("div");	
	    divWeekDayName.setAttribute("id","divWeekDayName");
		divWeekDayName.setAttribute("style","width:520px; height:30px;"); 
        
        for (var i=0;i<=6;i++)
        {
            var myID = "divWeekDayNameD"+i;
            var divWeekDayNameD = document.createElement("div");	
	        divWeekDayNameD.setAttribute("id",myID);
            divWeekDayNameD.setAttribute("style","width:70px; height:30px; float:left; border:1px solid black;"); 
            divWeekDayNameD.innerHTML = weekDayName[i];
            
            divWeekDayName.appendChild(divWeekDayNameD);   
        }
        
        divMonth.appendChild(divCrtlMonth)
        divMonth.appendChild(divWeekDayName);
        
        for (var w=0;w<=5;w++)
        {
            var weekID = "divWeek"+w;
            var divWeek = document.createElement("div");
            divWeek.setAttribute("id",weekID);
            divWeek.setAttribute("style","width:520px; height:102px;"); 
            
            for (var d=0;d<=6;d++)
            {
                var weekDayID = weekID+"Day"+d;
                var divWeekDay = document.createElement("div");	
                divWeekDay.setAttribute("id",weekDayID);
                divWeekDay.setAttribute("style","width:70px; height:100px; float:left; border:1px solid black;");
                var myFn = "dayInMonthClick("+w+","+d+")"
                divWeekDay.setAttribute("onclick",myFn);
                
                var dayNumID = "dayNumWeek"+w+"Day"+d;
                var divDayNum = document.createElement("div");	
                divDayNum.setAttribute("id",dayNumID);
                
                var divTodoListID = "ListWeek"+w+"Day"+d;
                var divTodoList = document.createElement("div");
                divTodoList.setAttribute("id",divTodoListID);
                divTodoList.setAttribute("style","color:#FF0000; text-align:left;");
                
                divWeekDay.appendChild(divDayNum);
                divWeekDay.appendChild(divTodoList);
                
                divWeek.appendChild(divWeekDay); 
            
            }
            
            divMonth.appendChild(divWeek);
        
        }      
       
		var par = document.getElementById("divShowList");
		par.appendChild(divMonth);	
		
}

//find weekday-number for month element 
function findWeekDayNumInMonth(aMonth,aYear)
{
    
    if (isLeapYear(aYear))
    {
        dayInMonth[2]=29;
    }
    else
    {
        dayInMonth[2]=28;
    }
    var m = 0;
    while (monthName[m] != aMonth)
    {
        m = m+1;
    }
    m=m-1;
	var tmpDate = new Date();
	tmpDate.setFullYear(aYear,m,1);
	var weekdayOn1st = tmpDate.getDay();
    
    var weekCount = 0; //6weeks from 0-5
    var weekDayCount = weekdayOn1st; //7days from 0-6
    var dayNum = 1;
    var prevDayNum = dayInMonth[m];
    var dayOnPrevMonth = weekdayOn1st;
    
    if (dayOnPrevMonth == 0)
    {
        dayOnPrevMonth = 7;
        weekCount = 1;
    }
    
    while (dayOnPrevMonth>0)
    {       
        dayOnPrevMonth = dayOnPrevMonth - 1;
        monthDayNum[0][dayOnPrevMonth]=prevDayNum;
        prevDayNum = prevDayNum-1;
        document.getElementById("divWeek0Day"+dayOnPrevMonth).style.backgroundColor = "#CCCCCC";
    }
    var nextMonth = false;
    while (weekCount <= 5 && weekDayCount<= 6)
    {
        monthDayNum[weekCount][weekDayCount] = dayNum;
        if (!nextMonth)
        {
            document.getElementById("divWeek"+weekCount+"Day"+weekDayCount).style.backgroundColor = "#FFFFFF";
        }
        else
        {
            document.getElementById("divWeek"+weekCount+"Day"+weekDayCount).style.backgroundColor = "#CCCCCC";
        }
        weekDayCount = weekDayCount+1;
        if (weekDayCount == 7)
        {
            weekDayCount = 0;
            weekCount = weekCount+1;
        }
        dayNum=dayNum+1;
        if (dayNum > dayInMonth[m+1])
        {
            dayNum = 1;
            nextMonth = true;
        }
    }
}

//set day-number to month element
function setDayNumToMonthElement()
{
        document.getElementById("labelMonthName").innerHTML = "&nbsp &nbsp &nbsp "+monthInMonthView + " "+yearInMonthView+" &nbsp &nbsp &nbsp";
        
        for (var w=0;w<=5;w++)
        {
            for (var wd=0;wd<=6;wd++)
            {
                var myID = "dayNumWeek"+w+"Day"+wd;
                document.getElementById(myID).innerHTML = monthDayNum[w][wd];           
            }
        }
}

//set todoList to month element
//display only 8 characters per list
//if there is more than 3 list in one day display "..." instead
function setListToMonthElement()
{
        for (var w=0;w<=5;w++)
        {
            for (var wd=0;wd<=6;wd++)
            {
                var myID = "ListWeek"+w+"Day"+wd;
                var tmpDate = dayInMonthReturnDate(w,wd);
                var x = 0;
                var listDayDetail = "";
                var listDayCount = 0;
                while (x< listCount && listDayCount<=4)
                {
                    if (listDueDate[x] == tmpDate)
                    {
                        listDayCount = listDayCount+1;
                        if (listDayCount<=3)
                        {   
                            listDayDetail = listDayDetail+listSubj[x].substring(0,8)+"<br>";
                        }
                        if (listDayCount == 4)
                        {
                            listDayDetail = listDayDetail+"...";
                        }    
                    }
                    x = x+1;
                }
                document.getElementById(myID).innerHTML = listDayDetail;           
            }
        }
}

//for button prevMonth in month element
function gotoPrevMonth()
{
   
    var currentMonth =0;
    while (monthName[currentMonth] != monthInMonthView)
    {
        currentMonth = currentMonth+1;
    }
    currentMonth = currentMonth-1;
    if (currentMonth == 0)
    {
        var tmpY = Number(yearInMonthView)-1;
        yearInMonthView = tmpY+"";
        currentMonth =12;
    }
    monthInMonthView = monthName[currentMonth];
    findWeekDayNumInMonth(monthInMonthView,yearInMonthView)
    setDayNumToMonthElement();
    setListToMonthElement()
}

//for button nextMonth in month element
function gotoNextMonth()
{
    
    var currentMonth =0;
    while (monthName[currentMonth] != monthInMonthView)
    {
        currentMonth = currentMonth+1;
    }
    currentMonth = currentMonth+1;
    if (currentMonth == 13)
    {
        var tmpY = Number(yearInMonthView)+1;
        yearInMonthView = tmpY+"";
        currentMonth =1;
    }
    monthInMonthView = monthName[currentMonth];
    findWeekDayNumInMonth(monthInMonthView,yearInMonthView)
    setDayNumToMonthElement();
    setListToMonthElement()
}

//when user click day-cell in month element
//and set viewType = "day"
function dayInMonthClick(w,d)
{
    var dispM = monthInMonthView;
    var dispD = monthDayNum[w][d]+"";
    var dispY = yearInMonthView;
    if (w==0 && dispD>7)
    {
        var currentMonth = 0;
        while (monthName[currentMonth] != monthInMonthView)
        {
            currentMonth = currentMonth+1;
        }
        currentMonth = currentMonth-1;
        if (currentMonth == 0)
        {
            var tmpY = Number(dispY)-1;
            dispY = tmpY+"";
            currentMonth =12;
        } 
        dispM = monthName[currentMonth];       
    }
    
    if (w>=4 && dispD<=14)
    {
        var currentMonth = 0;
        while (monthName[currentMonth] != monthInMonthView)
        {
            currentMonth = currentMonth+1;
        }
        currentMonth = currentMonth+1;
        if (currentMonth == 13)
        {
            var tmpY = Number(dispY)+1;
            dispY = tmpY+"";
            currentMonth =1;
        } 
        dispM = monthName[currentMonth];   
    }
    
    if (dispD.length==1)
    {
        dispD = "0"+dispD;
    }

    viewType = "day";
    document.getElementById("labelViewType").innerHTML = "View - Day";
    document.getElementById("radDay").checked = true;
    setM = dispM;
    setD = dispD;
    setY = dispY;
    document.getElementById("labelDate").innerHTML = setM+" "+setD+", "+setY;
    showList();
    
}

//return date in each day-cell of  month element
//for add list to the cell
function dayInMonthReturnDate(w,d)
{
    var dispM = monthInMonthView;
    var dispD = monthDayNum[w][d]+"";
    var dispY = yearInMonthView;
    if (w==0 && dispD>7)
    {
        var currentMonth = 0;
        while (monthName[currentMonth] != monthInMonthView)
        {
            currentMonth = currentMonth+1;
        }
        currentMonth = currentMonth-1;
        if (currentMonth == 0)
        {
            var tmpY = Number(dispY)-1;
            dispY = tmpY+"";
            currentMonth =12;
        } 
        dispM = monthName[currentMonth];       
    }
    
    if (w>=4 && dispD<=14)
    {
        var currentMonth = 0;
        while (monthName[currentMonth] != monthInMonthView)
        {
            currentMonth = currentMonth+1;
        }
        currentMonth = currentMonth+1;
        if (currentMonth == 13)
        {
            var tmpY = Number(dispY)+1;
            dispY = tmpY+"";
            currentMonth =1;
        } 
        dispM = monthName[currentMonth];   
    }
    
    if (dispD.length==1)
    {
        dispD = "0"+dispD;
    }
    var str = dispM+ " "+dispD+" "+dispY;
    return str;
    
}

function setCurrentDateTime()
{
	var myDate = new Date();
	
	currentM = myDate.getMonth()+1;

	currentD = myDate.getDate();
	if (currentD.length == 1)
	{
		currentD = "0"+currentD;
	}
    currentY = myDate.getFullYear();
	
	//document.getElementById("selDay").selectedIndex = 3;
	document.getElementById("selMonth").value = monthName[currentM];
	document.getElementById("selDay").value = currentD;
	document.getElementById("selYear").value = currentY;
	gotoDate();

	currentHr = Number(myDate.getHours())+"";
	if (currentHr.length ==1)
	{
		currentHr = "0"+currentHr;
	}
	currentMin = (Math.floor(Number(myDate.getMinutes())/10)*10)+"";
	if (currentMin == "0")
	{
		currentMin = "00";
	}
	
	document.getElementById("selHour").value = currentHr;
	document.getElementById("selMin").value = currentMin;
	setDueTime();	

}

function gotoDate()
{
	setM = document.getElementById("selMonth").value;
	setD = document.getElementById("selDay").value;
	setY = document.getElementById("selYear").value;
	
	if (setM =="Jan" || setM =="Mar" || setM =="May" || setM == "Jul" || setM=="Aug" || setM=="Oct" || setM=="Dec" )
	{
		var str = "";
		if (currentTotalDayInMonth !=31)
		{
			switch (currentTotalDayInMonth)
			{
				case 28:
					 str = "<option value = 29>29</option>";
					$("#selDay").append(str);
				case 29:
					str = "<option value = 30>30</option>";
					$("#selDay").append(str);
				case 30:
					str = "<option value = 31>31</option>";
					$("#selDay").append(str);
					break;		
			}
			currentTotalDayInMonth = 31;
		}
	}

	if (setM =="Apr" || setM =="Jun" || setM=="Sep" || setM=="Nov" )
	{
		if (setD>30)
		{
			setD=30;
			 document.getElementById("selDay").value = setD;	
		}

		var str = "";
		switch (currentTotalDayInMonth)
		{
			case 28:
                str = "<option value = 29>29</option>";
				$("#selDay").append(str);
			case 29:
				str = "<option value = 30>30</option>";
				$("#selDay").append(str);
				break;
			case 31:
				$("#selDay option[value='31']").remove();
				break;	
		}
		currentTotalDayInMonth = 30;
	}
	if (setM == "Feb")
	{
		if (isLeapYear(setY))
		{
			if (setD>29)
			{
				setD=29;
				 document.getElementById("selDay").value = setD;	
			}

			switch (currentTotalDayInMonth)
			{
					
				case 31:
					$("#selDay option[value='31']").remove();
				case 30:
					$("#selDay option[value='30']").remove();
					break;
				case 28:
					 str = "<option value = 29>29</option>";
					$("#selDay").append(str);
					break;
			}
			currentTotalDayInMonth = 29;
		}	
		else
		{
			if (setD>28)
			{
				setD=28;
				 document.getElementById("selDay").value = setD;	
			}

			switch (currentTotalDayInMonth)
			{
				case 31:
					$("#selDay option[value='31']").remove();
				case 30:
					$("#selDay option[value='30']").remove();
				case 29:
					$("#selDay option[value='29']").remove();
					break;
			}
			currentTotalDayInMonth = 28;
		}
	}
	document.getElementById("labelDate").innerHTML = setM+" "+setD+", "+setY;
	showList();	
}

function setDueTime()
{
	setHr = document.getElementById("selHour").value;
	setMin = document.getElementById("selMin").value;
	document.getElementById("labelTime").innerHTML = setHr+":"+setMin;
}

function isLeapYear(aY)
{
	var leap = false;
	var y = Number(aY);
	if ((y%400 ==0) || (y%4==0 && y%100 !=0))
	{
		leap = true;
	}
	return leap;  
}

//convert time from user to keep in sql
function cTimeUserToSQL(aTime)
{
	var aT = aTime.split(":");
	var aHr = aT[0].substring(0,2);
	var aMin = aT[1].substring(0,2);
	if (aHr.length == 1)
	{
		aHr = "0"+aHr;
	}
	var myTime = aHr+":"+aMin;
	return myTime;
}

//convert date from sql to user
function cDateSQLToUser(aDate)
{
	var y = aDate.substring(0,4);
	var m = aDate.substring(4,6);
	var d = aDate.substring(6,8);

	switch (m)
	{
		case "01":
			m = "Jan";
			break;
		case "02":
			m = "Feb";
			break;
		case "03":
			m = "Mar";
			break;
		case "04":
			m = "Apr";
			break;
		case "05":
			m = "May";
			break;
		case "06":
			m = "Jun";
			break;
		case "07":
			m = "Jul";
			break;
		case "08":
			m = "Aug";
			break;
		case "09":
			m = "Sep";
			break;
		case "10":
			m = "Oct";
			break;
		case "11":
			m = "Nov";
			break;
		case "12":
			m = "Dec";
			break;
	}

	var myDate = m+ " "+d+" "+y;
	return myDate;
}

//convert date from user to keep in sql
function cDateUserToSQL(aDate)
{
	aDate = aDate.split(" ");
	var m = aDate[0];
	var d = aDate[1];
	var y = aDate[2];

	var m1 = m.substring(0,1);
	var m2 = m.substring(1,3);
	m = m1.toUpperCase()+m2.toLowerCase();
	switch (m)
	{
		case "Jan":
			m = "01";
			break;
		case "Feb":
			m = "02";
			break;
		case "Mar":
			m = "03";
			break;
		case "Apr":
			m = "04";
			break;
		case "May":
			m = "05";
			break;
		case "Jun":
			m = "06";
			break;
		case "Jul":
			m = "07";
			break;
		case "Aug":
			m = "08";
			break;
		case "Sep":
			m = "09";
			break;
		case "Oct":
			m = "10";
			break;
		case "Nov":
			m = "11";
			break;
		case "Dec":
			m = "12";
			break;
		default:
			var i =document.getElementById("selMonth").selectedIndex +1;
			i = i+"";
			if (i.length ==1)
			{
				i = "0"+i;
			}
			m = i;
	}
	
	if (d.length ==1)
	{
		d = "0"+d;
	}
	var myDate = y+m+d;
	return myDate;
}

function displaySubViewType()
{
	$(document).ready(function()
	{
		if (document.getElementById("chkViewType").checked)
		{
			$("#divSubViewType").slideDown();
		}
		else
		{
			$("#divSubViewType").slideUp();
		}
	});
}
function displayDivSearchList()
{
	$(document).ready(function()
	{
	
		$("#divSearchList").slideDown();
		document.getElementById("selFromMonth").value = "any";
		document.getElementById("selFromDay").value = "any";
		document.getElementById("selFromYear").value = "any";
		document.getElementById("selToMonth").value = "any";
		document.getElementById("selToDay").value = "any";
		document.getElementById("selToYear").value = "any";
		document.getElementById("selFromHour").value = "any";
		document.getElementById("selFromMin").value = "any";
		document.getElementById("selToHour").value = "any";
		document.getElementById("selToMin").value = "any";
		document.getElementById("sSubj").value = "";
		setFromDate();
		setToDate();
		setFromTime();
		setToTime();
		
	});
}

//for search function
function setFromDate()
{
	fromM = document.getElementById("selFromMonth").value;
	fromD = document.getElementById("selFromDay").value;
	fromY = document.getElementById("selFromYear").value;

	switch (fromM)
	{
		case "Jan":
			fromM = "01";
			break;
		case "Feb":
			fromM = "02";
			break;
		case "Mar":
			fromM = "03";
			break;
		case "Apr":
			fromM = "04";
			break;
		case "May":
			fromM = "05";
			break;
		case "Jun":
			fromM = "06";
			break;
		case "Jul":
			fromM = "07";
			break;
		case "Aug":
			fromM= "08";
			break;
		case "Sep":
			fromM = "09";
			break;
		case "Oct":
			fromM= "10";
			break;
		case "Nov":
			fromM = "11";
			break;
		case "Dec":
			fromM = "12";
			break;
		case "any":
			fromM = "any";
			break;
			
	}

	fromDate = fromY+fromM+fromD;
	var n = fromDate.indexOf("any");
	if (n!=-1)
	{
		fromDate = "00000000";		
	}

}

//for search function
function setToDate()
{
	toM = document.getElementById("selToMonth").value;
	toD = document.getElementById("selToDay").value;
	toY = document.getElementById("selToYear").value;

	switch (toM)
	{
		case "Jan":
			toM = "01";
			break;
		case "Feb":
			toM = "02";
			break;
		case "Mar":
			toM = "03";
			break;
		case "Apr":
			toM = "04";
			break;
		case "May":
			toM = "05";
			break;
		case "Jun":
			toM = "06";
			break;
		case "Jul":
			toM = "07";
			break;
		case "Aug":
			toM = "08";
			break;
		case "Sep":
			toM = "09";
			break;
		case "Oct":
			toM = "10";
			break;
		case "Nov":
			toM = "11";
			break;
		case "Dec":
			toM = "12";
			break;
		case "any":
			toM = "any";
			break;
			
	}

	toDate = toY+toM+toD;
	var n = toDate.indexOf("any");
	if (n!=-1)
	{
		toDate = "99999999";		
	}

}

//for search function
function setFromTime()
{
	fromHr = document.getElementById("selFromHour").value;
	fromMin = document.getElementById("selFromMin").value;

	fromTime = fromHr+fromMin;
	var n = fromTime.indexOf("any");
	if (n!=-1)
	{
		fromTime = "0000";		
	}
	
}

//for search function
function setToTime()
{
	toHr = document.getElementById("selToHour").value;
	toMin = document.getElementById("selToMin").value;

	toTime = toHr+toMin;
	var n = toTime.indexOf("any");
	if (n!=-1)
	{
		toTime = "9999";		
	}
	
}

</script>
</body>
</html>
