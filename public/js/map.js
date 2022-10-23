navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
    enableHighAccuracy: true
})

function errorLocation(){

}

function successLocation(position) {

    const start = [position.coords.longitude, position.coords.latitude];
    mapboxgl.accessToken = 'pk.eyJ1IjoiYXJkaXR4aDEiLCJhIjoiY2w5andvdTBxMGFldzNwcWc1YndmYjc5ciJ9.LHGjFVa0gPcVtPWkmiH1Gw';

    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: start, // starting position
        zoom: 12
    });

    const insert = (arr, index, newItem) => [
        // part of the array before the specified index
        ...arr.slice(0, index),
        // inserted item
        newItem,
        // part of the array after the specified index
        ...arr.slice(index)
    ]

// set the bounds of the map
// const bounds = [
// 	[-123.069003, 45.395273],
// 	[-122.303707, 45.612333]
// ];
// map.setMaxBounds(bounds);

// an arbitrary start will always be the same
// only the end or destination will change

    function handleNewLocation(routes, middle){
        const middleIndex = Math.ceil(routes.length / 2);

        const firstHalf = routes.splice(0, middleIndex);
        const secondHalf = routes.splice(-middleIndex);
        const lastItemOfFirstHalf = firstHalf[firstHalf.length-1]
        const firstItemOfSecondHalf = secondHalf[0];
        console.log(firstHalf, secondHalf);
    }


