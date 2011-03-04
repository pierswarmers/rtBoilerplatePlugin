/*!
 *
 * plugins.js
 * 
 * RediType: rtBoilerplatePlugin
 * Based upon: http://html5boilerplate.com/
 *
 */

(function($){
  /*
    Section: Your code goes here...
  */






})(this.jQuery);


window.log = function(){
  log.history = log.history || [];
  log.history.push(arguments);
  if(this.console){
    console.log( Array.prototype.slice.call(arguments) );
  }
};
(function(doc){
  var write = doc.write;
  doc.write = function(q){
    log('document.write(): ',arguments);
    if (/docwriteregexwhitelist/.test(q)) write.apply(doc,arguments);
  };
})(document);