<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST["initial"];
    $last_name = $_POST["lastname"];
    $age = $_POST["age"];
    $region = $_POST["region"];
    $discord_username = $_POST["discord"];
    $steam_profile = $_POST["steam"];
    $mic = $_POST["mic"];

    // Construct message
    $message = "New Application:\n\n";
    $message .= "First Name Initial: $first_name\n";
    $message .= "Last Name: $last_name\n";
    $message .= "Age: $age\n";
    $message .= "Region: $region\n";
    $message .= "Discord Username: $discord_username\n";
    $message .= "Steam Profile: <$steam_profile\n>";
    $message .= "Mic: $mic\n";

    // Send message to Discord webhook
    $webhook_url = "https://discord.com/api/webhooks/1236626202261983253/L_541D2VL9AZg7E40Pxs9KVZmezAJrLblet8IeCIRRvozLyyk592kZDnVdQAxjHi1Nkz";
    $data = array("content" => $message);
    $options = array(
        "http" => array(
            "header" => "Content-Type: application/json",
            "method" => "POST",
            "content" => json_encode($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($webhook_url, false, $context);

    // Check if message was sent successfully
    if ($result === false) {
        // Handle error
        echo "Error sending application. Please try again later.";
    } else {
        // Application submitted successfully
        echo "<div id='success-message'>Application submitted successfully! Redirecting in <span id='countdown'>5</span> seconds...</div>";
        echo "<script>
                var countdown = 5;
                setInterval(function() {
                    countdown--;
                    document.getElementById('countdown').textContent = countdown;
                    if (countdown <= 0) {
                        window.location.href = 'index.html';
                    }
                }, 1000);
              </script>";
    }
} else {
    // Handle case where form is not submitted
    echo "Form submission error. Please try again.";
}
?>