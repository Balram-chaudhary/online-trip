$(".btn").click(function(){
  $(".input").toggleClass("active").focus;
  $(this).toggleClass("animate");
  $(".input").val("");
});

/* Fell free to visit my youtube channel for more updates,
https://www.youtube.com/channel/UCtVM2RthR4aC6o7dzySmExA
*/


/*
let me explain what's happening in the above gif, first, we can the search icon with background color, whenever we click the icon, Input field slides out from the left side. and we see the icon rotation. and a slide-in and slide-out effect in both(icon and input) to the left side. 

HTML structure
Let's get started by creating the <strong>wrapper</strong> div element with <strong>serach-box</strong> div element. and within that create the input field and <strong>btn</strong> div element with search icon in it.

*/