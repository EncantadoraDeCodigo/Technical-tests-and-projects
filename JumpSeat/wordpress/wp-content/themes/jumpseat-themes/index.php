<?php

/**
 * The main template file
 * Este es el archivo de plantilla principal en un tema de WordPress.
 * Es utilizado para mostrar una página cuando no hay una plantilla más específica que coincida con una consulta.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WordPress
 * @subpackage JumpSeat
 * @since JumpSeat 1.0
 */
// Cargar WordPress
require_once('C:/xampp/htdocs/wordpress/wp-load.php');

get_header(); // Incluye header.php
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0-beta3/css/all.min.css" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

</head>

<body <?php body_class(); ?>>

    <div class="main-content">
        <h1>B2B SUCCESS IS IN THE AIR</h1>
        <p>JumpSeat exists for the sole purpose to help you create momentum.</p>
        <p>Momentum is the unmistakable energy on a winning B2B revenue team. It gives <br> everyone the confidence to push themselves further, faster and to greater heights.</p>
        <a href="#" class="buttonB2B">
            FLY WITH US <i class="button-icon">&rarr;</i>
        </a>
    </div>

    <div class="split-container">
        <div class="logo-split">
            <i class="material-icons">flight_takeoff</i>
            <h1>AIRPLANE</h1>
        </div>

        <div class="contenedor">
            <div class="textos">

                <h3>Time</h3>
                <h2>Destination</h2>
                <h4>Gate</h4>
            </div>
        </div>


        <div id="split1" class="split">
            >
            <div class="center"></div>
        </div>
        <div id="split2" class="split">

            <div class="center"></div>
        </div>
        <div id="split3" class="split">

            <div class="center"></div>
        </div>

        <div id="split4" class="split">

            <div class="center"></div>
        </div>

        <div class="split-container clock">

            <div class="split time">

                <div class="center">
                    <div class="splitflap time-part">14</div>
                    <div class="splitflap time-part">:</div>
                    <div class="splitflap time-part">10</div>
                </div>
            </div>
            <div class="split time">

                <div class="center">

                    <div class="splitflap time-part">14</div>
                    <div class="splitflap time-part">:</div>
                    <div class="splitflap time-part">15</div>
                </div>
            </div>
            <div class="split time">
                <div class="center">
                    <div class="splitflap time-part">14</div>
                    <div class="splitflap time-part">:</div>
                    <div class="splitflap time-part">18</div>
                </div>
            </div>
            <div class="split time">
                <div class="center">
                    <div class="splitflap time-part">14</div>
                    <div class="splitflap time-part">:</div>
                    <div class="splitflap time-part">24</div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="split-container clock">

        <div class="split time">
            <div class="center">

                <div class="splitflap gate-part">G</div>
                <div class="splitflap gate-part">0</div>
                <div class="splitflap gate-part">4</div>
            </div>
        </div>
        <div class="split time">
            <div class="center">
                <div class="splitflap gate-part">D</div>
                <div class="splitflap gate-part">1</div>
                <div class="splitflap gate-part">2</div>
            </div>
        </div>
        <div class="split time">
            <div class="center">
                <div class="splitflap gate-part">C</div>
                <div class="splitflap gate-part">0</div>
                <div class="splitflap gate-part">9</div>
            </div>
        </div>
        <div class="split time">
            <div class="center">
                <div class="splitflap gate-part">A</div>
                <div class="splitflap gate-part">0</div>
                <div class="splitflap gate-part">6</div>
            </div>
        </div>
    </div>

    <script>
        // Function to set up a split flap
        function setupSplitFlap(containerId, beginStr, endStr) {
            let speed = 0.2; // seconds
            let beginArray = beginStr.toUpperCase().split("");
            let endArray = endStr.toUpperCase().split("");

            // Set to 15 for the total number of flaps
            let totalFlaps = 15;

            // Fill arrays to the size of totalFlaps
            while (beginArray.length < totalFlaps) {
                beginArray.push(" ");
            }
            while (endArray.length < totalFlaps) {
                endArray.push(" ");
            }

            let div = document.querySelector(containerId + " .center");
            let html = "";
            for (let x = 0; x < totalFlaps; x++) {
                html += '<div class="splitflap"><div class="top"></div><div class="bottom"></div><div class="nextHalf"></div><div class="nextFull"></div></div>';
            }

            div.innerHTML = html;

            // Set up more stuff
            let a1 = document.querySelectorAll(containerId + " .top");
            let a2 = document.querySelectorAll(containerId + " .bottom");
            let b1 = document.querySelectorAll(containerId + " .nextFull");
            let b2 = document.querySelectorAll(containerId + " .nextHalf");

            for (let x = 0; x < a1.length; x++) {
                a2[x].style.animationDuration = speed + "s";
                b2[x].style.animationDuration = speed + "s";
            }

            // Character set
            let char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890 ".split("");

            let strCount = [];
            let flag = [];

            for (let x = 0; x < totalFlaps; x++) {
                strCount[x] = char.indexOf(beginArray[x]);
                flag[x] = false;
            }

            // Flip them flaps
            setInterval(function() {
                for (let x = 0; x < totalFlaps; x++) {
                    if (b1[x].innerHTML == endArray[x]) {
                        dontFlipIt(x);
                    } else {
                        flipIt(x);
                    }

                    if (flag.every(e => e)) {
                        changeDestination();
                    }
                }
            }, speed * 1000);

            // Flap flipping functions
            function flipIt(x) {
                a1[x].innerHTML = char[(strCount[x] == 0) ? char.length - 1 : strCount[x] - 1];
                a2[x].innerHTML = char[(strCount[x] == 0) ? char.length - 1 : strCount[x] - 1];
                b1[x].innerHTML = char[strCount[x]];
                b2[x].innerHTML = char[strCount[x]];

                a2[x].classList.remove("flip1");
                a2[x].offsetWidth = a2[x].offsetWidth;
                a2[x].classList.add("flip1");
                b2[x].classList.remove("flip2");
                b2[x].offsetWidth = b2[x].offsetWidth;
                b2[x].classList.add("flip2");

                if (strCount[x] > char.length - 2) {
                    strCount[x] = 0;
                } else {
                    strCount[x]++;
                }
            }

            function dontFlipIt(x) {
                flag[x] = true;
                a1[x].style.visibility = "hidden";
                a2[x].style.visibility = "hidden";
                b2[x].style.visibility = "hidden"; // Ocultar la mitad inferior
                b1[x].style.visibility = "visible";
            }

            function changeDestination() {
                setTimeout(function() {
                    flag.fill(false);
                    for (let x = 0; x < totalFlaps; x++) {
                        strCount[x] = char.indexOf(endArray[x]);
                    }
                }, 1000);
            }
        }

        // Set up the three split flaps
        setupSplitFlap("#split1", "", "CREATE MOMENTUM");
        setupSplitFlap("#split2", "", "FULL SERVICE");
        setupSplitFlap("#split3", "", "GLOBAL AGENCY");
        setupSplitFlap("#split4", "", "FOR B2B TEAMS");
    </script>




    <!-- Sección de Testimonios -->
    <section class="testimonial-container">
        <div class="container">
            <div class="gradient-three"></div>
            <div class="gradient-four"></div>
            <img src="https://s3-alpha-sig.figma.com/img/f3a0/dff9/9e268fcea3a14c69193574fa0d61cc0d?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mDBYvfu4AhY00rUEzTxyX2e2cMe6fmR3YVc9wn5Jx8xFZp9x7DAPqxDYo3wW8ombyTMyDqpZ73X2SDnh~HISZjGgMxSq9NFWa0hH9LYUFHlwT3~D9Lyqe6FzsBrGdoLueCP0ptGYvdVp1wgapklK7ggSK2NR9Shc2J0mj2fsbPd6vQ1i3fF8UKXQQPPXttDev12tp8mLN1ftOzrZxIoEo2ma6vaO3zJ12GJYKcHFyY32301UUz0cow8QXJVVSfOYZev7e3qo4FLTfGnorOJThvJ47tcNRHrwDH81uQU1i3pvfXY0GL92owKLDCWZZfXkcCmZKwDDn17HO1CFNX99rg__" alt="Logo" class="logo">
            <div class="testimonial">
                <span class="quote-icon">“</span>
                <p class="testimonial-text">
                    We’re really impressed with their<br>expertise in B2B—in our opinion, there’s <br>
                    <span class="highlight-text">no one close to their level.</span>
                </p>
                <div class="author-info">
                    <p class="author-name">Mark Kirchdorfer</p>
                    <p class="author-title">CE.ISCO Industry</p>
                </div>


            </div>
        </div>
    </section>


    <!-- Sección del Slider -->
    <section class="slider-section">
        <div class="footer">
            <p class="footer-text">SHOW UP BOLDLY</p>
            <p class="footer-subtext">SHOW UP CONFIDENTLY</p>
        </div>
        <div class="slider-container">
            <div class="slider">
                <div>
                    <img src="https://s3-alpha-sig.figma.com/img/1cf3/b3a7/c4e5e3d598d4075c603c310a795e8c39?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=df5pxCz8o1MYoLl~wx0xsKp9dhnMS8x0cLfEtLfzPirqfwnj6vevviGmDYg1TkL1MECu7XMH6UBuqWNpSyflNbDAaf~KTwUKjQWA0P7dxin-TdZvkcHcst3mQ8yQJ2e573MJ8~WOsCNrltE2BB1XHOkLIMbW1OcwtYWjjLUPxNGcZRsI0V~FIqq0Epxg44t4JosCQ9zcOVhPohdn2DbBWo3pe02x95BXbLQRH2AR1hZt45qcIGaCkFX5r4yBYLy2pj0PvFuacmk0d5PGjLQKslBd4yeIKCh-GerAOmJVcuQbxInMrzeTv~5d8RhxK9cs6d1Uu-wh6auvfJIvLXjsMA__" alt="Slide 1">
                    <div class="text-rectangle">
                        <p>Texto para la imagen 1</p>
                    </div>
                </div>
                <div>
                    <img src="https://s3-alpha-sig.figma.com/img/bc97/d39f/69db906ed7f7dcd230e11c39c0dfdbab?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bEUrOi3z3lDZ7bdx6-Dlah7UdzGvnkGY3rK~Ucl5SE2Y44ChrmExTC4HV4hb8DE4j8HxR491b4iWFFjh1RysUTJzF16ogOHvHwRKjUmz8offEtVIFPP1hEVLH-qG2uWlJf7icZQrSzyokKabKUYYjbUihYCoxKqxrtl2JcHMw1zyOKrJ4YYM05kcVU0NEym89e61dALjIcJlWXJcN9G3e1l~MC8vxJDiLmk0AZ3y0kfhG8uowTWBUln4iOSVygXx3YLKxcyhho1~d-vhipm1klCQY6gONK83jllj5IanPVQpjMfe4oWyuw89v237bAiVvvVrC3WcYlQDqyFLY~fYAg__" alt="Slide 2">
                    <div class="text-rectangle">
                        <p>Texto para la imagen 2</p>
                    </div>
                </div>
                <div>
                    <img src="https://s3-alpha-sig.figma.com/img/436b/b366/2babd02608294cef64e58cc81dbcf89e?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Xu-jW4I26EVkVuVZ4-Ae0UUNhJkef7iSJKxiogDOVtIMocjc55CqAWPxtWQtxZ7zhhbVuNbBdMsRUgTHZ9GRraEuVmVJGeePDSEqb7MZRDWvjo~y7yXkj2KnlET-WlgMkrAhQS6iTbb-UgryA~2Kp9MY~w3ze77m8wa2vGVKq9nwBgRxVIXQAes~aWi8CwzF8~bMNYrZElF9TK0IHxsIURJYwb6sOM4J7USSSLvIFdHxeLY2up2yzGscvV3GCA2UAOWdRp3moqEAOEjTF5Ia5-q7gpsy23Q5Pbwxwg9o-nEkKjl9sGA06RgCqzmZk7yFt7qiZ5t9~54Yjzsa~5t1Ug__" alt="Slide 3">
                    <div class="text-rectangle">
                        <p>Texto para la imagen 3</p>
                    </div>
                </div>
            </div>
            <button class="slick-prev"><i class="fas fa-chevron-left"></i></button>
            <button class="slick-next"><i class="fas fa-chevron-right"></i></button>
        </div>
    </section>

    <!-- Slick Slider JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<button type="button" class="slick-prev">←</button>',
                nextArrow: '<button type="button" class="slick-next">→</button>',
            });
        });


        $(window).on('scroll', function() {
            var scrollPosition = $(window).scrollTop();
            // Movimiento de las nubes (si corresponde)
            $('.cloud-left').css('top', 300 + scrollPosition * 0.5 + 'px');
            $('.cloud-right').css('top', 10 + scrollPosition * 0.5 + 'px');
        });
    </script>

    <section class="hero">
        <div class="hero-content">
        <div class="parallax-title">
            <h3>ENCY & ADVISORY</h3>
        </div>
            <h1>B2B AGENCY</h1>
            <h2>& ADVISORY</h2>
            <p>If a management consultancy<br>
                and indie agency came<br>
                together, JumpSeat would be<br>
                the result. We’re unique blend<br>
                of left and right brain thinking.<br>
                Strategy and creativity. Deep<br>
                thinking and get it done.
            </p>
        </div>
        
        <div class="accordions">
            <div class="accordion-item">
                <button class="accordion-title">
                    STRATEGIC<br>REVENUE<br>GENERATION<br>ADVISORY
                    <span class="accordion-arrow">&gt;</span>
                </button>
                <div class="accordion-content">
                    <p>Content for accordion 1.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-title">
                    BRAND<br>DEVELOPMENT
                    <span class="accordion-arrow">&gt;</span>
                </button>
                <div class="accordion-content">
                    <p>Content for accordion 2.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-title">
                    DEMAND GEN<br>CAMPAIGN<br>STRATEGY AND<br>EXECUTION
                    <span class="accordion-arrow">&gt;</span>
                </button>
                <div class="accordion-content">
                    <p>Content for accordion 3.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-title">
                    RECRUITMENT, <br>ONBOARDING<br> AND <br>COACHING
                    <span class="accordion-arrow">&gt;</span>
                </button>
                <div class="accordion-content">
                    <p>Content for accordion 4.</p>
                </div>
            </div>
        </div>
    </section>
    <script>
        const parallaxTitle = document.querySelector('.parallax-title');

        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;

            // Ajusta el multiplicador para un desplazamiento más notable
            const moveValue = scrollPosition * 0.1; // Ajusta a 0.1 para un movimiento más notable
            parallaxTitle.style.transform = `translate(-50%, -50%) translateX(${moveValue}px)`;
        });
    </script>

    <script>
        document.querySelectorAll('.accordion-title').forEach((accordion) => {
            accordion.addEventListener('click', () => {
                const content = accordion.nextElementSibling;

                // Toggle the active class
                accordion.classList.toggle('active');

                // Check if the content is currently displayed
                if (content.classList.contains('show')) {
                    // If it is, hide it
                    content.classList.remove('show');
                } else {
                    // If it isn't, show it
                    content.classList.add('show');

                    // Optional: Close other accordions
                    document.querySelectorAll('.accordion-content').forEach((otherContent) => {
                        if (otherContent !== content) {
                            otherContent.classList.remove('show');
                            otherContent.previousElementSibling.classList.remove('active');
                        }
                    });
                }
            });
        });
    </script>



    <div class="timeline-container">

        <h1>WITH YOU EVERY MILE</h1>
        <p>Some firms don’t “do” at all. Others “do” it if you, negating the benefit of your team’s learning and improving. We’re in it with you every step of the way to ensure you become the best possible version of yourself.</p>
        <span class="with-text">WITH</span>
        <span class="you-text">YOU</span>
        <ul class="timeline">
            <li class="timeline-item">
                <h3>ADVISORY FIRMS</h3>
                <p><span class="highlight">Don't</span> do</p>
            </li>
            <li class="timeline-item">
                <h3>AGENCIES</h3>
                <p><span class="highlight">For</span> you</p>
            </li>
            <li class="timeline-item">
                <h3>JUMPSEAT</h3>
                <p><span class="highlightJumpSeat">With</span> you</p>
            </li>
        </ul>
    </div>

    <!-- SECCIÓN DE ELIMINATE RANDOM ACTS -->

    <div class="content-container">
        <div class="eliminate-content">
            <h1>ELIMINATE RANDOM ACTS OF<br>
                SALES & MARKETING FOREVER</h1>
            <h2>This is the hill we're willing to die on.</h2>
            <p>This is the hill we’re willing to die on.
                We exist to stop all the random acts of content. Half baked webinars and uninspired emails. One-off tweets and abandoned social channels. Leadership meetings that start with, “I just heard this on a podcast...” <br>
                <br>
                You get in. RAofS&M produce chaos but not consistent results.
            </p>
            <a href="#" class="buttonGet">
                GET TO KNOW US <i class="button-icon">&rarr;</i>
            </a>
        </div>
        <div class="images-content">
            <img src="https://s3-alpha-sig.figma.com/img/931b/afbb/1a6b63f8315573c9fa18532e53931d0a?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=gSkuWcw8QG7m-2GDXqAgRuVEax9DgbwAt4PVb~MhlWFu1b5bNbbu5srHPNkdgzmk6-BCwwS5hO5MuVrCNpDHxGMjNUd-774AgXQeJ0-jJGZX-fRm02CoN4M3--fGNg3Id2VaX9wVpRx-JEPRJYhHEhQU0QnvXUED5FClcVSf3u9fybCJCzsohtafxGcExxbCS654kLRk1sLDk10Yn~4drhO045KDg1635C3yeyOoHayVNOgXOIwpwUVVnZNTS-DLUhr7KREwBRlyvuWzJuDIiKKdGe9m9Pu5o73PfDLKCweHIvXmrFH3sh3Vd9aJGOsqY2UXRLeRHApla-~xrcZgXQ__" alt="Top Image" class="top-image">
            <img src="https://s3-alpha-sig.figma.com/img/3d2d/8365/92eff9db05a360df1541cff8c558c13d?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ZSTQqJTBFsBREFXLydVcR7vdCenkj9hTpOtaChQ1wyDhv11o-h1QZ1kp40~zNo4vZWd-LW5K-ldh7HlA8JHWBqgBcjqcPzHINwQz0i2abgX~OUweKVZG2kC9XDymoG5tyqa3CjAvP~u5yPLHOezNxD07-b-PUllEFqYd9331zWvP1KcF9WtSS9rYMSQZ-J90J-5aWk3feidxqtpuqpuBM6MUH7AvNLv-ZNrMAH-ucuuGe1-H1XNmAlw17gN3xK6utwmTbnyMiMow7S85JvSEY-XJ41DxoHqqzOP3R-WWUI5cxcapd9-oW02JhFsQ4KvIXBzidYGEUwrtp4Tc2ykhag__" alt="Bottom Image" class="bottom-image">
        </div>
    </div>

    <section class="feeling">
        <div class="avion-section">
            <h1 class="title">FEELING LOST?</h1>
            <p class="subtitle">START HERE.</p>
            <div class="content">
                <img src="https://s3-alpha-sig.figma.com/img/6a9c/135f/0fa9ccc9e5b97f61f30e27aebb54bdce?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=o~Qtpc2-CE7obcx45P2g-AOfTnNzOIChm6vw6QbPrToJTdagtyC4O6nTgO3M0hOQUbDHH9mjglohInV8nF6KMJUoE65nPY08e5WzMQ3Tj1v3b0sK38NCTYKe~D9CIJLy8zpMln3GL33EF5~4MsjHsaGBKYInnJE7ZuED9ZMSqtX37natTJPda52iK0DDS~DlJXgqmltkhyLWB6nXejXNce6cglAnFIL4IsGnhJuzRrC2RXjI4nUb50nhWeWxrIcGW3bj5oYs49qSshHMHS08rbYDB77pv5yvml-TFQXQkHc0dbvBUjZ7AHCs4cBH25vQBscq8B3G~sogbg7BQ4tcoA__" alt="Image" class="image">
                <div class="text-content">
                    <h2 class="image-title">Ideal client profiles and the <br>JumpSeat $5,000 FedEx rule.</h2>
                    <p class="image-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniamed do eiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <button class="start-button">START HERE <span class="arrow">&#8594;</span></button>
                </div>
            </div>
        </div>
    </section>


    <div class="login-container">
        <div class="contact-container">
            <span class="start-text">START HERE</span>
            <h1 class="contact-title">GET IN TOUCH WITH <span class="team-text">OUR TEAM</span></h1>
            <form method="post" action="">
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Name" class="form-input form-input-name" required>
                    <input type="text" id="last-name" name="last_name" placeholder="Last Name" class="form-input form-input-last-name" required>
                </div>
                <input type="text" id="title" name="title" placeholder="Title" class="form-input form-input-large" required>
                <input type="text" id="company" name="company" placeholder="Company" class="form-input form-input-large" required>
                <textarea id="message" name="message" placeholder="Message" class="form-textarea" required></textarea>
                <div class="form-action">
                    <button type="submit" class="send-button">Send <span class="send-arrow">&#8594;</span></button>
                </div>
            </form>
            <hr class="separator">
            <div class="info-container">
                <div class="neon-border"></div>
                <img src="https://s3-alpha-sig.figma.com/img/1b78/4047/516aa6e48fc3634892ab86f4266fa306?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=CMyrejooIvjXkb~0mpxDK7eCwbEfooSkn8Kr7zEgHEYd~-t7se9dChR6q3zrbAgBar1kxS2XhAT0~FzdVl0Vzc5cXyhnZp0X~ao2XX9sJ0x6Lgn4IQ-KBA-3TeDK-Y2XIDoNDvgd5NM63jK7UlQhuQa5SiEsMvMvyDIehWgmZxYXMBLlnCE7Vjb0nIIOw1ICYqEvJMTSBVmrdsmj~vRzlCSGxSV4ylShgP2RoBsuG4zWyfcDSSy0jxz9j-tdhfm0rn-CWWeG715zfoTo2Uk3rMS0wFnj5jyGnUbS2xoXV2QEbG0q9Dbc6lF47A2mdNqm6yp5gIny3PbCGb-uydNNLA__" alt="Photo" class="info-photo">
                <div class="info-text">
                    <p>Email our CEO directly, <a href="mailto:dan@jumpseat.co">dan@jumpseat.co</a> or drop a line to our team.</p>
                    <p class="info-role">PILOTS PREVIOUSLY. <span class="highlight-text">JUMPSEAT TODAY.</span></p>
                </div>

            </div>
            <button class="meet-the-team-button">MEET THE TEAM <span class="send-arrow">&#8594;</span></button>
        </div>
    </div>
    <footer class="footer-section">
        <h1>LOGO</h1>
        <div class="elipse">
            <img class="icono-in" src="https://s3-alpha-sig.figma.com/img/3f48/a7ca/fa631246cf73c8a3f5e6094e9dfba20e?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=COROsSzzZEUBp6ck0A4Vuwx0Ivq6256Sa6rhtNvekHpPv5PwZCJMvi0fIC5pstbrJIZDnyQhZ0BmJPCFxpeTH1UVqwDsny6rFJMGWRSLlxi0XZtsZq8cpozemCE~ziSMfFzKt1gM231gaF~BzsSkHhoDe5t2t3AfBDoZfJGLhtYm2NFE-rdoAe4l~arK372r6xgCge5c7kxaba1iek~KcF8xuh1E-SRWdhlLe3bukpTAQ5Drq9UBsIE19l8LEbqb7KRpwkD6GvaYVmmLahoSPyd4myaE8cE09dzAYaRp-bqc~55FtI0CBkaieuVqi19VdueNKq-~5Kv-NQO7qKnJrg__" alt="Icono" />
        </div>

        <div class="contactUs">
            <h2 class="contact-us">CONTACT US</h2>
            <p class="contact-info">3116 W Cortland<br> Chicago, IL 60647<br><br>630.870.2141<br>letsfly@web.com</p>
        </div>

        <div class="services">
            <h2 class="services-item">OUR SERVICES</h2>
            <h2 class="beliefs">BELIEFS</h2>
            <h2 class="about-us">ABOUT US</h2>
            <h2 class="join-us">JOIN US</h2>
        </div>

        <div class="social-icons">
            <img src="https://s3-alpha-sig.figma.com/img/5080/656f/2a4d8bc72a17e874a5886663ba94cf91?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=YRthInnqtkRl0AbQPalUNciRrJgDBk~iq7BwbgcUGurpqQPSlsrCMhtndExoU05mrgQ2vTiHCNcS7FdPdJOgWY0Dd5KsgpFMBn5tXHxJk0HqdVLA0K05HfPIHPmnNTVTU3pYXlci87QCYwXx~W7EzqXuqX6Gh5C1PKTr~snqV1FaCXA5VQ8ID8Ptwx9dS4uZ9FheEk7lI6osvYpwk2IdYimNGQ4vdTiK1McNS7f9gZz21DXDk333jzL4UO8LmTdvWMs0IJhAhAAO6QWL2tHV90vEPwbiBWEez4iY3uJaHkby7fYF1u8CYgPhomgPI7qrUk4WpSDnye~L689ENOJ3iw__" alt="Icon 1" />
            <img src="https://s3-alpha-sig.figma.com/img/c284/3e5a/307d7e02ba9b903bac555d042a796bc5?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=leGCCZM5hGfTocPAg8lDEfA39CiUb-YzUm6aJhxoFFVFDW-vGx22JNi0HaTG5bkgyoE7UtQLXUqA5pF8Ehi1BQ6B9pal16gZDgZQETBwRdaQKXOdjJhdDxj5CiB9CMEDyIrhx6lcYEhkGWUCv4Xbit3W6NkokDmTr8jpcL3tMzWhdjkKGJ0~yWFJSyDfPa9Wey84jLg18X5fh7YVktxxXqQlpVhtn0maqUD1hahM37ekuOLpTU3nGJTGBdG4cxXo71gDx-wmMGtlr4Jwclwvpd5zCDrWb4U8nhkvtm1-x6czQNJ76ywajPDa-3TpLt0QlpzTRMJfaLhCK48Etuh2kA__" alt="Icon 2" />
            <img src="https://s3-alpha-sig.figma.com/img/7f2c/5609/604815b7d709b142481fc98f68dd37d5?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=g9whkB-qgv0RIXcFuOEekII-wunzZNQxt7QCIXS9PVX4Gpb6~jY6UiJEfnNkS0oLxZVZIPkOepifz99pxo0EuGiNjX4JTE73C8vKleXx1NX-~6D~~piCy-NKQIcMviNrfFP2NLqCZY~iGdhw7wToOHrQgrNmURMpL-FYlFgLYnG7K7CeX6vp0ZECof-XTRXW~W-AM0dEYJBZgbMkvkF3uQX-FzjzhG88kAjB-xSA7MS8SY0-Y2zasmTztUcIzzfw~GR-LIcHU2b5NeZ8U5XqeKwQTb10M3yCHPERTMHeynlXSnT4eKYhF5CV5~jQRJJZV3Wf~j7r2rXgKYXby-NRGg__" alt="Icon 3" />
            <img src="https://s3-alpha-sig.figma.com/img/efe9/440b/d8c9a4f0901f6ed18129a534264d66ac?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fIhWMeFsk1fWGZnHHPtCdR65k-uEyYspZG40YiEuUVr9dG92P01oJ8sn0WcWoaO19NBANp4~BlTBApBJWTzWF5wsPdwO1S38i49HVP7xJ~qEXQd8xAHMVRoHhha-lciX7~FhTTRpyGXSpEB6hhFUyjhBbol2EGYtVfR4GFT2V3zj0scKIvv-W5gpQUD3XzIh-1xQsezf5S8sxxadUExR1goV3fDsx2jCynLsBt0K-Tg~c-9Qn~W4x-4T7LzB-rafharUvA32YQlAYv9RJ2UCA1AMMWRdadmQuCWBQdHQBnLlXNtCJB3~t7pMULKM19t7L692xeZ1GERiAMzRjIinZw__" alt="Icon 4" />
            <img src="https://s3-alpha-sig.figma.com/img/f957/929a/800698dba3f510c3507a9d4cd015e574?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=adx9~-odYNoKs3--wXfNbr-09QLJqCrpHLw~BloxBFKFhUOpONsIvw0ZMSa73-IGzYpZXyB0jNTLkwWc7EarwoumtH0eFyyKzHV11h3cPTNua1HURQCXBo5xNT30tyM-1AR15lU6T7sVb5bSqnXoOs0o0V5ory~TPC6ywc2njQKE6ePAb~F6kHc3ZeFDfceSQJtHLMzGW5sm91hhXGsZlKbIkazFuPm5h~Q8vIN5emJwl87rOf7EDYlvVaphu53k5xP1Fj9MpaEzSeM6VQ55ynArZ41-1WHLj492YCalvcQdYEEaQ1eHEidBaplisrwUk3ZkehZaYYZmns5RZiBWqg__" alt="icon 5" />
        </div>
    </footer>






    <?php wp_footer(); ?>
</body>

</html>

<?php wp_footer(); ?>