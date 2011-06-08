/*!
 *
 * script.js
 * 
 * RediType: rtBoilerplatePlugin
 * Based upon: http://html5boilerplate.com/
 *
 */

$(function(){
  /*
    Section: Your code goes here...
  */






  /*
    Section: Spice up the form rows to be highlighted.
  */
  $('.section textarea,.section input,.section select').focus(function(){
    $(this).parents('li').addClass('highlight');
  }).blur(function(){
    $(this).parents('li').removeClass('highlight');
  });
});