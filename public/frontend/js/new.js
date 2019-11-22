		// declaring variables
		var totalRoom = 1;
		
		var totalPassenger = 1;

		var options = [
			{
				id: 1,
				name: "Adult",
				age: "12",
				count: 2
			},
			{
				id: 2,
				name: "Child",
				age: "12",
				count: 1
			}
		];

		var optionsFlights = [
			{
				id: 1,
				name: "Adult",
				age: "12",
				count: 1
			},
			{
				id: 2,
				name: "Child",
				age: "12",
				count: 0
			},
			{
				id: 3,
				name: "Infant",
				age: "2",
				count: 0
			}
		]
		

		
		totalPeople = countTotalPeople();
		totalPassenger = countTotalPassenger();
		// total people count
		function countTotalPeople() {
			var count = 0;
			for (i = 0; i < options.length; i++) {
				count = count + options[i].count;
			}
			return count;
		}

		function countTotalPassenger() {
			var count = 0;			
			for (i =0; i < optionsFlights.length; i++) {	
				count = count + optionsFlights[i].count;
			}
			return count;
		}

		//find total count
		getTotal = function (){
			var count = 0;
			options.forEach(function(item){
				count = count + item.count;
			});

			return count;
		}

		// increase count by id
		increaseCount = function (id, thisObj) {
			if(getTotal() == 4){
				window.alert("Maximum Number Selected");
				return;
			}
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
			console.log(id);
			console.log(optionsFlights[id-1]);
			if(optionsFlights[id - 1].count==4){
				window.alert("Maximum Number Selected");
				return;
			}
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

			// html elements that needs to render
			var $adultCount = thisObj == undefined ? $('#adult-count') : $($(thisObj).siblings('#adult-count'));
			var $adultName = thisObj == undefined ? $('#adult-name') : $($(thisObj).siblings('#adult-name'));
			var $adultAge = thisObj == undefined ? $('#adult-age') : $($(thisObj).siblings('#adult-age'));
			
			var $childCount = thisObj == undefined ? $('#child-count') : $($(thisObj).siblings('#child-count'));
			var $childName = thisObj == undefined ? $('#child-name') : $($(thisObj).siblings('#child-name'));
			var $childAge = thisObj == undefined ? $('#child-age') : $($(thisObj).siblings('#child-age'));
			
			var $adultCountPassenger = thisObj == undefined ? $('#traveller-adult-count') : $($(thisObj).siblings('#traveller-adult-count'));
			var $adultNamePassenger = thisObj == undefined ? $('#traveller-adult-name') : $($(thisObj).siblings('#traveller-adult-name'));
			var $adultAgePassenger = thisObj == undefined ? $('#traveller-adult-age') : $($(thisObj).siblings('#traveller-adult-age'));
			
			var $childCountPassenger = thisObj == undefined ? $('#traveller-child-count') : $($(thisObj).siblings('#traveller-child-count'));
			var $childNamePassenger = thisObj == undefined ? $('#traveller-child-name') : $($(thisObj).siblings('#traveller-child-name'));
			var $childAgePassenger = thisObj == undefined ? $('#traveller-child-age') : $($(thisObj).siblings('#traveller-child-age'));
			
			var $infantNamePassenger = thisObj == undefined ? $('#traveller-infant-name') : $($(thisObj).siblings('#traveller-infant-name'));
			var $infantAgePassenger = thisObj == undefined ? $('#traveller-infant-age') : $($(thisObj).siblings('#traveller-infant-age'));
			var $infantCountPassenger = thisObj == undefined ? $('#traveller-infant-count') : $($(thisObj).siblings('#traveller-infant-count'));

			var $totalPeople = $('#total-people');
			var $totalRoom = $('#total-room');
			var $totalPassenger = $('#total-passenger');


			$adultCount.html(options[0].count);
			$adultName.html(options[0].count > 1 ? options[0].name + "s" : options[0].name);
			$adultAge.html(options[0].age);

			$childCount.html(options[1].count);
			$childName.html(options[1].count > 1 ? options[1].name + "s" : options[1].name);
			$childAge.html(options[1].age);

			$adultCountPassenger.html(optionsFlights[0].count);
			$adultNamePassenger.html(optionsFlights[0].count > 1 ? optionsFlights[0].name + "s" : optionsFlights[0].name);
			$adultAgePassenger.html(optionsFlights[0].age);

			$childCountPassenger.html(optionsFlights[1].count);
			$childNamePassenger.html(optionsFlights[1].count > 1 ? optionsFlights[1].name + "s" : optionsFlights[1].name);
			$childAgePassenger.html(optionsFlights[1].age);

			$infantCountPassenger.html(optionsFlights[2].count);
			$infantNamePassenger.html(optionsFlights[2].count > 1 ? optionsFlights[2].name + "s" : optionsFlights[2].name);
			$infantAgePassenger.html(optionsFlights[2].age);


			$totalPeople.html(totalPeople > 1 ? totalPeople + " Peoples" : totalPeople + " People");
			$totalRoom.html(totalRoom > 1 ? totalRoom + " Rooms" : totalRoom + " Room");
			$totalPassenger.html(totalPassenger > 1 ? totalPassenger + " Person" : totalPassenger + " Person");

			// disable [-] button after count less than 1
			if (options[0].count < 1) {
				$('.btn-dec-adult').attr("disabled", "disabled");
			} else {
				$('.btn-dec-adult').removeAttr("disabled");
			}

			if (options[1].count < 1) {
				$('.btn-dec-child').attr("disabled", "disabled");
			} else {
				$('.btn-dec-child').removeAttr("disabled");
			}

			if (optionsFlights[0].count < 1) {
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
			
		}

		// Enabling popover - not required for angular directives
		$(function () {
			$('[data-toggle="popover"]').popover()
		})

		
		
	<!-- //popup signup form -->

	<!-- js -->

	<!-- //js -->

	<!-- Stats-Number-Scroller-Animation-JavaScript -->

		jQuery(document).ready(function ($) {
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
		});
	<!-- //Stats-Number-Scroller-Animation-JavaScript -->

	<!-- Calendar -->

		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
	<!-- //Calendar -->

	<!-- for banner js file-->

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
				lazyLoad: false,
				autoPlay: true,
				navigation: false,
				navigationText: false,
				pagination: true,
			});
		});
	<!-- //requried-jsfiles-for owl -->
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
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	
	<!-- //here ends scrolling icon -->

	<!-- Scrolling Nav JavaScript -->

	<!-- //fixed-scroll-nav-js -->

	<!-- for bootstrap working -->

	<!-- //for bootstrap working -->

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
	
		
	
		function up1(max) {
			document.getElementById("myNumber1").value = parseInt(document.getElementById("myNumber1").value) + 1 + ' Passengers';
			if (document.getElementById("myNumber1").value.replace('Passengers', '') >= parseInt(max)) {
				document.getElementById("myNumber1").value = max + ' Passengers';
			}
		}
		function down1(min) {
			document.getElementById("myNumber1").value = parseInt(document.getElementById("myNumber1").value) - 1 + ' Passengers';
			if (document.getElementById("myNumber1").value.replace(' Passengers', '') <= parseInt(min)) {
				document.getElementById("myNumber1").value = min + ' Passengers';
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
	
		$(document).ready(function () {
			$("#out").click(function () {
				$("#div1").fadeOut();
				$("#div2").fadeOut("slow");
				$("#div3").fadeOut(3000);
				$("#out").hide();
				$("#in").show();

			});
		});
	
		$(function () {
			$("#out").hide();
		});
	
		$(document).ready(function () {
			$("#in1").click(function () {
				$("#in1").hide();
				$("#div4").fadeIn();
				$("#div5").fadeIn();
				$("#div6").fadeIn();
				$("#out1").show();


			});
		});
	
		$(document).ready(function () {
			$("#out1").click(function () {
				$("#div4").fadeOut();
				$("#div5").fadeOut();
				$("#div6").fadeOut();
				$("#out1").hide();
				$("#in1").show();

			});
		});
	
		$(function () {
			$("#out1").hide();
		});
	
		$(document).ready(function () {
			$("#in2").click(function () {
				$("#in2").hide();
				$("#div7").fadeIn();
				$("#div8").fadeIn();
				$("#div9").fadeIn();
				$("#div10").fadeIn();
				$("#out2").show();


			});
		});
	
		$(document).ready(function () {
			$("#out2").click(function () {
				$("#div7").fadeOut();
				$("#div8").fadeOut();
				$("#div9").fadeOut();
				$("#div10").fadeOut();
				$("#out2").hide();
				$("#in2").show();

			});
		});
	
		$(function () {
			$("#out2").hide();
		});
	
		$(document).ready(function () {
			$("#in3").click(function () {
				$("#in3").hide();
				$("#div11").fadeIn();
				$("#div12").fadeIn();
				$("#div13").fadeIn();
				$("#div14").fadeIn();
				$("#out3").show();


			});
		});
	

		let peopleCount = $('#total-people');

		let roomCount = $('#room-room');

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



		function toggleRemoveRoomBtn(divsAppended) {

			if (divsAppended > 1)
				$('#remove-parent').removeClass('hidden');
			else
				$('#remove-parent').addClass('hidden');
		}


		function toggleRoomCount(parentPopUp) {

			const appended = $(parentPopUp).find(".repeat:last-child");

			const roomCounter = $(appended).find("h4")[0];

			$(roomCounter).html("Room " + totalRoom);

			return parseInt($(appended).find('#adult-count').text()) + parseInt($(appended).find('#child-count').text());
		}


		function removeRoom(thisObj) {

			let divsAppended = $('.repeat').length;

			const elementToDelete = $("#room-content").find(".repeat")[divsAppended - 1];

			$(elementToDelete).remove();

			totalRoom--;

			const parentPopUp = $(thisObj).parents('div.pop-content')[0];

			const peopleCount = toggleRoomCount(parentPopUp);

			totalPeople -= peopleCount;

			RenderHtml(undefined);

			divsAppended = $('.repeat').length;

			toggleRemoveRoomBtn(divsAppended);

		}



		function addRoom(thisObj) {

			let toAppend = $('.repeat').clone().wrap('<div/>').parent().html();

			$('#room-content').append(toAppend);

			totalRoom++;

			const parentPopUp = $(thisObj).parents('div.pop-content')[0];

			const peopleCount = toggleRoomCount(parentPopUp);

			totalPeople += peopleCount;

			RenderHtml(undefined);

			let divsAppended = $(parentPopUp).find(".repeat").length;

			toggleRemoveRoomBtn(divsAppended);

		}

		function totalCountPassenger(thisObj) {

			// let toAppend = $('.repeat').clone().wrap('<div/>').parent().html();

			// $('#room-content').append(toAppend);

			// totalRoom++;

			const parentPopUp = $(thisObj).parents('div.pop-content')[0];

			const passengerCount = toggleRoomCount(parentPopUp);

			totalPassenger += passengerCount;

			RenderHtml(undefined);

			// let divsAppended = $(parentPopUp).find(".repeat").length;

			// toggleRemoveRoomBtn(divsAppended);

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
		