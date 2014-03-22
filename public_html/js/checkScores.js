var hole1 = getElementByName("hole1");
var hole2 = getElementByName("hole2");
var hole3 = getElementByName("hole3");
var hole4 = getElementByName("hole4");
var hole5 = getElementByName("hole5");
var hole6 = getElementByName("hole6");
var hole7 = getElementByName("hole7");
var hole8 = getElementByName("hole8");
var hole9 = getElementByName("hole9");
var hole10 = getElementByName("hole10");
var hole11 = getElementByName("hole11");
var hole12 = getElementByName("hole12");
var hole13 = getElementByName("hole13");
var hole14 = getElementByName("hole14");
var hole15 = getElementByName("hole15");
var hole16 = getElementByName("hole16");
var hole17 = getElementByName("hole17");
var hole18 = getElementByName("hole18");

function checkScores()
{
	if(IsNumeric(hole1) && IsNumber(hole2) && IsNumber(hole3) && IsNumber(hole4) && IsNumber(hole5) && IsNumber(hole6) && IsNumber(hole7) && IsNumber(hole8) && IsNumber(hole9) && IsNumber(hole10) && IsNumber(hole11) && IsNumber(hole12) && IsNumber(hole13) && IsNumber(hole14) && IsNumber(hole15) && IsNumber(hole16) && IsNumber(hole17) && IsNumber(hole18)) 
	{
		document.write('<p>all are numbers</p>');
	}
}