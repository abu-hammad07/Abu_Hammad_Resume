<aside class="sidebar" data-sidebar>

    <div class="sidebar-info">

        <div class="info-content">
            <?php
            if(isset($_SESSION['success_msg'])) {
                echo '<p class="title">' . $_SESSION['success_msg'] . '</p>';
                unset($_SESSION['success_msg']);
            }
            if(isset($_SESSION['error_msg'])) {
                echo '<p class="title">' . $_SESSION['error_msg'] . '</p>';
                unset($_SESSION['error_msg']);
            }
            ?>
            <!-- <p class="title">Backend developer</p> -->
        </div>

        <figure class="avatar-box">
            <img src="./assets/images/my-avatar.png" alt="Richard hanrick" width="80">
        </figure>

        <div class="info-content">
            <h1 class="name" title="Richard hanrick">Abu Hammad</h1>

            <p class="title">Backend developer</p>
        </div>

        <button class="info_more-btn" data-sidebar-btn>
            <span>Show Contacts</span>

            <ion-icon name="chevron-down"></ion-icon>
        </button>

    </div>

    <div class="sidebar-info_more">

        <div class="separator"></div>

        <ul class="contacts-list">

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="mail-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Email</p>

                    <a href="mailto:hammadkamal2003@gmail.com" class="contact-link">hammadkamal2003@gmail.com</a>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="phone-portrait-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Phone</p>

                    <a href="tel:+923131192139" class="contact-link">+92 313 1192139</a>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Birthday</p>

                    <time datetime="2003-11-07">November 07, 2003</time>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="location-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Location</p>

                    <address>Landhi, Karachi, Pakistan</address>
                </div>

            </li>

        </ul>

        <div class="separator"></div>

        <ul class="social-list">

            <li class="social-item">
                <a href="https://www.facebook.com/abu.hammad23" class="social-link" target="_blank">
                    <ion-icon class="socials-icons" name="logo-facebook"></ion-icon>
                </a>
            </li>

            <li class="social-item">
                <a href="https://twitter.com/imhammad_a" class="social-link" target="_blank">
                    <ion-icon class="socials-icons" name="logo-twitter"></ion-icon>
                </a>
            </li>

            <li class="social-item">
                <a href="https://www.instagram.com/abu_hammad07/" class="social-link" target="_blank">
                    <ion-icon class="socials-icons" name="logo-instagram"></ion-icon>
                </a>
            </li>

        </ul>

    </div>

</aside>