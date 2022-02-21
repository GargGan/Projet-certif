<?php
session_start();
require 'update&article.php';
include 'php\template\header.php';
$pdo = Database::connect();
?>

<?php
if (isset($_SESSION['id'])) :
    $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
?>
    <main>
        <div class="container p-0">
            <div class="banniere col-lg-12 d-flex flex-column align-items-center">
                <!-- Banner with tab menu -->
                <div class="d-flex justify-content-center">
                    <?php if (!empty($user['avatar'])) {
                    ?>
                        <img src="avatars/<?= $user['avatar']; ?>" alt="avatar" width="150px">
                    <?php
                    } ?>
                </div>
                <!--ANCHOR Menu tab -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-white" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false">Sécurité</a>
                    </li>
                </ul>
            </div>

            <!--ANCHOR Open tabs -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                    <div class="container p-0">
                        
                        <div class="tab-content" id="myTabContent">
                            <!-- Profil profil -->
                            <div class="tab-pane fade show active" id="profilee" role="tabpanel" aria-labelledby="profilee-tab">
                                <!-- Photo profil -->
                                <!--ANCHOR enctype for avatar -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="col-lg-12 d-flex flex-wrap justify-content-center gap-3">
                                        <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex flex-column align-items-center justify-content-center">
                                            <label class="text-white text-nowrap" data-error="wrong" data-success="right" for="defaultForm-photo">Photo profil</label>
                                            <input type="file" id="defaultForm-photo" class="form-control validate" name="avatar">
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

                                        <div class="text-nowrap d-flex justify-content-center col-4">
                                            <button type="submit" class="butsend text-decoration-none text-center" name="updateProfil">Envoyer</button>
                                        </div>

                                    </div>
                                    <?php
                                    if (isset($err)) {
                                        echo $err;
                                    }
                                    ?>
                                </form>
                            </div>
                            <!-- Profil contact -->
                            <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <!-- email -->
                                <form method="post">
                                    <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center gap-3">
                                        <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                            <div class="col-3">
                                                <label class="text-white text-nowrap" data-error="wrong" data-success="right" for="defaultForm-email">Nouveau mail</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="email" id="defaultForm-email" class="form-control validate" name="newmail">
                                            </div>
                                        </div>

                                        <!-- confirmation email -->
                                        <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                            <div class="col-3">
                                                <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-confirmemail">Confirmation E-mail</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="email" id="defaultForm-confirmemail" class="form-control validate" name="newmail2">
                                            </div>
                                        </div>

                                        <!-- city -->
                                        <div class="bggrey city col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                            <div class="col-3">
                                                <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-city">Ville</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" id="defaultForm-city" class="form-control validate" name="ville">
                                            </div>
                                        </div>
                                        <div class="text-nowrap d-flex justify-content-center col-4">
                                            <button type="submit" class="butsend text-decoration-none text-center" name="updateContact">Envoyer</button>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($err)) {
                                        echo $err;
                                    }
                                    ?>
                                </form>
                            </div>
                            <!-- Profil security -->
                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                <!-- Password -->
                                <form method="post">
                                    <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center gap-3">
                                        <div class="bggrey col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                            <div class="col-3">
                                                <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-password">Nouveau Mot de passe</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="password" id="defaultForm-password" class="form-control validate" name="newpassword">
                                            </div>
                                        </div>

                                        <!-- confirmation email -->
                                        <div class="bggrey pass col-sm-12 col-md-8 col-lg-5 text-white d-flex align-items-center justify-content-center gap-2">
                                            <div class="col-3">
                                                <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-confirmpassword">Confirmation Mot de passe</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="password" id="defaultForm-confirpassword" class="form-control validate" name="newpassword2">
                                            </div>
                                        </div>

                                        <div class="text-nowrap d-flex justify-content-center col-4">
                                            <button type="submit" class="butsend text-decoration-none text-center" name="updateSecurity">Envoyer</button>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($err)) {
                                        echo $err;
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div> <!-- Fin tabs second menu -->
                </div>

                <div class="tab-pane fade" id="annonce" role="tabpanel" aria-labelledby="annonce-tab">
                    <div class="container">
                        <div class="col-lg-12 d-flex p-0 gap-5">
                            <!-- ANCHOR recherche -->
                            <div class="aside-left col-md-3 col-lg-3 p-0">
                                <input class="form-control me-2 " type="search" placeholder="Recherche..." aria-label="Search">
                            </div>
                            <div class="aside-right col-lg-8 p-0">
                                <!-- Button trigger modal -->
                                <div class="butinscription d-flex justify-content-end pr-4">
                                    <button type="button" class="butpost text-decoration-none text-center" data-toggle="modal" data-target="#newpost">Nouveau post</button>
                                </div>
                                <!-- Modal -->
                                <form method="post">
                                    <div class="modal fade" id="newpost" tabindex="-1" role="dialog" aria-labelledby="post" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-headeeer">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="in md-form m-5">
                                                        <input type="text" id="defaultForm-text" class="form-control validate" name="article_titre" minlength="2" maxlength="30">
                                                        <label class="text-white fw-bold" data-error="wrong" data-success="right" for="defaultForm-text">Titre</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <select name="article_categorie" id="categorie-select">
                                                        <option value="">--Choississez une catégorie--</option>
                                                        <option value="suv">SUV</option>
                                                        <option value="berline">Berline</option>
                                                        <option value="luxe">Luxe</option>
                                                    </select>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <p class="text-white">Contenu de votre article :</p>
                                                        <textarea id="defaultForm-description" name="article_contenu" rows="5" cols="33" class="form-control validate"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="butclose text-decoration-none text-center" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="butlog text-decoration-none text-center" name="publish">Publier</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($err)) {
                                            echo $err;
                                        }
                                        ?>
                                    </div>
                                </form>
                                <!-- ANCHOR articles -->

                                <?php
                                $pdo = Database::connect();
                              
                                $articles = $pdo->query('SELECT * FROM articles ORDER BY date_time_publication');
                                while ($a = $articles->fetch()) {
                                ?>
                                    <div class="articles">
                                        <div class="article col-lg-12 text-white d-flex flex-wrap">
                                            <div class="photoarticle d-flex align-items-center col-md-3 col-lg-3">
                                                <img src="img/4577370.png" alt="">
                                            </div>
                                            <div class="d-flex flex-column offset-md-2 col-md-7 col-lg-8 offset-lg-1">
                                                <div class="titrearticle mt-1">
                                                    <h3 class="m-0"><?= $a['titre'] ?></h3>
                                                </div>
                                                <div class="categories">
                                                    <a class="text-decoration-none" href="#"><?= $a['categorie'] ?></a>
                                                </div>
                                                <div class="paragraphearticle">
                                                    <p class="m-0"><?= $a['contenu'] ?></p>
                                                </div>
                                                <div class="butinscription d-flex justify-content-end pr-4 m-2">

                                                    <button type="button" class="butpost text-decoration-none text-center " name="post">Voir plus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

        </div>







    </main>
<?php
else :
    header("Location: connexion.php");
endif;
?>

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