$("body").toggleClass(localStorage.toggled);

function darkMode() {
  /*DARK CLASS*/
  if (localStorage.toggled != 'dark-theme') {
    $('body').toggleClass('dark-theme', true);
    localStorage.toggled = "dark-theme";
     
  } else {
    $('body').toggleClass('dark-theme', false);
    localStorage.toggled = "";
  }
}

/*Add 'checked' property to input if background == dark*/
if ($('body').hasClass('dark-theme')) {
   $( '#checkbox' ).prop( "checked", true )
} else {
  $( '#checkbox' ).prop( "checked", false )
}