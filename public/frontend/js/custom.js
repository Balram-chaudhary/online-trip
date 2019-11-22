
		// declaring variables
		// var totalRoom = 1;
		var totalPassenger = 1;
		var totalRoomhomestay=1;
		var options = [
			{
				id: 1,
				count: 1
			},
			{
				id: 2,
				count: 0
			}
		];
		var optionshomestay = [
			{
				id: 1,
				count: 1
			},
			{
				id: 2,
				count: 0
			}
		];
		var optionsFlights = [
			{
				id: 1,
				count: 1
			}
			{
				id: 2,
				count: 0
			},
			{
				id: 3,
			    count: 0
			}
		]
		totalPeople = countTotalPeople();
		totalPeoplehomestay = countTotalPeoplehomestay();
		totalPassenger = countTotalPassenger();
		// total people count
		function countTotalPeople() {
			var count = 0;
			for (i = 0; i < options.length; i++) {
				count = count + options[i].count;
			}
			return count;
		}
		// total people count homestay
		function countTotalPeoplehomestay() {
			var counthomestay = 0;
			for (i = 0; i < optionshomestay.length; i++) {
				counthomestay = counthomestay + optionshomestay[i].count;
			}
			return counthomestay;
		}
		function countTotalPassenger() {
			var count = 0;			
			for (i =0; i < optionsFlights.length; i++) {	
				count = count + optionsFlights[i].count;
			}
			return count;
		}
		// increase count by id
		increaseCount = function (id, thisObj) {
			options[id - 1].count++;
			totalPeople++;
			RenderHtml(thisObj);
		}
		// decrease count by id
		decreaseCount = function (id, thisObj) {
			options[id - 1].count--;
			totalPeople--;
			RenderHtml(thisObj);
		}

		
		// increase Passenger count by id
		increaseCountPassenger = function (id, thisObj) {
			optionsFlights[id - 1].count++;
			totalPassenger++;
			RenderHtml(thisObj);
		}
		// decrease Passenger count by id
		decreaseCountPassenger = function (id, thisObj) {
			optionsFlights[id - 1].count--;
			totalPassenger--;
			RenderHtml(thisObj);
		}
		// loading
		$('.btn-popover').hide();
		$('#spinner').show();
		// initial rendering
		setTimeout(() => {
			RenderHtml();
			$('.btn-popover').show();
			$('#spinner').hide();
		}, 4000);

		$('.btn-pop').on('click', function () {
			$('.pop-content').hide();
			$('.spinner').show();
			setTimeout(() => {
				RenderHtml();
				$('.pop-content').show();
				$('.spinner').hide();
			}, 1000);
		})
		function RenderHtml(thisObj) {		
			var $adultCountPassenger = thisObj == undefined ? $('#traveller-adult-count') : $($(thisObj).siblings('#traveller-adult-count'));
			var $childCountPassenger = thisObj == undefined ? $('#traveller-child-count') : $($(thisObj).siblings('#traveller-child-count'));
			var $infantCountPassenger = thisObj == undefined ? $('#traveller-infant-count') : $($(thisObj).siblings('#traveller-infant-count'));
			var $totalPassenger = $('#total-passenger');
			$adultCountPassenger.html(optionsFlights[0].count);
			$childCountPassenger.html(optionsFlights[1].count);
			$infantCountPassenger.html(optionsFlights[2].count);
			
			// child and adult count
			$totalPassenger.html(totalPassenger > 1 ? totalPassenger + " Person" : totalPassenger + " Person");
			if (optionsFlights[0].count <= 1) {
				$('.traveller-btn-dec-adult').attr("disabled", "disabled");
			} else {
				$('.traveller-btn-dec-adult').removeAttr("disabled");
			}
           if (optionsFlights[1].count < 1) {
				$('.traveller-btn-dec-child').attr("disabled", "disabled");
			} else {
				$('.traveller-btn-dec-child').removeAttr("disabled");
			}
			if (optionsFlights[2].count < 1) {
				$('.traveller-btn-dec-infant').attr("disabled", "disabled");
			} else {
				$('.traveller-btn-dec-infant').removeAttr("disabled");
			}
           
			if (optionsFlights[0].count > 3) {
				$('.traveller-btn-inc-adult').attr("disabled", "disabled");
			} else {
				$('.traveller-btn-inc-adult').removeAttr("disabled");
			}
           if (optionsFlights[1].count > 3) {
				$('.traveller-btn-inc-child').attr("disabled", "disabled");
			} else {
				$('.traveller-btn-inc-child').removeAttr("disabled");
			}
			if (optionsFlights[2].count > 3) {
				$('.traveller-btn-inc-infant').attr("disabled", "disabled");
			} else {
				$('.traveller-btn-inc-infant').removeAttr("disabled");
			}
		}
		// Enabling popover - not required for angular directives
		$(function () {
			$('[data-toggle="popover"]').popover()
		})
		jQuery(document).ready(function ($) {
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
		});
	<!-- //Stats-Number-Scroller-Animation-JavaScript -->
		$(".slides").poposlides();
	<!-- //for banner js file-->
	<!-- pop-up-box -->
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});
		});
	<!--//pop-up-box -->
	<!-- requried-jsfiles-for owl -->
	<!-- testimonials -->
		$(document).ready(function () {
			$("#owl-demo2").owlCarousel({
				items: 1,
				lazyLoad: true,
				autoPlay: true,
				navigation: false,
				navigationText: false,
				pagination: true,
			});
		});
	<!-- //testimonials -->
	<!-- start-smoth-scrolling -->
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	<!-- here stars scrolling icon -->
		$(document).ready(function () {
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};	
			// $().UItoTop({ easingType: 'easeOutQuart' });wfqD		WA DC VB
		});
		function openCity(evt, cityName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", " ");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += "active";
		}
		function upseat()
		{
			var max=4;
			document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1 + ' Seats';
			if (document.getElementById("myNumber").value.replace(' Seats', '') >= parseInt(max)) {
				document.getElementById("myNumber").value = max + ' Seats';
			}
		}
		
		function downseat() {
			var min=1;
			document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1 + ' Seats';
			if (document.getElementById("myNumber").value.replace(' Seats', '') <= parseInt(min)) {
				document.getElementById("myNumber").value = min + ' Seats';
			}
		}
		function up1(max) {
			var max=6;
			document.getElementById("myNumber1").value = parseInt(document.getElementById("myNumber1").value) + 1 + ' Person';
			if (document.getElementById("myNumber1").value.replace('Person', '') >= parseInt(max)) {
				document.getElementById("myNumber1").value = max + ' Person';
			}
		}
		function down1(min) {
			var min=1;
			document.getElementById("myNumber1").value = parseInt(document.getElementById("myNumber1").value) - 1 + ' Person';
			if (document.getElementById("myNumber1").value.replace(' Person', '') <= parseInt(min)) {
				document.getElementById("myNumber1").value = min + ' Person';
			}
		}
		function uproom(max) {
			var max=6;
			document.getElementById("myNumberroom").value = parseInt(document.getElementById("myNumberroom").value) + 1 + ' Rooms';
			if (document.getElementById("myNumberroom").value.replace(' Rooms', '') >= parseInt(max)) {
				document.getElementById("myNumberroom").value = max + ' Rooms';
			}
		}
		function downroom(min) {
			var min=1;
			document.getElementById("myNumberroom").value = parseInt(document.getElementById("myNumberroom").value) - 1 + ' Rooms';
			if (document.getElementById("myNumberroom").value.replace(' Rooms', '') <= parseInt(min)) {
				document.getElementById("myNumberroom").value = min + ' Rooms';
			}
		}
	
		function uproom1(max) {
			document.getElementById("myNumberroom1").value = parseInt(document.getElementById("myNumberroom1").value) + 1;
			if (document.getElementById("myNumberroom1").value >= parseInt(max)) {
				document.getElementById("myNumberroom1").value = max;
			}
		}
		function downroom1(min) {
			document.getElementById("myNumberroom1").value = parseInt(document.getElementById("myNumberroom1").value) - 1;
			if (document.getElementById("myNumberroom1").value <= parseInt(min)) {
				document.getElementById("myNumberroom1").value = min;
			}
		}
		$(document).ready(function () {
			$("#in").click(function () {
				$("#in").hide();
				$("#div1").fadeIn();
				$("#div2").fadeIn("slow");
				$("#div3").fadeIn(3000);
				$("#out").show();
			});
		});
		let peopleCount = $('#total-people');
		let peopleCounthomestay=$('#total-people-homestay');
		let roomCounthomestay = $('#total-room-homestay');
    	let roomCount = $('#total-room');
		let passengerCount = $('#total-passenger');
		$(document).ready(function () {
			$("#out3").click(function () {
				$("#div11").fadeOut();
				$("#div12").fadeOut();
				$("#div13").fadeOut();
				$("#div14").fadeOut();
				$("#out3").hide();
				$("#in3").show();
			});
		});
		

		function totalCountPassenger(thisObj) {
			const parentPopUp = $(thisObj).parents('div.pop-content')[0];
	    	const passengerCount = toggleRoomCount(parentPopUp);
			totalPassenger += passengerCount;
			RenderHtml(undefined);
		}
		function doneBtn() {

			$('.btn-popover').popover('hide');
		}
    $('html').on('click', function(e) {
			  if (typeof $(e.target).data('original-title') == 'undefined' &&
			     !$(e.target).parents().is('.popover.in')) {
			    $('[data-original-title]').popover('hide');
			  }
			});
			  $(function () {
						$("#out3").hide();
		});