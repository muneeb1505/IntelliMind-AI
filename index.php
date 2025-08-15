<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo"><img src="chatbot logo.png" alt="">InteliMind</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">About</a>
            <div class="dropdown">
    <button class="dropbtn">Chatbots <img src="down-arrow.png" alt="" width="20" height="20"></button>
    <div class="dropdown-content">
        <a href="career.html">Career</a>
        <a href="travel.html">Travel</a>
        <a href="health.html">Health</a>
        <a href="Entertainment.html">Entertainment</a>
    </div>
</div>
            <a href="#">Contact</a>
        </div>
        <div class="nav-right">
            <a href="login.php" class="btn btn-success mx-2" role="button">Login</a>
            <a href="signup.php" class="btn btn-primary mx-2" role="button">Sign Up</a>
        </div>
    </div>
    
    <div class="wlc">
        <h1>How can I help you?</h1>
    </div>

    <div class="main-content">
        <div class="chat-container">
            <div class="chat-box" id="chatBox"></div>
            <div class="chat-input">
                <input type="text" id="userInput" placeholder="Ask Anything...">
                <button onclick="sendMessage();" class="send-icon">
                    <img src="send-icon.png" alt="Send" width="20" height="20">
                </button>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>