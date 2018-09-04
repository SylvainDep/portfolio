<?php require('menu.php'); ?>
<?php require('separator.php'); ?>

<?php
while ($data = $works->fetch()) {
    $work_array[] = $data;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Sylvain Depardieu - Web tech allrounder</title>
        <link href="public/css/style.css" rel="stylesheet" />
        <link href="public/css/mobile.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato|Raleway" rel="stylesheet">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <style>
            <?php foreach ($work_array as $data) {
                ?>
                #work_sample_<?= $data['id'] ?> {
                    background: url("../public/img/works/work_<?= $data['id'] ?>.png") no-repeat center bottom;
                    background-size: cover;
                    width: 30%;
                    height: 200px;
                    border: 3px solid grey;
                }
            <?php
            }
            ?>
        </style>
    </head>

    <body id="body">
    <section id="header">
        <header>
            <div class="content">
                <?= $nav ?>
            </div>
        </header>

        <div id="hero_area">
            <div class="content">
                <div id="hero_text_area">
                    <div id="hero_text">
                        <h1>Let's build something great together.</h1>
                        <p>I am Sylvain Depardieu, <strong>french web all rounder</strong> based in <strong>Hamburg, Germany</strong>. We shall talk about your web projects.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <h2>About me</h2>
        <?= $separator ?>
        <div class="content">
            <div id="perso_skills">
                <div id="intro">
                    <h3>Who <strong>am I</strong>?</h3>
                    <p><?= $introtext['description'] ?></p>
                    <a id="download_resume" href="../public/pdf/resume_sylvain_depardieu.pdf">Download my CV (PDF)</a>
                </div>
                <div id="skills">
                    <h3>Expert <strong>in</strong></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam suscipit odio quam, a mollis turpis fringilla a. Sed lacinia, ligula cursus pellentesque feugiat, nisl neque consequat leo, nec commodo nibh ex rhoncus nibh.</p>
                    <div id="skill_charts">
                            <?php while ($data = $skill->fetch())
                            {
                            ?>
                                <div class="skill_block">
                                    <div class="skill_name">
                                        <p><?= $data['skill_name'] ?></p>
                                    </div>
                                    <div class="skill_bar">
                                        <div class="skill_level" style="width: <?= $data['skill_level'] ?>%;"></div>
                                        <div class="skill_rest" style="width: calc(100% - <?= $data['skill_level'] ?>%);"></div>
                                    </div>
                                </div>
                            <?php
                            }
                            $skill->closeCursor();
                            ?>
                    </div>
                </div>
            </div>
            <div id="personal_path">
                <div id="education">
                    <h3><strong>Ed</strong>ucation</h3>
                    <?php while ($data = $education->fetch())
                    {
                        ?>
                        <div class="experience_block">
                            <div class="context">
                                <p><?= $data['period'] ?></p>
                                <p><?= $data['location'] ?></p>
                            </div>
                            <div class="main">
                                <h4><?= $data['title'] ?></h4>
                                <p><?= $data['description'] ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    $education->closeCursor();
                    ?>
                </div>
                <div id="experience">
                    <h3><strong>Ex</strong>perience</h3>
                    <?php while ($data = $experience->fetch())
                    {
                        ?>
                        <div class="experience_block">
                            <div class="context">
                                <p><?= $data['period'] ?></p>
                                <p><?= $data['location'] ?></p>
                            </div>
                            <div class="main">
                                <h4><?= $data['title'] ?></h4>
                                <p><?= $data['description'] ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    $experience->closeCursor();
                    ?>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section id="expertise">
        <h2>What I do</h2>
        <?= $separator ?>
        <div class="content">
            <div id="expertise_block">
                <?php while ($data = $expertise->fetch())
                {
                    ?>
                    <div class="expertise_module">
                        <div class="expertise_picture">
                            <?= $data['picture'] ?>
                        </div>
                        <div class="expertise_text">
                            <h3><?= $data['title'] ?></h3>
                            <p><?= $data['description'] ?></p>
                        </div>
                    </div>
                    <?php
                }
                $expertise->closeCursor();
                ?>
            </div>
        </div>
    </section>

    <section id="works">
        <div class="content">
            <h2>Previous works</h2>
            <?= $separator ?>
            <div id="work_selector">
                <ul>
                    <li id="selector_all" class="current">All</li>
                    <li id="selector_websites" class="hidden">Websites</li>
                    <li id="selector_seo" class="hidden">SEO</li>
                    <li id="selector_content" class="hidden">Content</li>
                </ul>
            </div>
            <div id="works_block">
                <?php foreach ($work_array as $data) {
                    ?>

                        <div id="work_sample_<?= $data['id'] ?>" class="<?= $data['category'] ?>_work" style="display: block;">
                            <a href="<?= $data['link'] ?>" class="work_link">
                                <div class="work_icon">
                                    <div>
                                        <i class="fas fa-eye"></i>
                                        <p><?= $data['link'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section id="contact">
        <div id="contact_data">
            <h2>Contact Address</h2>
            <?= $separator ?>
            <div id="contact_list">
                <p><i class="fas fa-map-marker-alt"></i><?= $contact['address'] ?></p>
                <p><i class="fas fa-envelope"></i><?= $contact['mail'] ?></p>
                <p><i class="fas fa-phone"></i><?= $contact['phone'] ?></p>
            </div>
            <div id="language_list">
                <?php while ($data = $languages->fetch())
                {
                    ?>
                    <div class="language_sample">
                        <p><?= $data['languages'] ?></p>
                        <p><?= $data['language_level'] ?></p>
                    </div>
                    <?php
                }
                $languages->closeCursor();
                ?>
            </div>
        </div>
        <div id="contact_form_block">
            <h2>Get in touch !</h2>
            <?= $separator ?>
            <form id="contact_form" method="post" action="index.php?action=contactmail">
                <div id="basic_contact_data">
                    <input name="name" type="text" placeholder="Name"/>
                    <input name="email" type="email" placeholder="Your email"/>
                </div>
                <input name="subject" type="subject" placeholder="Subject"/>
                <textarea name="message" placeholder="Your Message"></textarea>
                <input type="submit" value="SEND"/>
            </form>
        </div>
    </section>

    <iframe id="local_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d35335.552059742346!2d9.936248797757159!3d53.58032163855327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b185fc94e4737b%3A0xf860b6a0330aedda!2sLangenfelder+Damm%2C+Hamburg!5e0!3m2!1sfr!2sde!4v1533734964341" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

    <section id="credits">
        <img src="../public/img/logo_jimdo.png"/>
        <img src="../public/img/logo_sncf.png"/>
        <p>Copyright © 2018 sylvaindepardieu.fr - All Rights Reserved.</p>
        <a id="loginlink" class="popup_button">Admin Login</a>
    </section>

    <div id="loginbox" class="popup_box" style="display: none;">
        <div id="loginwindow" class="popup_window">
            <form method="post" action="index.php?action=checkpassword">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" />
                <br/><br/>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" />
                <p><a href="index.php?action=passwordrecovery">Mot de passe oublié ?</a></p>
                <br/><br/>
                <input type="submit" value="Connexion">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="../public/js/DOM.js"></script>
    <script type="text/javascript" src="../public/js/GalleryFilter.js"></script>
    <script type="text/javascript" src="../public/js/togglelogin.js"></script>
    <script type="text/javascript" src="../public/js/Launcher.js"></script>
    </body>
</html>