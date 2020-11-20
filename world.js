
window.onload = function()
{
    var lookupbtn = document.getElementById("lookup");
    var cityLookupbtn = document.getElementById("lookupCities");

    lookupbtn.addEventListener("click",search);
    cityLookupbtn.addEventListener("click",searchCity);
}

function search()
{
    var url = "world.php";
    //Get value entered
    searchVal = document.getElementById("country").value 
    AjaxRequest(url,displayResponse,searchVal)
}

function searchCity()
{
    var url = "world.php";
    //Get value entered
    searchVal = document.getElementById("country").value 
    searchVal +="&context=cities"
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
    mess = url+"?country=" + search
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