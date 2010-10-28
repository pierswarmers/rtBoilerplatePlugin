$(function(){
  /*
    Section: Your code goes here...
  */























  /*
    Section: Spice up the form rows to be highlighted.
  */
  $('.rt-form-row textarea,.rt-form-row input').focus(function(){
    $(this).parents('li').addClass('rt-highlight');
  }).blur(function(){
    $(this).parents('li').removeClass('rt-highlight');
  });
});