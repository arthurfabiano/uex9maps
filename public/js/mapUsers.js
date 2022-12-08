function dataUsersMap() {
    $.ajax({
        url: 'http://localhost:8989/listUsers',
        method: 'GET',
        datatype: 'json',
        success: function (data) {
            initMapUser(data);
        },
        error: function (data) {
            alert('Street not found');
        }
    })
}

function initMapUser(data) {

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
    for (let i=0; i<data.length; i++) {
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({address: data[i].address.endereco + data[i].address.number + data[i].address.bairro, region: data[i].address.uf}
        ).then((response) => {
            // console.log(response);
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
}
/*function initMap() {
    const uluru = { lat: -25.344, lng: 131.031 };

    const mapOptions = {
        zoom: 4,
        center: uluru,
        mapTypeId: 'roadmap', // roadmap, satellite, hybrid, terrain
        mapTypeControlOptions: {
            mapTypeIds: ['roadmap']
        }
    }

    const map = new google.maps.Map(document.getElementById("map"), mapOptions );

    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}*/
// window.initMapUser = initMapUser;
