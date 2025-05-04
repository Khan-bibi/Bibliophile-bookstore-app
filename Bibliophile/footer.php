<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Footer Section -->
<footer>
    <div class="footer-container">
        <!-- Footer Logo -->
        <div class="footer-logo">
            <img src="logo.png" alt="Footer Logo" class="footer-logo-img">
        </div>

         <!-- Site Map Section -->
         <div class="footer-sitemap">
            <h5>Site Map</h5>
            <ul class="sitemap-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="events.php">Events</a></li>
            </ul>
        </div>

        <!-- Newsletter Subscription -->
        <div class="footer-subscribe">
            <h5>Subscribe to our Newsletter</h5>
            <form action="#" method="post" class="subscribe-form">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit" class="subscribe-btn">Subscribe</button>
            </form>

            <!-- Contact Us Section -->
            <div class="footer-contact">
                <h5>Contact Us</h5>
                <a href="mailto:contact@bibliophile.com">contact@bibliophile.com</a>
            </div>
        </div>
    </div>

    <!-- Footer Bottom with Social Links -->
    <div class="footer-bottom">
        <p class="p1">&copy; 2024 Bibliophile. All rights reserved.</p>
        <div class="social-links">
            <a href="#"><img src="facebook.svg" alt="Facebook" class="social-icon"></a>
            <a href="#"><img src="twitter-x.svg" alt="Twitter" class="social-icon"></a>
            <a href="#"><img src="instagram.svg" alt="Instagram" class="social-icon"></a>
        </div>
    </div>
</footer>

</body>
</html>
