<?php
session_start();
include 'database.php';
include 'php\template\header.php';
$pdo = Database::connect();
?>


<main>
    <div class="container p-0">
        <div class="banniere col-lg-12 d-flex flex-column align-items-center">
            <!-- Banniere avec un menu tab implementé à l'intérieur -->
            <div class="d-flex justify-content-center">
                <img src="img/avatar.png" alt="">
            </div>
            <!--ANCHOR Menu tab -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-white" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="annonce-tab" data-toggle="tab" href="#annonce" role="tab" aria-controls="annonce" aria-selected="false">Mes annonces</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="reservation-tab" data-toggle="tab" href="#reservation" role="tab" aria-controls="reservation" aria-selected="false">Réservation</a>
                </li>
            </ul>
        </div>

        <!--ANCHOR Ouverture des tabs -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                <!--ANCHOR Second menu tab à l'intérieur du premier onglet tab -->
                <div class="container p-0">
                    <div class="myprofil col-lg-12 d-flex flex-column align-items-center">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-white" id="profilee-tab" data-toggle="tab" href="#profilee" role="tab" aria-controls="profilee" aria-selected="true">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false">Sécurité</a>
                            </li>
                        </ul>
                    </div>

                    <!--ANCHOR Ouverture des tabs du second menu tab -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Profil profil -->
                        <div class="tab-pane fade show active" id="profilee" role="tabpanel" aria-labelledby="profilee-tab">
                            <!-- Photo profil -->
                            <div class="col-lg-12 d-flex flex-wrap justify-content-center gap-2">
                                <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex flex-column align-items-center justify-content-center">
                                    <label class="text-white text-nowrap" data-error="wrong" data-success="right" for="defaultForm-photo">Photo profil</label>
                                    <input type="file" id="defaultForm-photo" class="form-control validate">
                                </div>

                                <!-- identifiant -->
                                <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex flex-column justify-content-center">
                                    <div class="d-flex gap-2">
                                        <label class="text-white text-nowrap" data-error="wrong" data-success="right" for="defaultForm-identifiant">Identifiant</label>
                                        <input type="text" id="defaultForm-identifiant" class="form-control validate">
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="bio bggrey d-flex col-sm-12 col-md-8 col-lg-10 gap-5 text-white">
                                    <div class="col-2">
                                        <label class="text-white text-nowrap" data-error="wrong" data-success="right" for="defaultForm-description">Description</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div>
                                            <p> facultatif</p>
                                        </div>
                                        <div>
                                            <textarea id="defaultForm-description" name="story" rows="5" cols="33" class="form-control validate"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profil contact -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <!-- email -->

                                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center gap-2">
                                    <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                        <div class="col-3">
                                            <label class="text-white text-nowrap" data-error="wrong" data-success="right" for="defaultForm-email">E-mail</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="email" id="defaultForm-email" class="form-control validate">
                                        </div>
                                    </div>

                                    <!-- confirmation email -->
                                    <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                        <div class="col-3">
                                            <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-confirmemail">Confirmation E-mail</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="email" id="defaultForm-confirmemail" class="form-control validate">
                                        </div>
                                    </div>

                                    <!-- tel -->
                                    <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                        <div class="col-3">
                                            <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-tel">Téléphone</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="tel" id="defaultForm-tel" class="form-control validate">
                                        </div>
                                    </div>

                                    <!-- ville -->
                                    <div class="bggrey city col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                        <div class="col-3">
                                            <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-city">Ville</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" id="defaultForm-city" class="form-control validate">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">Etsy mixtape
                            wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack
                            lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
                            locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
                            squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                            etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
                            stumptown. Pitchfork sustainable tofu synth chambray yr.</div>
                    </div>
                </div> <!-- Fin tabs second menu -->
            </div>

            <div class="tab-pane fade" id="annonce" role="tabpanel" aria-labelledby="annonce-tab">Food truck fixie
                locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit,
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum
                PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS
                salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit,
                sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
                stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.
            </div>

            <div class="tab-pane fade" id="reservation" role="tabpanel" aria-labelledby="reservation-tab">Etsy mixtape
                wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack
                lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
                locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
                squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
                stumptown. Pitchfork sustainable tofu synth chambray yr.
            </div>
        </div> <!-- Fin tabs premier menu -->

    </div>







</main>

<?php
include 'php\template\footer.php';
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

</html>