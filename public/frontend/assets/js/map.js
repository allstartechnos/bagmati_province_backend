function initMap() {
    const allstar = {
      lat: 27.70437,
      lng: 85.33605,
    };
    var map = new google.maps.Map(document.getElementById("map"), {
      mapTypeControl: false,
      center: allstar,
      zoom: 15,
    });
    const image =
      "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: allstar,
      map: map,
      draggable: true,
      animation: google.maps.Animation.DROP,
      icon: image,
    });
    marker.setMap(map);
    marker.addListener("click", toggleBounce);
    new AutocompleteDirectionsHandler(map);
  
    function toggleBounce() {
      if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
      } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
      }
    }
  }
  /**
   * @constructor
   */
  
  function AutocompleteDirectionsHandler(map) {
    this.map = map;
    this.originPlaceId = null;
    this.destinationPlaceId = null;
    this.travelMode = "WALKING";
    var originInput = document.getElementById("origin-input");
    var destinationInput = document.getElementById("destination-input");
    var modeSelector = document.getElementById("mode-selector");
    this.directionsService = new google.maps.DirectionsService();
    this.directionsDisplay = new google.maps.DirectionsRenderer();
    this.directionsDisplay.setMap(map);
  
    var originAutocomplete = new google.maps.places.Autocomplete(originInput, {
      placeIdOnly: true,
    });
    var destinationAutocomplete = new google.maps.places.Autocomplete(
      destinationInput,
      {
        placeIdOnly: true,
      }
    );
  
    this.setupClickListener("changemode-walking", "WALKING");
    // this.setupClickListener('changemode-transit', 'TRANSIT');
    this.setupClickListener("changemode-driving", "DRIVING");
  
    this.setupPlaceChangedListener(originAutocomplete, "ORIG");
    this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
  
    this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
    this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
      destinationInput
    );
    this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
  }
  
  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  AutocompleteDirectionsHandler.prototype.setupClickListener = function (
    id,
    mode
  ) {
    var radioButton = document.getElementById(id);
    var me = this;
    radioButton.addEventListener("click", function () {
      me.travelMode = mode;
      me.route();
    });
  };
  
  AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (
    autocomplete,
    mode
  ) {
    var me = this;
    autocomplete.bindTo("bounds", this.map);
    autocomplete.addListener("place_changed", function () {
      var place = autocomplete.getPlace();
      if (!place.place_id) {
        window.alert("Please select an option from the dropdown list.");
        return;
      }
      if (mode === "ORIG") {
        me.originPlaceId = place.place_id;
      } else {
        me.destinationPlaceId = place.place_id;
      }
      me.route();
    });
  };
  
  AutocompleteDirectionsHandler.prototype.route = function () {
    if (!this.originPlaceId || !this.destinationPlaceId) {
      return;
    }
    var me = this;
  
    this.directionsService.route(
      {
        origin: {
          placeId: this.originPlaceId,
        },
        destination: {
          placeId: this.destinationPlaceId,
        },
        travelMode: this.travelMode,
      },
      function (response, status) {
        if (status === "OK") {
          me.directionsDisplay.setDirections(response);
        } else {
          window.alert("Directions request failed due to " + status);
        }
      }
    );
  };