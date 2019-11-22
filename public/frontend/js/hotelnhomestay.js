 $(document).on('click',function(){
    var checkin = new Date();
    var checkout = new Date(checkin.getTime() + (24 * 60 * 60 * 1000)); //plus 1 day
    $('#checkin').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      startDate: checkin,
      endDate: '+3m',
      todayHighlight: true
    }).on('changeDate', function(e){
        checkout = new Date(e.date.getTime() + (24 * 60 * 60 * 1000)); //set new end date
        $('#checkout').datepicker('setStartDate', checkout); //dynamically set new start date for #to
        $('#checkout').focus();
        });
    $('#checkout').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      endDate: '+3m',
      startDate: checkout,
      todayHighlight: false
    }).on('changeDate', function(e){
        //if current date is bigger than start date
        if (e.date.valueOf() < checkin.valueOf()){
             alert(e.date.toString()); //called when date is changed
        }
       $('#popRooms').focus();

        });

     })

      //hotel search ajax
     
    

//checkbox search
$(':checkbox').on('change',function(){
 var th = $(this), name = th.attr('name'); 
 if(th.is(':checked')){
     $(':checkbox[name="'  + name + '"]').not(th).prop('checked',false);   
  }
});
 
   

      // Price Sort details  
        $('.price_all').on('change', function() {     
                $('.price').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.price').change(function(){ //".checkbox" change 
            if($('.price:price').length == $('.price').length){
                   $('.price_all').prop('checked',true);
            }else{
                   $('.price_all').prop('checked',false);
            }
        });
    

    //Modify search hotels
    $(function () {
        $("#anotherroom").click(function(){
           var n= $("#modifiedtraveller tr").length;
           if(n ==3){
            $('#anotherroom').hide();
          }
         
          n++;
            var _tr = '<tr><td><div class="form-group"><p id="roomno">Room '+ n +':</p></div></td><td><div class="form-group"><label for="madults" id="adultlabel">Number of Adults</label><select class="form-control" id="modifyadults"><option>1</option><option>2</option><option>3</option><option>4</option></select></div></td><td><div class="form-group"><label for="mchilds" id="childlabel">Number of Childrens</label><select class="form-control" id="modifychilds"><option>1</option><option>2</option><option>3</option><option>4</option></select></div></td><td><button type="button" class = "btn btn-danger btn-delete" style="margin-top:13px;">Delete Room </button></td></tr>'
            $('tbody').append(_tr);
            
        });

        $(document).on('click','.btn-delete',function(){
            if(confirm("Are you sure you want to delete"))
            {
            $(this).closest('tr').remove(); 
            }
           var n= $("#modifiedtraveller tr").length;
             if(n==3){
            $('#anotherroom').show();
          }

            
        });
    });
    

function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}

  
// Hotel submit button enable disable
      $(document).ready(function(){
          $('.enableOnInputHotel').attr('disabled',true);
          var count=0;
          var popClick=0;
          $('#area,#checkin,#checkout').on('change',function(){
            count++;

          $('#popRooms').on('click',function(){
            popClick +=count;
           if(popClick >8 )
                  $('.enableOnInputHotel').attr('disabled', false);            
              else
                  $('.enableOnInputHotel').attr('disabled',true);

          })
      })
      });

        //hotel review and payment 
        $(function () {
            var nadults= $("#adults").val();
            var i=0;
            for(i=0;i<nadults-1;i++){
            var _tr = '<tr><td><input type="text" class="form-control" name="firstName[]" id="travellerfirstName" placeholder="Enter first name" required="required"></td><td><input type="text" class="form-control" name="middleName[]" id="travellermiddleName"  placeholder="Enter middle name" required="required"></td><td><input type="text" class="form-control" name="lastName[]" id="travellerlastName" placeholder="lastName" required="required"></td></tr>';
            $('tbody').append(_tr);  
            }
         });
        

// Homestay submit button enable disable
$(document).ready(function(){
    $('.enableOnInputHomestay').attr('disabled',true);
    var countHomestay=0;
    var popClickHomestay=0;
    $('#fromhomestay,#checkinhomestay,#checkouthomestay').on('change',function(){
      countHomestay++;
    $('#popRoomsHomestay').on('click',function(){
      popClickHomestay +=countHomestay;
     if(popClickHomestay >8 )
            $('.enableOnInputHomestay').attr('disabled', false);            
        else
            $('.enableOnInputHomestay').attr('disabled',true);

    })
})
});

