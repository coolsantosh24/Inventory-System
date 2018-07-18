$(document).ready(function() {
    var chatInterval = 250; //refresh interval in ms
    var $userName = $("#userName");
    var $chatOutput = $("#chatOutput");
    var $chatInput = $("#chatInput");
    var $chatSend = $("#chatSend");

    function sendMessage() {
        var userNameString = $userName.val();
        var chatInputString = $chatInput.val();

        $.get("write.php", {
            username: userNameString,
            text: chatInputString
        });

        $userName.val("");
        retrieveMessages();
    }

    function retrieveMessages() {
        $.get("read.php", function(data) {
            $chatOutput.html(data); //Paste content into chat output
        });
    }

    $chatSend.click(function() {
        sendMessage();
    });
    
    chatInput.addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
        sendMessage();
    }
});


    setInterval(function() {
        retrieveMessages();
    }, chatInterval);
});