$(document).ready(function() {
  $('.answer').hide();

  $('.question').click(function() {
    $(this).next('.answer').slideToggle(300);
      $(this).children(this, 'i').toggleClass('fa-chevron-down');
    
    
	
  });
  
  $('.container h3').click(function() {
    $(this).next('.answer').slideToggle(300);
  });

});