<!-- Page Heading -->
<marquee>
    <h1>QUẢN LÝ ĐOÀN VIÊN HỌC VIỆN CÔNG NGHỆ BƯU CHÍNH VIỄN THÔNG</h1>
</marquee>


<!-- Page Heading -->
<style>
    /* Slideshow container */
    .slideshow-container {
        max-width: 800px;
        position: relative;
        margin: auto;

        border-radius: 100px 20px;

    }



    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 6s;
        animation-name: fade;
        animation-duration: 6s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .2
        }

        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .2
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }
</style>
</head>

<body>



    <div class="slideshow-container">

        <div class="mySlides fade">

            <img src="img\slide5.jpg" style="width:100%; border-radius: 100px 20px">

        </div>

        <div class="mySlides fade">

            <img src="img\slide2.jpg" style="width:100%; border-radius: 100px 20px">

        </div>

        <div class="mySlides fade">

            <img src="img/slide1.jpg" style="width:100%; border-radius: 100px 20px">

        </div>
        <div class="mySlides fade">

            <img src="img/slide3.jpg" style="width:100%; border-radius: 100px 20px">

        </div>
        <div class="mySlides fade">

            <img src="img/slide4.jpg" style="width:100%; border-radius: 100px 20px">

        </div>

    </div>
    <br>


    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }

            slides[slideIndex - 1].style.display = "block";

            setTimeout(showSlides, 3000); // Change image every 2 seconds
        }
    </script>