// create a function to make a directions request
    async function getRoute(end) {
        // make a directions request using cycling profile
        // an arbitrary start will always be the same
        // only the end or destination will change
        const query = await fetch(
            `https://api.mapbox.com/directions/v5/mapbox/walking/${start[0]},${start[1]}; ${end[0]},${end[1]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
            { method: 'GET' }
        );

        const json = await query.json();
        const data = json.routes[0];
        let route = data.geometry.coordinates;
        let index = Math.round(route.length / 2)
        let middle = route[index];

        const instructions = document.getElementById('instructions');
        const steps = data.legs[0].steps;

        let tripInstructions = '';
        for (const step of steps) {

            tripInstructions += `<li>${step.maneuver.instruction}</li>`;
        }
        instructions.innerHTML = `<p><strong>Trip duration: ${Math.floor(
            data.duration / 60
        )} min 🚶‍♂️ </strong></p><ol>${tripInstructions}</ol>`

        const places = await fetch(`https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${middle[1]}%2C${middle[0]}&radius=1500&key=AIzaSyCVtsJIdh0VOkTBXGC976DNFiK73ErxlS8&types=tourist_attraction`, { method: 'GET' })
            .then(response => response.json())

        const place = places.results[Math.floor(Math.random() * places.results.length)];

        const querySecond = await fetch(
            `https://api.mapbox.com/directions/v5/mapbox/walking/${start[0]},${start[1]};${Object.values(place.geometry.location)[1]}, ${Object.values(place.geometry.location)[0]}; ${end[0]},${end[1]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
            { method: 'GET' }
        );

        const jsonSecond = await querySecond.json();
        const dataSecond = jsonSecond.routes[0];
        route = dataSecond.geometry.coordinates;


        const placeDetailsQuery = await fetch(
            `https://maps.googleapis.com/maps/api/place/details/json?place_id=${place.place_id}&key=AIzaSyCVtsJIdh0VOkTBXGC976DNFiK73ErxlS8`,
            { method: 'GET' }
        );
        const placeDetails = await placeDetailsQuery.json();

        // placeDetails = await placeDetailsQuery.json();
        // handleNewLocation(route, Object.values(place.geometry.location).reverse())
        // route = insert(route, index, Object.values(place.geometry.location).reverse())
        console.log(placeDetails.result.reviews)
        if (map.getLayer('vibe')) {
            const end = {
                type: 'FeatureCollection',
                features: [
                    {
                        type: 'Feature',
                        properties: {
                            description: `<strong>${place.name}</strong><p>${ placeDetails.result.reviews != undefined ? placeDetails.result.reviews[0].text : ""}</p>`,
                        },
                        geometry: {
                            type: 'Point',
                            coordinates: Object.values(place.geometry.location).reverse()
                        }
                    }
                ]
            };
            map.getSource('vibe').setData(end);
        } else {
            map.addLayer({
                id: 'vibe',
                type: 'circle',
                source: {
                    type: 'geojson',
                    data: {
                        type: 'FeatureCollection',
                        features: [
                            {
                                type: 'Feature',
                                properties: {},
                                geometry: {
                                    type: 'Point',
                                    coordinates: Object.values(place.geometry.location).reverse()
                                }
                            }
                        ]
                    }
                },
                paint: {
                    'circle-radius': 10,
                    'circle-color': '#3887be'
                }
            });
        }
        const geojson = {
            type: 'Feature',
            properties: {},
            geometry: {
                type: 'LineString',
                coordinates: route
            }
        };
        // if the route already exists on the map, we'll reset it using setData
        if (map.getSource('route')) {
            map.getSource('route').setData(geojson);
        }
        // otherwise, we'll make a new request
        else {
            map.addLayer({
                id: 'route',
                type: 'line',
                source: {
                    type: 'geojson',
                    data: geojson
                },
                layout: {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                paint: {
                    'line-color': '#3887be',
                    'line-width': 5,
                    'line-opacity': 0.75
                }
            });
        }
        // add turn instructions here at the end
    }

    map.on('load', () => {
        // make an initial directions request that
        // starts and ends at the same location

        // Add starting point to the map
        map.addLayer({
            id: 'point',
            type: 'circle',
            source: {
                type: 'geojson',
                data: {
                    type: 'FeatureCollection',
                    features: [
                        {
                            type: 'Feature',
                            properties: {},
                            geometry: {
                                type: 'Point',
                                coordinates: start
                            }
                        }
                    ]
                }
            },
            paint: {
                'circle-radius': 10,
                'circle-color': '#3887be'
            }
        });

        map.on('click', (event) => {
            const coords = Object.keys(event.lngLat).map((key) => event.lngLat[key]);
            const end = {
                type: 'FeatureCollection',
                features: [
                    {
                        type: 'Feature',
                        properties: {},
                        geometry: {
                            type: 'Point',
                            coordinates: coords
                        }
                    }
                ]
            };
            if (map.getLayer('end')) {

                map.getSource('end').setData(end);
            } else {
                map.addLayer({
                    id: 'end',
                    type: 'circle',
                    source: {
                        type: 'geojson',
                        data: {
                            type: 'FeatureCollection',
                            features: [
                                {
                                    type: 'Feature',
                                    properties: {},
                                    geometry: {
                                        type: 'Point',
                                        coordinates: coords
                                    }
                                }
                            ]
                        }
                    },
                    paint: {
                        'circle-radius': 10,
                        'circle-color': '#f30'
                    }
                });
            }
            getRoute(coords);
        });

        let popup;

        map.on('mouseenter', 'vibe', (e) => {
            console.log(e)
            const coordinates = e.features[0].geometry.coordinates.slice();
            const description = e.features[0].properties.description;

            // Ensure that if the map is zoomed out such that multiple
            // copies of the feature are visible, the popup appears
            // over the copy being pointed to.
            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            popup = new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(description)
                .addTo(map);

            map.getCanvas().style.cursor = 'pointer';
        });

        map.on('mouseleave', 'vibe', (e) => {
            popup.remove();
            const coordinates = e.features[0].geometry.coordinates.slice();
            const description = e.features[0].properties.description;

            // Ensure that if the map is zoomed out such that multiple
            // copies of the feature are visible, the popup appears
            // over the copy being pointed to.
            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(description)
                .addTo(map);
            map.getCanvas().style.cursor = 'pointer';
        });

    });
}
