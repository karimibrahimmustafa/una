<div class="bx-form-input-location-cont bx-clearfix">
    <?php echo $a['input'];?>
    <?php if($a['bx_if:auto_input']['condition']){ ?>
        <div id="<?php echo $a['bx_if:auto_input']['content']['id_status'];?>" class="bx-def-margin-sec-left"><?php echo $a['bx_if:auto_input']['content']['location_string'];?></div>
    <?php } ?>
</div>

<input type="hidden" name="<?php echo $a['name'];?>_lat" value="<?php echo $a['lat'];?>" />
<input type="hidden" name="<?php echo $a['name'];?>_lng" value="<?php echo $a['lng'];?>" />
<input type="hidden" name="<?php echo $a['name'];?>_country" value="<?php echo $a['country'];?>" />
<input type="hidden" name="<?php echo $a['name'];?>_state" value="<?php echo $a['state'];?>" />
<input type="hidden" name="<?php echo $a['name'];?>_city" value="<?php echo $a['city'];?>" />
<input type="hidden" name="<?php echo $a['name'];?>_zip" value="<?php echo $a['zip'];?>" />
<input type="hidden" name="<?php echo $a['name'];?>_street" value="<?php echo $a['street'];?>" />
<input type="hidden" name="<?php echo $a['name'];?>_street_number" value="<?php echo $a['street_number'];?>" />

<script>

    var oBxLocationHashMap = {
        '<?php echo $a['name'];?>_lat': '',
        '<?php echo $a['name'];?>_lng': '',
        '<?php echo $a['name'];?>_city': 'locality',
        '<?php echo $a['name'];?>_state': 'administrative_area_level_1',
        '<?php echo $a['name'];?>_country': 'country',
        '<?php echo $a['name'];?>_zip': 'postal_code',
        '<?php echo $a['name'];?>_street': 'route',
        '<?php echo $a['name'];?>_street_number': 'street_number'
    };

    var bx_location_reset = function () {
        for (sKey in oBxLocationHashMap)
            $('[name="' + sKey + '"]').val('');
    };

    var bx_location_process_address = function (o) {
        var i, sKey, sCountry, sCity;

        for (i in o) {
            for (sKey in oBxLocationHashMap) {

                var sName = oBxLocationHashMap[sKey];
                
                if ('locality' == sName && -1 == o[i].types.indexOf(sName))
                    sName = 'postal_town';
                
                if ('administrative_area_level_1' == sName && -1 == o[i].types.indexOf(sName))
                    sName = 'administrative_area_level_2';

                if (o[i].types.indexOf(sName) > -1) {
                    var sIndex = 'route' == sName || 'locality' == sName ? 'long_name' : 'short_name';
                    $('[name="' + sKey + '"]').val(o[i][sIndex]);
                }
                
                if (o[i].types.indexOf('locality') > -1)
                    sCity = o[i].short_name;
                else if (o[i].types.indexOf('country') > -1)
                    sCountry = o[i].long_name;
            }
        }
        if ('undefined' != typeof(sCity) && sCity.length)
            $('#<?php echo $a['id_status'];?>').html(sCity + ", " + sCountry);
        else
            $('#<?php echo $a['id_status'];?>').html(sCountry);
    };

    var bx_location_geolocate = function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                glBxAutocomplete<?php echo $a['name'];?>.setBounds(circle.getBounds());
            });
        }
    }

    $('input[name=<?php echo $a['name'];?>][type=checkbox]').on('change', function () {

        var callbackOnLocationReset = function (error) {
            var sKey;
            for (sKey in oBxLocationHashMap) 
                $('[name="' + sKey + '"]').val('');
            $('#<?php echo $a['id_status'];?>').html("Location off");
        }

        var callbackOnLocationSucess = function (position) {
            bx_location_reset ();

            $('[name="<?php echo $a['name'];?>_lat"]').val(position.coords.latitude);
            $('[name="<?php echo $a['name'];?>_lng"]').val(position.coords.longitude);

            var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({'latLng': latlng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    bx_location_process_address(results[0]['address_components']);
                } 
                else {
                    $('#<?php echo $a['id_status'];?>').html(status);
                }
            });

        }

        if ($(this).is(':checked')) {
            $('#<?php echo $a['id_status'];?>').html('Determining location...');
            if (navigator.geolocation)
                navigator.geolocation.getCurrentPosition(callbackOnLocationSucess, callbackOnLocationReset);
            else
                $('#<?php echo $a['id_status'];?>').html('Geolocation is not supported by this browser');
        } else {
            callbackOnLocationReset();
        }
    });

    var fInitCallback = function () {

        var callbackFillInAddress = function () {
            // Get the place details from the autocomplete object.
            var place = glBxAutocomplete<?php echo $a['name'];?>.getPlace();

            bx_location_reset ();

            $('[name="<?php echo $a['name'];?>_lat"]').val(place.geometry.location.lat);
            $('[name="<?php echo $a['name'];?>_lng"]').val(place.geometry.location.lng);
            
            bx_location_process_address(place.address_components);
        }
        
        $('input[name=<?php echo $a['name'];?>][type=text]').on('focus', bx_location_geolocate);

        $('input[name=<?php echo $a['name'];?>][type=text]').on('blur', function () {
            if (!$(this).val().length)
                bx_location_reset ();
        });

        if ($('input[name=<?php echo $a['name'];?>][type=text]').size()) {

            // Create the autocomplete object, restricting the search to geographical location types.
            glBxAutocomplete<?php echo $a['name'];?> = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('<?php echo $a['id_input'];?>'))
            );

            // When the user selects an address from the dropdown, populate the address fields in the form.
            glBxAutocomplete<?php echo $a['name'];?>.addListener('place_changed', callbackFillInAddress);
        }

    }
    
    $(document).ready(function () {        
        if ('undefined' === typeof(google))
            bx_get_scripts(['https://maps.google.com/maps/api/js?libraries=places&language=<?php echo $a['lang'];?>&key=<?php echo $a['key'];?>'], fInitCallback);
        else
            fInitCallback();
    });

</script>