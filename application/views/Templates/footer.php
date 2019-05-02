<section class="bgBlue3 py-5">
	<div class="container footer">
		<div class="row">
			<div class="col-6 col-lg-3 mbMobile">
				<h4>Tentang Kami</h4>
				<ul class="ulFooter">
					<li class="listFooter"><a href="<?php echo base_url('home/aboutus'); ?>">About Us</a></li>
					<li class="listFooter"><a href="">Testimonial</a></li>
					<li class="listFooter"><a href="<?php echo base_url('home/bantuan'); ?>">Bantuan</a></li>
				</ul>
			</div>
			<div class="col-6 col-lg-3 mbMobile">
				<h4>Menu</h4>
				<ul class="ulFooter">
					<li class="listFooter"><a href="<?php echo base_url('home'); ?>">Beranda</a></li>
					<li class="listFooter"><a href="<?php echo base_url('cari/cariguru'); ?>">Cari Guru</a></li>
					<li class="listFooter"><a href="<?php echo base_url('home/login'); ?>">Login</a></li>
					<li class="listFooter"><a href="<?php echo base_url('home/register'); ?>">Register</a></li>
				</ul>
			</div>
			<div class="col-6 col-lg-3">
				<h4>Sosial Media</h4>
				<ul class="ulFooter">
					<li class="listFooter"><a href="">Facebook</a></li>
					<li class="listFooter"><a href="">Instagram</a></li>
					<li class="listFooter"><a href="">Twitter</a></li>
				</ul>
			</div>
			<div class="col-6 col-lg-3">
				<h4>Jenjang</h4>
				<ul class="ulFooter">
					<li class="listFooter"><a href="">SD</a></li>
					<li class="listFooter"><a href="">SMP</a></li>
					<li class="listFooter"><a href="">SMA</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="bgBlue1 p-2">
	<div class="container">
		<div class="row align-items-center">
			<div class="col">
				<h6 class="text-center">&copy; <?php echo date('Y'); ?> JaGO Semakin Jago </h6>
			</div>
		</div>
	</div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="<?php echo base_url('webassets/plugin/wow/wow.min.js'); ?>"></script>
<script>
	new WOW().init();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBguq7YRxB7qXKGRrVrJzUXJ-Dyhxq_sw4&callback=initMap" async defer></script>

<script>
	function initMap() {

		map = new google.maps.Map(document.getElementById('map_validasi'), {
			center: {
				lat: -7.0512269,
				lng: 110.3893301
			},
			zoom: 12
		});

		var marker = new google.maps.Marker({
			position: {
				lat: -7.0512269,
				lng: 110.3893301
			},
			map: map,
			draggable: true,
		});

		google.maps.event.addListener(myMarker, 'dragend', function(evt) {
			document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
		});

		google.maps.event.addListener(myMarker, 'dragstart', function(evt) {
			document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
		});
	}
</script>
</body>

</html>