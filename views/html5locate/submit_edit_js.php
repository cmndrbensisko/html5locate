<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	// Autolocate Added By Adam
	
	$('.btn_autolocate').on('click', function () {
		getLocation();
	});
	
	function getLocation()
	{
		if (navigator.geolocation)
		{
			navigator.geolocation.getCurrentPosition(showPosition);
		}
		else{window.alert("Geolocation is not supported by this browser.");}
	}
	
	function showPosition(data)
	{
		// Clear the map first
		vlayer.removeFeatures(vlayer.features);
		$('input[name="geometry[]"]').remove();
						
		point = new OpenLayers.Geometry.Point(data.coords.longitude, data.coords.latitude);
		OpenLayers.Projection.transform(point, proj_4326,proj_900913);
						
		f = new OpenLayers.Feature.Vector(point);
		vlayer.addFeatures(f);
						
		// create a new lat/lon object
		myPoint = new OpenLayers.LonLat(data.coords.longitude, data.coords.latitude);
		myPoint.transform(proj_4326, map.getProjectionObject());

		// display the map centered on a latitude and longitude
		map.panTo(myPoint);
												
		// Update form values
		$("#country_name").val(data.country);
		$("#latitude").val(data.coords.latitude);
		$("#longitude").val(data.coords.longitude);
		$("#location_name").val(data.location_name);
	}
});
</script>