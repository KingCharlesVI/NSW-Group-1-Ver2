<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name_initial = $_POST["initial"];
    $last_name = $_POST["lastname"];
    $assignment_date = $_POST["assignment_date"];
    $admin_positions = $_POST["admin_positions"];
    $admin_position_details = $_POST["admin_position_details"];
    $shop_interest = $_POST["shop_interest"];
    $sub_category_interest = $_POST["sub_category_interest"];
    $skills = $_POST["skills"];
    $responsibility_confirmation = $_POST["responsibility_confirmation"];

    // Construct message
    $message = "New Application:\n\n";
    $message .= "First Name Initial: $first_name_initial\n";
    $message .= "Last Name: $last_name\n";
    $message .= "Date of Assignment: $assignment_date\n";
    $message .= "Administrative Positions Held: $admin_positions\n";
    $message .= "Admin Position Details: $admin_position_details\n";
    $message .= "Shop(s) of Interest: $shop_interest\n";
    $message .= "Sub-category(ies) of Interest: $sub_category_interest\n";
    $message .= "Skills: $skills\n";
    $message .= "Responsibility Confirmation: $responsibility_confirmation\n";

    // Send message to Discord webhook
    $webhook_url = "https://discord.com/api/webhooks/1237063429487853608/YwCBRma8uJEtmJB2-19YL5T5VYOt4NzAbugElcC_liQ_f1VlBxxLSrQ-d9EWUK7m-mgO";
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
        header('Location: /applications/shop-success.html');
        exit;
    }
} else {
    // Handle case where form is not submitted
    echo "Form submission error. Please try again.";
}
?>