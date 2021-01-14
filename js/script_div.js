function visibilite(thingId)
{
 var i;
 var targetElement;
 targetElement = document.getElementById("divid" + thingId) ;
 if ( targetElement.style.display == "none")
     targetElement.style.display = "" ;
 else
     targetElement.style.display = "none" ;
}