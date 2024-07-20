<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            position: relative; 
        }

        .cloud-left {
            position: fixed;
            top: 300px;
            left: -323px;
            width: 1115px;
            height: 500px;
            z-index: 10;
            opacity: 80%;
            transform: rotateX(-180deg); /* Rotación de la nube izquierda */
        }

        .clouds {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .cloud {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s ease-out;
        }

        .cloud-right {
            position: absolute;
            top: 10px; 
            right: -30px; /* Ajusta la posición horizontal según sea necesario */
            width: 699px; /* Ajusta el ancho según sea necesario */
            height: 406px; /* Ajusta la altura según sea necesario */
            z-index: 10;
            opacity: 90%;
            transform: rotateY(180deg); /* Rotación de la nube derecha */
        }

        .special-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
        }


        .promo-text {
            position: absolute;
            top: 7%;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
        }

        .button {
            position: absolute;
            top: 60px; /* Ajusta la posición vertical según sea necesario */
            left: 50%;
            transform: translateX(-50%);
            background-color: transparent;
            color: #fff;
            padding: 10px 20px;
            border: 2px solid #fff;
            border-radius: 20px; /* Ajusta el radio del borde según necesites */
            text-decoration: none;
            z-index: 200; /* Asegura que el botón esté por encima de la imagen */
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .button:hover {
            background-color: rgba(255, 255, 255, 0.3); /* Fondo transparente con un toque de blanco */
            border-color: #007bff; /* Cambia el color del borde en hover */
        }

    </style>
</head>

<body <?php body_class(); ?>>

    <header class="transparent-navbar">
        <div class="logo">Logo</div>
        <nav>
            <ul class="menu">
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Beliefs</a></li>
                <li><a href="#">Case Studies</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Join Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="clouds">
        <!-- Nube izquierda -->
        <img class="cloud cloud-left" src="https://s3-alpha-sig.figma.com/img/56e0/393a/984f089d174ab22169a2b1654568c54a?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ZaQOsiMhpcee~bt6WvwboeCZ~0TmeBdz5M-XH-Ed8XvKNTNQSly6EUlswWNQXxzg5wqnzblKAQHpyh51LSGn1G5t3qmGxpxR10CI7vmxOmzz~j4fSjE2OWr46~zqVroEdFdfCVMszVPPxLhoLT9V~ZWjJmhCwKkNaT5Zk2uWqp7ALD5uHtr5xx2SRrqTG3OQWwbdEDElI8n~JQqC9yUAQzV0npzGKRcID-s9zpaME5NlnXEVqbibl~ExagNQOg6TZ5tL4-XOx9kettX8jWoWL8hokPRcjl4V9tuh5C-Ua6RCOxsiICLMUfpEIwetUb6A0v~eDGlcAO83mKrvfqEMmw__" alt="Nube Izquierda">

        <!-- Imagen especial -->
        <img class="special-image" src="https://s3-alpha-sig.figma.com/img/d185/8bdb/ed7887ad75aacfe37db73658e8e58213?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ki6TtPWRSSzXbSPuJn4GOsGLuyXP65uxChWZrWYaZRFp-VLP0egZzzQz-2PipEaBh8WZIPSpcENsGn9SNyMxIOUBirjYaJzZu6U1EOfO02wZkgjpQqR5dyPJLVsnI5~4NofP3ZbyTlJsoNWD1ETvG6nW1IdiIe~60pWfJe2NJSU5m1OQyVej-jKpv1TVnAYBVWNB7r1TDd5CEDp6FLNlSXdkJJb7A8L~~g~TcFLcB~scYE-LgLVQ6Bv-qFrnR0iFMLKi9snLRBgqUTUVnrUu7as0ar2TEX1v8CMVJlIY9XM5DoP36ykC9zxesBm2zddH0J~W4mD2k45dFC2AGuElDw__" alt="Special Image">

        <!-- Nube derecha -->
        <img class="cloud cloud-right" src="https://s3-alpha-sig.figma.com/img/26ba/3e78/a0db8ed2d3de13476a17db56418d46a7?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=oG9Y-j8qqAkbJlCdgXGHMsUn~PnJp2HmwpaUcairITniCdJUpfdfq-Wd7WAUPkI8ws0t7U2J7qAU~AU3Y8cJmujySbYsTG8Zg2y4Pv75EnMBzPrgP2JFMOQtJQCWnsSrG56QGxYaYSmAVt-iZH7-Vj080XlDdewA3VI4yIltpmxLR-kyLDZJlJnr4h-5xtjFPtOLMeMAQfYzfiugG0y46jJ-SkjYqOHL~TUI7Z5itjXuYKjsRao~TrPkI5Y0jNFHkxz-tROYci72RBqjm3~44-syIfpdA-zzs9OEAx6Y2ArMzhsbEeNg~vplZoSMdJCRyJzkTMzMDV5PfcropjMofw__" alt="Nube Derecha">
    </div>

    <div class="promo-text">
        Avoid turbulence. Arrive at your destination sooner. And enjoy the ascent.
        <a href="#" class="button">
            FLY WITH US <i class="button-icon">&rarr;</i>
        </a>
    </div>


    

    <?php wp_footer(); ?>


</body>

</html>




