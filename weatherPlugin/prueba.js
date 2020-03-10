function tiempo(){
    let idApi='vULIFNPmrRouOEKF1dmlxRX3GC0NmHjG'
    let city="Ciudadela"//AKA KUKI
        fetch("http://dataservice.accuweather.com/locations/v1/cities/search?apikey="+idApi+"&q="+city+"&language=es-ES")
        .then(response=>response.json())
        .then(response=>{
            fetch("http://dataservice.accuweather.com/currentconditions/v1/"+response[0].Key+"?apikey="+idApi+"&language=en-US")
            .then(response=>response.json())
            .then(response=>{
                console.log("City: "+city+"\nTiempo: "+response[0].WeatherText)
            })
        })
  
}