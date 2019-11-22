//add div to flight twoway
    $('#twoway').click(function (e) {
    var divcontain= '<div class="col-md-2 col-xs-3 form-time-w3layouts editContent" ><div class="input-group editContent1"><input type="text" id="twowaysdatepicker" class="form-control date has Datepicker home-button" placeholder="To" value="Departure" required="required" autocomplete="off" readonly="readonly"><i class="glyphicon glyphicon-calendar"></i></div></div>';
     document.getElementById('twowaydiv1').innerHTML =divcontain;

    });
    $('#oneway').click(function (e) {
        document.getElementById('twowaydiv1').innerHTML="";

    });
    
// flight two way datepicker............
$(document).on('click',function(){
    $("td.disabled:last~td:first" ).css({"background-color":"#14c26e","color":"#fff","height":"38px","width":"44px","border-radius":"67%","display":"inline-block"});
    var datepickern = new Date();
    var twowaysdatepicker = new Date(datepickern.getTime() + (24 * 60 * 60 * 1000)); //plus 1 day
    $('#datepickern').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      startDate: datepickern,
      endDate: '+3m',
      todayHighlight: true
    }).on('changeDate', function(e){
        twowaysdatepicker = new Date(e.date.getTime() + (24 * 60 * 60 * 1000)); //set new end date
        $('#twowaysdatepicker').datepicker('setStartDate', twowaysdatepicker); //dynamically set new start date for #to
        });
    $('#twowaysdatepicker').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      endDate: '+3m',
      startDate: twowaysdatepicker,
      todayHighlight: false
    }).on('changeDate', function(e){
        //if current date is bigger than start date
        if (e.date.valueOf() < datepickern.valueOf()){
             alert(e.date.toString()); //called when date is changed
        }

        });

     })

    //modify checkin checkout hotel
     $(function() {
        $( "#modifycheckin,#modifycheckout" ).datepicker();
    });
    
    //passanger in flight
		// declaring variables
		
		
		var totalPassenger = 1;
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
		
		totalPassenger = countTotalPassenger();
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
			var $adultCountPassenger = thisObj == undefined ? $('#traveller-adult-count') : $($(thisObj).siblings('#traveller-adult-count'));
			var $adultNamePassenger = thisObj == undefined ? $('#traveller-adult-name') : $($(thisObj).siblings('#traveller-adult-name'));
			var $adultAgePassenger = thisObj == undefined ? $('#traveller-adult-age') : $($(thisObj).siblings('#traveller-adult-age'));
			
			var $childCountPassenger = thisObj == undefined ? $('#traveller-child-count') : $($(thisObj).siblings('#traveller-child-count'));
			var $childNamePassenger = thisObj == undefined ? $('#traveller-child-name') : $($(thisObj).siblings('#traveller-child-name'));
			var $childAgePassenger = thisObj == undefined ? $('#traveller-child-age') : $($(thisObj).siblings('#traveller-child-age'));
			
			var $infantNamePassenger = thisObj == undefined ? $('#traveller-infant-name') : $($(thisObj).siblings('#traveller-infant-name'));
			var $infantAgePassenger = thisObj == undefined ? $('#traveller-infant-age') : $($(thisObj).siblings('#traveller-infant-age'));
			var $infantCountPassenger = thisObj == undefined ? $('#traveller-infant-count') : $($(thisObj).siblings('#traveller-infant-count'));

			var $totalPassenger = $('#total-passenger');

			$adultCountPassenger.html(optionsFlights[0].count);
			$adultNamePassenger.html(optionsFlights[0].count > 1 ? optionsFlights[0].name + "s" : optionsFlights[0].name);
			$adultAgePassenger.html(optionsFlights[0].age);

			$childCountPassenger.html(optionsFlights[1].count);
			$childNamePassenger.html(optionsFlights[1].count > 1 ? optionsFlights[1].name + "s" : optionsFlights[1].name);
			$childAgePassenger.html(optionsFlights[1].age);

			$infantCountPassenger.html(optionsFlights[2].count);
			$infantNamePassenger.html(optionsFlights[2].count > 1 ? optionsFlights[2].name + "s" : optionsFlights[2].name);
			$infantAgePassenger.html(optionsFlights[2].age);

			$totalPassenger.html(totalPassenger > 1 ? totalPassenger + " Person" : totalPassenger + " Person");


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
	

	

	<!-- for bootstrap working -->
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


		

	
		$('html').on('click', function(e) {
  if (typeof $(e.target).data('original-title') == 'undefined' &&
     !$(e.target).parents().is('.popover.in')) {
    $('[data-original-title]').popover('hide');
  }
});
		
   		