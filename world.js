
window.onload = function()
{
    var lookupbtn = document.getElementById("lookup");
    lookupbtn.addEventListener("click",search);
}

function search()
{
    var url = "world.php";
    //Get value entered
    searchVal = document.getElementById("country").value 
    AjaxRequest(url,displayResponse,searchVal)
}


function AjaxRequest(url,func,search)
{
    var httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = function(Event){
        if (httpRequest.readyState === XMLHttpRequest.DONE)
    {
        if (httpRequest.status === 200)
        {
            func(httpRequest.responseText)
        }
        else 
        {
            alert("There was a problem with the request")
        }
    }
    };
    mess = url+"?query=" + search
    httpRequest.requestType = "json"
    httpRequest.open("GET", mess);
    httpRequest.send();
}

function displayResponse(message)
{
    var resText = document.getElementById("result");
    resText.innerHTML = message
    //alert(message);
}

function displaySuperheroes(superhero,search)
{
    var search = document.getElementById("result");
    var supImg = document.getElementById("supImg"); 
    supImg.style.opacity = 1
    search.innerHTML = superhero

}