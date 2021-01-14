function verifPseudo(pseudo)
{
function writediv(texte)
{
document.getElementById('pseudo_box').innerHTML = texte;
}
if(pseudo != '')
{
if(pseudo.length<3)
writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> Ce pseudo est trop court</span>');
else if(pseudo.length>20)
writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> Ce pseudo est trop long</span>');
else if(texte = file('pages/module/verif_pseudo.php?pseudo='+escape(pseudo)))
{
if(texte == 1)
writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> Ce pseudo est deja pris</span>');
else if(texte == 2)
writediv('<span style="color:#1A7917"><b>'+pseudo+' :</b> Ce pseudo est libre</span>');
else
writediv(texte);
}
}
}


function file(fichier)
{
if(window.XMLHttpRequest) // FIREFOX
xhr_object = new XMLHttpRequest();
else if(window.ActiveXObject) // IE
xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
else
return(false);
xhr_object.open("GET", fichier, false);
xhr_object.send(null);
if(xhr_object.readyState == 4) return(xhr_object.responseText);
else return(false);
}