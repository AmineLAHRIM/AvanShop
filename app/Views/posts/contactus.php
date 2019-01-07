<?php
if (!empty($_POST)) {

    $to = "aminelahrimdev@gmail.com";
    $subject = "AvanShop";
    $txt = $_POST['message'];
    $how=$_POST['email'];
    $headers = "From: ". $how. "\r\n" .
        "CC: ".$how."\r\n".$_POST['name'];

    mail($to, $subject, $txt, $headers);

}
?>

<div class="content">
    <div class="main main2">
        <!-- contact section -->
        <section id="contact" class="parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
                        <h1 class="heading">Contact Us</h1>
                        <hr>
                    </div>
                    <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
                        <form class="newform" action="" method="post">
                            <div class="col-md-6 col-sm-6">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <textarea name="message" rows="8" class="form-control" id="message"
                                          placeholder="Message"></textarea>
                            </div>
                            <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
                                <input name="submit" type="submit" class="form-control" id="submit"
                                       value="send a message">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 col-sm-1"></div>
                </div>
            </div>
        </section>


        <!-- footer section -->
        <footer class="parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                        <h2 class="heading">Contact Info.</h2>
                        <div class="ph">
                            <p><i class="fa fa-phone"></i> Phone</p>
                            <h4>+212 687 732 051</h4>
                        </div>
                        <div class="address">
                            <p><i class="fa fa-map-marker"></i> Our Location</p>
                            <h4>57 Dreb Ben Faress, Marrakech, Morocco</h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                        <h2 class="heading">Founders</h2>
                        <p>Co-Founder, Developer/Designer<br><span>Amine LAHRIM</span></p>
                        <p>Co-Founder, Developer/DataBase Administration<br><span>Ayoub RKAINI</span></p>
                    </div>
                    <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                        <h2 class="heading">Follow Us</h2>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
                            <li><a href="#" class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>
                            <li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
                            <li><a href="#" class="fa fa-dribbble wow bounceIn" data-wow-delay="0.9s"></a></li>
                            <li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>


        <!-- copyright section -->
        <section id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h3>AvanShop</h3>
                        <p>Copyright © AvanShop

                            | WorldStore: <a rel="nofollow" href="#" target="_parent">E-commerce Web Site</a></p>
                    </div>
                </div>
            </div>
        </section>


    </div>

</div>