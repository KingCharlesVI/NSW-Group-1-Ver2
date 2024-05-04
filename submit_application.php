<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $region = $_POST["region"];
    $discord_username = $_POST["discord_username"];
    $steam_profile = $_POST["steam_profile"];
    $mic = $_POST["mic"];

    // Construct message
    $message = "New Application:\n\n";
    $message .= "First Name Initial: $first_name\n";
    $message .= "Full Last Name: $last_name\n";
    $message .= "Age: $age\n";
    $message .= "Region: $region\n";
    $message .= "Discord Username: $discord_username\n";
    $message .= "Steam Profile: $steam_profile\n";
    $message .= "Mic: $mic\n";

    // Send message to Discord webhook
    $webhook_url = "https://discord.com/api/webhooks/1236316242109927495/ssponkg2sVgcklbKqwXU_SbSq4aBiZ7_cAB2BjpZHf62u2KPvZhwpRctgud4877IHOyq";
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
        echo "Application submitted successfully!";
    }
} else {
    // Handle case where form is not submitted
    echo "Form submission error. Please try again.";
    echo "<button onclick=\"window.location.href='index.html'\">Back to Homepage</button>";
}
?>