//datepicker homestay
$(document).on('click',function(){
    var checkinhomestay = new Date();
    var checkouthomestay = new Date(checkinhomestay.getTime() + (24 * 60 * 60 * 1000)); //plus 1 day
    var modifycheckinhomestay=new Date(checkinhomestay.getTime());//checkin for modify search
    var modifycheckouthomestay=new Date(modifycheckinhomestay.getTime());//checkout for modify search
    $('#checkinhomestay').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      startDate: checkinhomestay,
      endDate: '+3m',
      todayHighlight: true
    }).on('changeDate', function(e){
        checkouthomestay = new Date(e.date.getTime() + (24 * 60 * 60 * 1000)); //set new end date
        modifycheckinhomestay=new Date(e.date.getTime());//set new date for modifycheckin
        $('#checkouthomestay').datepicker('setStartDate', checkouthomestay); //dynamically set new start date for #to
        $('#modifycheckinhomestay').datepicker('setStartDate',modifycheckinhomestay);
        });
    $('#checkouthomestay').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      endDate: '+3m',
      startDate: checkouthomestay,
      todayHighlight: false
    }).on('changeDate', function(e){
         modifycheckouthomestay=new Date(e.date.getTime());//set new date for modifycheckin
         $('#modifycheckouthomestay').datepicker('setStartDate',modifycheckouthomestay);
        //if current date is bigger than start date
        if (e.date.valueOf() < checkinhomestay.valueOf()){
             alert(e.date.toString()); //called when date is changed
        }

        });

     $('#modifycheckinhomestay').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      startDate: modifycheckinhomestay,
      endDate: '+3m',
      todayHighlight: false
    }).on('changeDate', function(e){
        $('#modifycheckouthomestay').datepicker('setStartDate', modifycheckouthomestay); //dynamically set new start date for #to
        });

    $('#modifycheckouthomestay').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      endDate: '+3m',
      startDate: modifycheckouthomestay,
      todayHighlight: false
    }).on('changeDate', function(e){
         // $('#modifycheckouthomestay').datepicker('setStartDate',modifycheckouthomestay);
        //if current date is bigger than start date
        if (e.date.valueOf() < modifycheckinhomestay.valueOf()){
             alert(e.date.toString()); //called when date is changed
        }

        });
     })

   //datepicker homestay modifysearch


// Search data homestay

   

<!-- Customer detai form homestay -->
  $(function () {
       var nadults= $("#adultshomestay").val();
       var i=0;
      for(i=0;i<nadults-1;i++){
         var _tr = '<tr><td><input type="text" class="form-control" name="firstName[]" id="travellerfirstName" placeholder="Enter first name" required="required"></td><td><input type="text" class="form-control" name="middleName[]" id="travellermiddleName"  placeholder="Enter middle name" required="required"></td><td><input type="text" class="form-control" name="lastName[]" id="travellerlastName" placeholder="lastName" required="required"></td></tr>'
         $('table').append(_tr);
      }       
    
  });
  

       //price all check homestay
        $('.price_all').on('change', function() {     
                $('.price').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.price').change(function(){ //".checkbox" change 
            if($('.price:price').length == $('.price').length){
                   $('.price_all').prop('checked',true);
            }else{
                   $('.price_all').prop('checked',false);
            }
        });

/////homestay datepicker/////////////

$(document).on('click',function(){
    var checkinhomestay = new Date();
    var checkouthomestay = new Date(checkinhomestay.getTime() + (24 * 60 * 60 * 1000)); //plus 1 day
    $('#checkinhomestay').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      startDate: checkinhomestay,
      endDate: '+3m',
      todayHighlight: true
    }).on('changeDate', function(e){
        checkouthomestay = new Date(e.date.getTime() + (24 * 60 * 60 * 1000)); //set new end date
        $('#checkouthomestay').datepicker('setStartDate', checkouthomestay); //dynamically set new start date for #to
        });
    $('#checkouthomestay').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      endDate: '+3m',
      startDate: checkouthomestay,
      todayHighlight: false
    }).on('changeDate', function(e){
        //if current date is bigger than start date
        if (e.date.valueOf() < checkinhomestay.valueOf()){
             alert(e.date.toString()); //called when date is changed
        }

        });

     })

////////////////////////homestay


