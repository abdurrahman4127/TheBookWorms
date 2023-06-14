document.addEventListener("DOMContentLoaded", function () {
    var text = "Hey, there!! Welcome to The Bookworms";
    
    var typingTextElement = document.getElementById("typing-text");
    typingTextElement.textContent = "";
   
    var index = 0;
    function startTyping() {
        if (index < text.length) {
            typingTextElement.textContent += text.charAt(index);
            index++;
            setTimeout(startTyping, 100);
        } else {
            index = 0; // typing effect completed, reset index and text content
            typingTextElement.textContent = "";
            setTimeout(startTyping, 1000); //delay before repeating
        }
    }

    startTyping();
});
