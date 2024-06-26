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
    $join_reason = $_POST["join_reason"];
    $unit_choice = $_POST["unit_choice"];
    $arma_experience = $_POST["arma_experience"];
    $unit_experience = $_POST["unit_experience"];
    $other_units = $_POST["other_units"];
    $leadership_experience = $_POST["leadership_experience"];
    $real_life_experience = $_POST["real_life_experience"];
    $dishonorably_discharged = $_POST["dishonorably_discharged"];
    $recruitment_policy_confirmation = $_POST["recruitment_policy_confirmation"];

    // Construct message
    $message = "New Application:\n\n";
    $message .= "First Name Initial: $first_name\n";
    $message .= "Last Name: $last_name\n";
    $message .= "Age: $age\n";
    $message .= "Region: $region\n";
    $message .= "Discord Username: $discord_username\n";
    $message .= "Steam Profile: $steam_profile\n";
    $message .= "Mic: $mic\n";
    $message .= "Why do you want to join NSWG1: $join_reason\n";
    $message .= "Unit Choice: $unit_choice\n";
    $message .= "Arma Experience: $arma_experience\n";
    $message .= "Unit Experience: $unit_experience\n";
    $message .= "Other Units: $other_units\n";
    $message .= "Leadership Experience: $leadership_experience\n";
    $message .= "Real Life Experience: $real_life_experience\n";
    $message .= "Dishonorably Discharged: $dishonorably_discharged\n";
    $message .= "Recruitment Policy Confirmation: $recruitment_policy_confirmation\n";

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
        header('Location: /applications/application-success.html');
        exit;
    }
} else {
    // Handle case where form is not submitted
    echo "Form submission error. Please try again.";
}
?>