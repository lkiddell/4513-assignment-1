function loaded()
{
    var list = document.querySelectorAll("select#continents");
	//console.log(list.length);
	for(var i = 0; i < list.length; i++)
	{
		list[i].addEventListener("change", change);
	}
}

function change(e)
{
	//console.log();
	var e = e.target;
	var lastNode = e.nextSibling;
	var eName = e.options[e.selectedIndex].text;
}