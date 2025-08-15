var selectedDomain = "General"; // Default domain

// Function to set the chatbot domain when a menu item is clicked
function setChatbotDomain(domain) {
    selectedDomain = domain;
    document.querySelector(".wlc h1").textContent = `How can I help you with ${domain}?`;
}

// Function to send a message
function sendMessage() {
    var userInput = document.getElementById("userInput");
    var chatBox = document.getElementById("chatBox");

    var text = userInput.value.trim();
    if (text === ""){
        alert("Please give prompt");
        return;
    }

    // Display user message
    appendMessage("user", text);
    userInput.value = "";

    // Show loading indicator
    appendMessage("bot", "🤔 Thinking...");

    // Send user message and selected domain to the server
    fetch("response.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ text: text, domain: selectedDomain }),
    })
    .then(res => res.text())
    .then(response => {
        removeLastBotMessage();
        appendMessage("bot", response);
    })
    .catch(err => {
        removeLastBotMessage();
        appendMessage("bot", "Oops! Something went wrong. Try again.");
    });
}

// Function to append messages to the chat box
function appendMessage(sender, message) {
    var chatBox = document.getElementById("chatBox");
    var messageDiv = document.createElement("div");
    messageDiv.classList.add("chat-message", sender === "user" ? "user-message" : "bot-message");
    messageDiv.innerText = message;
    chatBox.appendChild(messageDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
}

function removeLastBotMessage() {
    var chatBox = document.getElementById("chatBox");
    var botMessages = chatBox.getElementsByClassName("bot-message");
    if (botMessages.length > 0) {
        chatBox.removeChild(botMessages[botMessages.length - 1]);
    }
}

// Enable sending message on pressing Enter
document.getElementById("userInput").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
});
