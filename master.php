<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prithivi Naryan Campus</title>
    <link href="mastl.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add any additional styles here */
    </style>
</head>

<body>

    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>

    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#">BCA<span>Web</span></a></div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#services" class="menu-btn">Services</a></li>
                <li><a href="#teams" class="menu-btn">Teams</a></li>
                <li><a href="#contact" class="menu-btn">Contact</a></li>
                <a href="system.php">Admin Login</a>
                <a href="login.php">student Login</a>
                <li class="dropdown">
                    <a href="#" class="menu-btn">Login <i class="fas fa-caret-down"></i></a>
                    <ul class="dropdown-content">
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="login.php">Students</a></li>
                    </ul>
                </li>

            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">WELCOME TO Prithivi Naryan Campus</div>
                <div class="text-2">BCA PROGRAM</div>
                <div class="text-3">OFFICIAL Website <span class="typing"></span></div>
            </div>

        </div>

    </section>

    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About Us</h2>
            <div class="about-content">
                <p>Welcome to Prithivi Naryan Campus, home to the Bachelor of Computer Applications (BCA) program. Established with a vision to provide cutting-edge education in the field of computer applications, our campus fosters innovation and academic excellence.</p>
                <p>Our mission is to empower students with the skills and knowledge necessary to thrive in the digital age. With state-of-the-art facilities and dedicated faculty, we aim to nurture future leaders in the IT industry.</p>
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Our Services</h2>
            <div class="services-content">
                <ul>
                    <li><i class="fas fa-check-circle"></i> Comprehensive BCA curriculum</li>
                    <li><i class="fas fa-check-circle"></i> Modern classrooms and labs</li>
                    <li><i class="fas fa-check-circle"></i> Career counseling and placement assistance</li>
                    <li><i class="fas fa-check-circle"></i> Industry partnerships and internships</li>
                    <li><i class="fas fa-check-circle"></i> Extracurricular activities and events</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="teams" id="teams">
        <div class="max-width">
            <h2 class="title">Our Teams</h2>
            <div class="teams-content">
                <p>At Prithivi Naryan Campus, teamwork and collaboration are at the heart of our success. Our dedicated teams ensure smooth operations and support across various departments:</p>
                <ul>
                    <li><strong>Academic Affairs:</strong> Oversees curriculum development and student progress.</li>
                    <li><strong>Student Services:</strong> Provides support for student activities and well-being.</li>
                    <li><strong>Administrative Staff:</strong> Manages campus operations and facilities.</li>
                    <li><strong>IT Support:</strong> Ensures seamless technology integration and support.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact Us</h2>
            <div class="contact-content">
                <p>If you have any questions or inquiries, feel free to reach out to us:</p>
                <ul>
                    <li><strong>Address:</strong> 123 Prithivi Naryan Campus, City, Country</li>
                    <li><strong>Email:</strong> info@prithivinaryan.edu</li>
                    <li><strong>Phone:</strong> +123 456 7890</li>
                </ul>
                <p>We are open Monday to Friday, from 9:00 AM to 5:00 PM.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="max-width">
            <div class="footer-content">
                <div class="footer-section about">
                    <h3>About Prithivi Naryan Campus</h3>
                    <p>Prithivi Naryan Campus is a leading institution offering the BCA program, committed to excellence in education and student development.</p>
                </div>
                <div class="footer-section contact-form">
                    <h3>Contact Us</h3>
                    <form class="form">
                        <div class="title">Contact us</div>
                        <input type="text" placeholder="Your email" class="input">
                        <textarea placeholder="Your message"></textarea>

                        <button>Submit</button>
                    </form>
                </div>
            </div>
            <div class="social-icons">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <p>&copy; 2024 BCA,PRITHIVI NARYAN CAMPUS,POKHARA. All rights reserved.</p>
    </footer>

    <script>
        // Add JavaScript if needed
        document.addEventListener('DOMContentLoaded', function() {
            // Get the login button element
            const loginButton = document.querySelector('.menu-btn');

            // Add click event listener to toggle dropdown
            loginButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default behavior of the anchor tag
                const dropdown = this.parentElement;
                dropdown.classList.toggle('open');
            });

            // Close dropdown if user clicks outside of it
            document.addEventListener('click', function(event) {
                const dropdown = document.querySelector('.dropdown');
                if (!dropdown.contains(event.target)) {
                    dropdown.classList.remove('open');
                }
            });
        });
    </script>

</body>

</html>