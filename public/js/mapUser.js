function dataUserMap() {
    const endereco = $("#endereco").val();
    const number = $("#number").val();
    const bairro = $("#bairro").val();
    const uf = $("#uf").val();

    const uluru = { lat: -25.344, lng: 131.031 };

    const mapOptions = {
        zoom: 10,
        center: uluru,
        mapTypeId: 'roadmap', // roadmap, satellite, hybrid, terrain
        mapTypeControlOptions: {
            mapTypeIds: ['roadmap']
        }
    }
    const map = new google.maps.Map(document.getElementById("map"), mapOptions );
    const geocoder = new google.maps.Geocoder();

    geocoder.geocode({address: endereco+", "+ number +"-"+ bairro, region: uf}
    ).then((response) => {
        //console.log(response);
        const position = response.results['0'].geometry.location;

        map.setCenter(position);
        new google.maps.Marker({
            map: map,
            position: position,
        });
    }).catch((e) =>
        alert("Geocode war not successful for the following reason: " + e)
    );
}
