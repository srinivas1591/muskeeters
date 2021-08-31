function b1()
{
	document.getElementById('b1').style.textDecoration="underline";
	document.getElementById('b2').style.textDecoration="none";
	document.getElementById('b5').style.display="block";
	document.getElementById('b4').style.display="none";
}

function b2()
{
	document.getElementById('b2').style.textDecoration="underline";
	document.getElementById('b1').style.textDecoration="none";
	document.getElementById('b4').style.display="block";
	document.getElementById('b5').style.display="none";
}


function validate()
{
	const a= document.f.a.value;
	const b= document.f.b.value;
	if((a.trim()).length==0)
	{
		document.getElementById('warning').innerHTML="Username cannot be empty!!!!!";
		document.getElementById('warning').style.display="inline-block";
		return false;
	}
	if((b.trim()).length==0)
	{
		document.getElementById('warning').innerHTML="Password cannot be empty!!!!!";
		document.getElementById('warning').style.display="inline-block";
		return false;
	}
	else
	{

		document.getElementById('warning').style.display="none";
	}
}







function btn2()
{
	document.getElementById('ad').style.textDecoration="underline";
	document.getElementById('as').style.textDecoration="none";
	document.getElementById('doc').style.display="block";
	document.getElementById('staff').style.display="none";
}

function btn3()
{
	document.getElementById('as').style.textDecoration="underline";
	document.getElementById('ad').style.textDecoration="none";
	document.getElementById('staff').style.display="block";
	document.getElementById('doc').style.display="none";
}


function val()
{
	var a=document.f.a.value;
	var b=document.f.b.value;
	var c=document.f.c.value;
	if((a.trim()).length==0 || (b.trim()).length==0 || (c.trim()).length==0)
	{
		document.getElementById('warning').innerHTML="All Fields Are Mandatory!!!!!";
		document.getElementById('warning').style.display="inline-block";
		return false;
	}
}

function val1()
{
	var a=document.g.a.value;
	var b=document.g.b.value;
	if((a.trim()).length==0 || (b.trim()).length==0)
	{
		document.getElementById('warning').innerHTML="All Fields Are Mandatory!!!!!";
		document.getElementById('warning').style.display="inline-block";
		return false;
	}
}

function val2()
{
	var a=document.h.a.value;
	var b=document.h.b.value;
	var c=document.h.c.value;
	var d=document.h.d.value;
	if((a.trim()).length==0 || (b.trim()).length==0 || (c.trim()).length==0 || (d.trim()).length==0)
	{
		document.getElementById('warning').innerHTML="All Fields Are Mandatory!!!!!";
		document.getElementById('warning').style.display="inline-block";
		return false;
	}
	if(c=="Select Branch")
	{
		document.getElementById('warning').innerHTML="Select A Branch!!!!!";
		document.getElementById('warning').style.display="inline-block";
		return false;
	}
}

function validpatient()
{
	var a=document.f.a.value;
	var b=document.f.b.value;
	var a=document.f.c.value;
	if((a.trim()).length==0 || (b.trim()).length==0 || (c.trim()).length==0)
	{
		document.getElementById('warning').innerHTML="All Fields Are Mandatory!!!!!";
		document.getElementById('warning').style.display="inline-block";
		return false;
	}
}