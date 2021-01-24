<!DOCTYPE HTML>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Vendor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content=""/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <link type="text/css" rel="stylesheet" href="{{ asset('public/asset/css/plugins.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('public/asset/css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('public/asset/css/main.css') }}">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
            <div class="pulse"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            <header class="main-header dark-header fs-header sticky">
                <div class="header-inner">
                    <div class="logo-holder">
                        <a href="#"><img src="{{ url('/front_theme/images/logo-white.png') }}" alt=""></a>
                    </div>
                 
                    <a href="https://play.google.com/store/apps/details?id=com.callpneck" class="add-list" style="color:black">Get App Now </a>
                    <div class="nav-button-wrap color-bg">
                        <div class="nav-button">
                            <span></span><span></span><span></span>
                        </div>
                    </div>

                    <div class="nav-holder main-menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}" style="font-size: 16px; color: #000;">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('/about') }}" style="font-size: 16px; color: #000;">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ url('/vendors') }}" style="font-size: 16px; color: #000;">Vendors</a>
                                </li>
								<li>
                                    <a href="{{ url('/contact') }}" style="font-size: 16px; color: #000;">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- navigation  end -->
                </div>
            </header>
            <!--  header end -->
            <!-- wrapper -->
            <div id="wrapper">
                <div class="content">
                    <!-- Map -->
                    <div class="map-container column-map right-pos-map">
                        <div id="map-main"></div>
                       
                    </div>
                    <!-- Map end -->
                    <!--col-list-wrap -->
                    <div class="col-list-wrap left-list">
                        {{-- <div class="listsearch-options fl-wrap" id="lisfw" >
                            <div class="container">
                               
                                <div class="listsearch-input-wrap fl-wrap">
                                    
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="All Regions" class="chosen-select"  >
                                            <option>All Regions</option>
                                            <option>Chalsea</option>
                                            <option>Brooklyn</option>
                                            <option>Manhattan</option>
                                            <option>Queens</option>
                                            <option>Staten Island</option>
                                        </select>
                                    </div>
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="Choose a Category..." class="chosen-select" >
                                            <option>Choose a Category...</option>
                                            <option>Shops</option>
                                            <option>Hotels</option>
                                            <option>Restaurants</option>
                                            <option>Fitness</option>
                                            <option>Events</option>
                                        </select>
                                    </div>
									<div class="listsearch-input-item">
                                        <select data-placeholder="Filter by tags" class="chosen-select" multiple>
                                            <option>Filter by tags</option>
                                            <option>Accepts Credit Cards</option>
                                            <option>Bike Parking</option>
                                            <option>Contact Forms</option>
                                            <option>Coupons</option>
                                            <option>Italian</option>
                                        </select>
                                    </div>
                                  
                                </div>
                                <!-- listsearch-input-wrap end -->
                            </div>
                        </div> --}}
                        <!-- list-main-wrap-->
							<div class="filtr-icns-akt">
								<a href="javascript:void(0)" class="icon-str"> <i class="fa fa-sliders"></i> Filter </a>
								<a href="javascript:void(0)" class="ict-s"> <i class="fa fa-map"></i> </a>
								<a href="javascript:void(0)" class="btn-pics"> <i class="fa fa-picture-o"></i> </a>
							</div>
                        <div class="list-main-wrap fl-wrap card-listing list-stf">
							
                            <div class="p-0-20">
                                <!-- listing-item -->
                                @foreach ($Vendor_skils as $item)

                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img">
                                            @php
                                                $vendor = App\Vendor::where('id',$item->vendor_id)->first();
                                            @endphp
                                            @if (!empty($vendor['profile_image']))
                                            <img src="{{ $vendor['profile_image'] }}" alt="">
                                            @else
                                            <img src="https://play-lh.googleusercontent.com/pbDkWlsPBlGYaMUTRJ8yR8zvYVGMAoKoD7ubzmuzjZRAp1wHlYfXkvoHeqJ5-ZsiGg" alt="">
                                            @endif
                                            
                                            <div class="overlay"></div>
                                            <div class="list-post-counter"><i class="fa fa-heart-o"></i></div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            
											<h3><a href="{{ URL('/vendors_detail/'.$item->vendor_id )}}">{{ $item->shop_title }}</a></h3>
                                            <p>{{ $item->description }}</p>
                                            <div class="sctr-str">
												<div class="loct-strs">
													<span class="rate-str"> 
                                                        @php
                                                        $rat = App\Vendor_rating::where('vendor_id',$item->vendor_id)->first();
                                                        if (!empty($rat)) {
                                                            echo $rat['rating'];
                                                        } else {
                                                            echo 0;
                                                        }
                                                    
                                                        @endphp    
                                                    </span>
													{{ Str::limit($item->address1, 18) }}
												</div>
												<ul class="right-sit">
													<li> <img src="{{ asset('public/asset/images/icon1.png') }}"> </li>
													<li> <img src="{{ asset('public/asset/images/icon2.png') }}"> </li>
												</ul>
											</div>
                                        </div>
                                    </article>
                                </div>

                                <!-- listing-item end-->
                                

                                @endforeach
							    
                                <div class="clearfix"></div>

                            </div>
                            <a class="load-more-button" href="#">Load more listings <i class="fa  fa-caret-down"></i> </a>
                        </div>
                        <!-- list-main-wrap end-->
                    </div>
                    <!--col-list-wrap -->
                    <div class="limit-box fl-wrap"></div>
                   
                </div>
                <!--content end -->
            </div>
            <!-- wrapper end -->
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{ asset('public/asset/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/asset/js/plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/asset/js/scripts.js') }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7rRpQJyQJZYzxrvStRGFkbB0MxXWGrO0&amp;libraries=places&amp;callback=initAutocomplete"></script>
        <script type="text/javascript" src="{{ asset('public/asset/js/map_infobox.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/asset/js/markerclusterer.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/asset/js/maps.js') }}"></script>
		<script>
			$(".icon-str").click(function(){
			  $(".listsearch-options").slideToggle(400);
			});
			$(".ict-s").click(function(){
			  $(".right-pos-map").addClass("show-map");
			  $(".btn-pics").addClass("showd");
			  $(".ict-s").addClass("d-none");
			  $(".list-stf").addClass("d-none");
			  $(".col-list-wrap").addClass("flsts");
			});
			
			$(".btn-pics").click(function(){
			  $(".right-pos-map").removeClass("show-map");
			  $(".btn-pics").removeClass("showd");
			  $(".ict-s").removeClass("d-none");
			  $(".list-stf").removeClass("d-none");
			  $(".col-list-wrap").removeClass("flsts");
			});
		
		window.onload = function() {
		
		  var startPos;
		  var geoOptions = {
			enableHighAccuracy: true
		  }

		  var geoSuccess = function(position) {
			startPos = position;
			var lat = startPos.coords.latitude,
			    longi = startPos.coords.longitude;
			
			    document.cookie = "user_longitude ="+longi;
				document.cookie = "user_latitude ="+lat;
			 
		  };
		  var geoError = function(error) {
			console.log('Error occurred. Error code: ' + error.code);
			// error.code can be:
			//   0: unknown error
			//   1: permission denied
			//   2: position unavailable (error response from location provider)
			//   3: timed out
		  };
		  
		  navigator.geolocation.watchPosition(geoSuccess, geoError, geoOptions);
		};
		
		var markerIcon = {
			anchor: new google.maps.Point(22, 16),
			url: 'images/marker.png',
		}

		function initMap() {
			var map;
			var bounds = new google.maps.LatLngBounds();
			var mapOptions = {
				mapTypeId: 'roadmap'
			};
							
			// Display a map on the web page
			map = new google.maps.Map(document.getElementById("map-main"), mapOptions);
			map.setTilt(50);
				
			// Multiple markers location, latitude, and longitude
			var markers = [
				
				<?php 
				 if(!empty($Vendor_skils)){
					foreach ($Vendor_skils as $item){
						echo '["'.$item->shop_title.'", '.$item->vendor_latitude.', '.$item->vendor_longitude.'],';
					}
				} 
				?>
			];
								
			// Info window content
			var infoWindowContent = [
				<?php if(!empty($Vendor_skils)){
					foreach ($Vendor_skils as $item){ ?>
						['<div class="info_content">' +
						"<h3><?php echo $item->shop_title; ?></h3>" +
						'<p><?php echo $item->address1; ?></p>' + '</div>'],
				<?php }
				}
				?>
			];
				
			// Add multiple markers to map
			var infoWindow = new google.maps.InfoWindow(), marker, i;
			
			// Place each marker on the map  
			for( i = 0; i < markers.length; i++ ) {
				var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
				bounds.extend(position);
				marker = new google.maps.Marker({
					position: position,
					map: map,
					title: markers[i][0]
				});
				
				// Add info window to marker    
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infoWindow.setContent(infoWindowContent[i][0]);
						infoWindow.open(map, marker);
					}
				})(marker, i));

				// Center the map to fit all markers on the screen
				map.fitBounds(bounds);
				 
			}

			// Set zoom level
			var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
				google.maps.event.removeListener(boundsListener);
			});
			
		}

		// Load initialize function
		google.maps.event.addDomListener(window, 'load', initMap);
	

	</script>
    </body>
</html>
