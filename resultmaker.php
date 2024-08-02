<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate'])) {
    // Check if the form is submitted and the 'generate' button is clicked
    
    // Sanitize user input
    $name = isset($_POST['name']) ? strtoupper(trim($_POST['name'])) : '';

    // Check if the name is not empty
    if (!empty($name)) {
        // Path to the certificate picture
        $image = "certi.png";

        // Create image resource from the certificate picture
        $createimage = imagecreatefrompng($image);

        // Path to the output certificate picture
        $output = "certificate.png";

        // Set colors for text
        $white = imagecolorallocate($createimage, 205, 245, 255);
        $black = imagecolorallocate($createimage, 0, 0, 0);

        // Set text parameters
        $rotation = 0;
        $origin_x = 200;
        $origin_y = 260;
        $font_size = 20; // Increase font size for better visibility
        $certificate_text = $name;

        // Path to the font file
        $font_path = "developer.ttf";

        // Check if the font file exists
        if (file_exists($font_path)) {
            // Add text to the image
            imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $font_path, $certificate_text);

            // Save the image
            imagepng($createimage, $output, 3);

            // Free up memory
            imagedestroy($createimage);

            // Redirect to the generated certificate
            header("Location: $output");
            exit;
        } else {
            echo "Font file not found.";
        }
    } else {
        echo "Please enter a valid name.";
    }
}
?>

<html>
<form method="post" action="">
    <div class="form-group col-sm-6">
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name Here...">
    </div>
    <button type="submit" name="generate" class="btn btn-primary">Generate</button>
</form>
</html>
