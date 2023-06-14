$(document).ready(function() {
    var placeholderTexts = ["enter artist's name to search..."];
    var placeholderElements = $('.typing-effect');
    var typingSpeed = 130; 
    
    function typeText(text, element) {
      var currentText = '';
      var index = 0;
  
      setInterval(function() {
        if (index < text.length) {
          currentText += text[index];
          index++;
        } else {
          currentText = '';
          index = 0;
        }
        var placeholderElement = $(element);
        placeholderElement.attr('placeholder', currentText);
      }, typingSpeed);
    }
  
    placeholderElements.each(function(index, element) {
      var placeholderText = placeholderTexts[index];
      typeText(placeholderText, element);
    });
  });
  