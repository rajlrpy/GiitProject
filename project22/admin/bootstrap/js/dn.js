function clicks(a)
{
document.getElementById('ind1').style.borderBottomColor="black";
document.getElementById('ind2').style.borderBottomColor="black";
document.getElementById('ind3').style.borderBottomColor="black";
document.getElementById('ind4').style.borderBottomColor="black";
document.getElementById(a).style.borderBottomColor="white";
}


function start1()
{
document.getElementById('bt1').style.color="orange";
document.getElementById('bt2').style.color="orange";
document.getElementById('bt3').style.color="orange";
setTimeout(start2,500);
}

function start2()
{
document.getElementById('bt1').style.color="blue";
document.getElementById('bt2').style.color="blue";
document.getElementById('bt3').style.color="blue";
setTimeout(start1,500);
}

