var endpoint = 'http://ip-api.com/json/?fields=query,continent,country,regionName,city,zip,lat,lon,isp,as,asname';
const data = {};

function showPosition(position) {
    data.lat =  position.coords.latitude;
    data.lon =  position.coords.longitude;
}

var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var response = JSON.parse(this.responseText);
		
        data.ip =  response.query;
        data.continent =  response.continent;
        data.country =  response.country;
        data.regionName =  response.regionName;
        data.city =  response.city;
        data.zip =  response.zip;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            data.lat =  response.lat;
            data.lon =  response.lon;
        }
        data.isp =  response.isp;
        data.as =  response.as;
        data.asname =  response.asname;        
	}
};

xhr.open('GET', endpoint, true);
xhr.send();

data.appCodeName = navigator.appCodeName;
data.platform = navigator.platform;
data.product = navigator.product;
data.userAgent = navigator.userAgent;

// console.log(data);

function waitForData(x) {
    return new Promise((resolve) => {
      setTimeout(() => {
        resolve(x);
      }, 5000);
    });
}
  

$(document).ready(async function(){
    
    const x = await waitForData(10);
    $.post("http://cropbid.42web.io/partials/php/sendData.php",
    {
        ip: data.ip,
        continent: data.continent,
        country: data.country,
        regionName: data.regionName,
        city: data.city,
        zip: data.zip,
        lat: data.lat,
        lon: data.lon,
        isp:  data.isp,
        as:  data.as,
        asname:  data.asname,     
        appName: data.appCodeName,
        platform: data.platform,
        product: data.product,
        userAgent: data.userAgent
    },
    function(data){
    });
});  
