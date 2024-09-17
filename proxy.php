<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    // Validate the URL
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        echo "Invalid URL";
        exit;
    }

    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    // Execute the request
    $response = curl_exec($ch);
    
    // Check for errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }

    // Get content type
    $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    
    // Close cURL session
    curl_close($ch);

    // Set the appropriate content type
    header("Content-Type: $contentType");
    
    // Output the response
    echo $response;
} else {
    echo "No URL specified.";
}
?>
