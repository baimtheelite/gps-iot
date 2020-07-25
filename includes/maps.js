// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyBJFhnWkQj4BAaJL8rakk0KIPpNGB-8ClM",
  authDomain: "gps-iot-8a30e.firebaseapp.com",
  databaseURL: "https://gps-iot-8a30e.firebaseio.com",
  projectId: "gps-iot-8a30e",
  storageBucket: "gps-iot-8a30e.appspot.com",
  messagingSenderId: "185419337766",
  appId: "1:185419337766:web:3ee2eeec7b4a03f7e156e7",
  measurementId: "G-EPRVZN9Z3H",
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

var dbRef = firebase.database().ref("koordinat");

dbRef.orderByValue().on("value", function (items) {
  var _content = "";
  items.forEach(function (child) {
    _content += `<tr>
          <td>${child.val().latitude}</td>
          <td>${child.val().longitude}</td>
          <td>${child.val().created_at}</td>
          <td>
            <button type="button" class="btn btn-default jump"
            data-latitude="${child.val().latitude}"
            data-longitude="${child.val().longitude}"
            >Go To Marker
            </button>
            <a class="btn btn-primary" 
            target="_blank" 
            href="https://www.google.com/maps/search/?api=1&query=${
              child.val().latitude
            },${child.val().longitude}"
            >Maps link</a>
            </td>
            
          </tr>`;
  });
  $("#showData").html(_content);
  $("#showData tr:last").fadeOut().fadeIn();
});

//mengambil data terbaru
dbRef
  .orderByValue()
  .limitToLast(1)
  .on("value", function (items) {
    items.forEach(function (child) {
      var detail = `<p>
                    <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=${
                      child.val().latitude
                    },${
        child.val().longitude
      }">https://www.google.com/maps/search/?api=1&query=${
        child.val().latitude
      },${child.val().longitude}</a>
                </>
                <p>
                    tanggal dikirim: ${child.val().created_at}
                </p>`;

      $("#showDetail").html(detail);
    });
  });
//  Creates a new marker and adds it to a group
function addMarkerToGroup(group, coordinate, html) {
  // Create a marker icon from an image URL:
  var icon = new H.map.Icon("assets/marker.png");
  var marker = new H.map.Marker(coordinate, {
    icon: icon,
  });
  // add custom data to the marker
  marker.setData(html);
  group.addObject(marker);
}

/**
 * Add two markers showing the position of Liverpool and Manchester City football clubs.
 * Clicking on a marker opens an infobubble which holds HTML content related to the marker.
 * @param  {H.Map} map      A HERE Map instance within the application
 */
function addInfoBubble(map) {
  var group = new H.map.Group();

  map.addObject(group);

  // add 'tap' event listener, that opens info bubble, to the group
  group.addEventListener(
    "tap",
    function (evt) {
      // event target is the marker itself, group is a parent event target
      // for all objects that it contains
      var bubble = new H.ui.InfoBubble(evt.target.getGeometry(), {
        // read custom data
        content: evt.target.getData(),
      });
      // show info bubble
      ui.addBubble(bubble);
    },
    false
  );
  var lineString = new H.geo.LineString();
  dbRef.on("value", function (items) {
    var _content = "";
    items.forEach(function (child) {
      // console.log(child.val().latitude);
      addMarkerToGroup(
        group,
        {
          lat: child.val().latitude,
          lng: child.val().longitude,
        },
        `<div>
            <div>id: ${child.val().id}
            <br>Tanggal dikirim: ${child.val().created_at}
            <br>${child.val().latitude}, ${child.val().longitude}
            <br><a target="_blank" href="https://www.google.com/maps/search/?api=1&query=${
              child.val().latitude
            },${child.val().longitude}">
                    Maps Link
                </a>
        </div>`
      );
    });
  });
}

// initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
  apikey: "b5T2Z_ZX_a_k9Nm_xk2UkDTY3oxazEKzh9t5yMV1564",
});
var defaultLayers = platform.createDefaultLayers();

// initialize a map - this map is centered over Europe
var objDefaultCoor = {
  lat: -6.296647,
  lng: 106.628128,
};
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function (position) {
    // alert(position.coords.latitude + " " + position.coords.longitude);
    map.setCenter({
      lat: position.coords.latitude,
      lng: position.coords.longitude,
    });
  });
}

var map = new H.Map(
  document.getElementById("mapContainer"),
  defaultLayers.vector.normal.map,
  {
    center: objDefaultCoor,
    zoom: 16,
    pixelRatio: window.devicePixelRatio || 1,
  }
);
// add a resize listener to make sure that the map occupies the whole container
window.addEventListener("resize", () => map.getViewPort().resize());

// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// create default UI with layers provided by the platform
var ui = H.ui.UI.createDefault(map, defaultLayers);

// Now use the map as required...
addInfoBubble(map);

$("#row-coordinates").on("click", ".jump", function () {
  var latitude = $(this).data("latitude");
  var longitude = $(this).data("longitude");

  map.setCenter({
    lat: latitude,
    lng: longitude,
  });
  map.setZoom(20);

  //Scroll Top
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// <!-- Script untuk delete key -->
// removeFirebaseKey = () => {
//   var id = [];
//   $(".data-key:checked").each(function (i) {
//     id[i] = $(this).val();
//   });

//   if (id.length === 0) {
//     alert("Pilih setidaknya satu data!");
//   } else {
//     for (var i = 0; i < id.length; i++) {
//       firebase
//         .database()
//         .ref("koordinat/" + id[i])
//         .remove();
//     }
//   }
// };
// // removeFirebaseKey();
// $("#btn-hapus").on("click", function () {
//   removeFirebaseKey();
// });
