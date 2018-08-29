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
    <link href="public/css/admin.css" rel="stylesheet" />
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
            width: calc(100% - 7px);
            height: 200px;
            border: 3px solid grey;
        }
        <?php
        }
        ?>
    </style>
</head>

<body>
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
                <form id="edit_introtext" method="post" action="index.php?action=editintrotext" >
                    <textarea placeholder="Insert Intro Text Here" rows="8" name="description"><?= $introtext['description'] ?></textarea>
                    <input class="save" type="submit" value="Save">
                </form>
                <a id="download_resume">Download my CV (PDF)</a>
                <form id="edit_resume" enctype="multipart/form-data" method="post" action="index.php?action=editresume">
                    <input type="file" name="resume" />
                </form>
            </div>
            <div id="skills">
                <h3>Expert <strong>in</strong></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam suscipit odio quam, a mollis turpis fringilla a. Sed lacinia, ligula cursus pellentesque feugiat, nisl neque consequat leo, nec commodo nibh ex rhoncus nibh.</p>
                <div id="skill_charts">
                    <?php while ($data = $skill->fetch())
                    {
                    ?>
                    <form id="edit_skill" method="post" action="index.php?action=editskill&id=<?= $data['id'] ?>">
                        <div id="edit_skill_window">
                                <div class="skill_block">
                                    <p>Skill <?= $data['id'] ?>:<input class="edit_skillname" name="name" value="<?= $data['skill_name'] ?>"/> Level :<input class="edit_level" name="level" value="<?= $data['skill_level'] ?>"/>/100</p>
                                </div>

                        </div>
                        <input class="save" type="submit" value="Save">
                    </form>

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
                    <form id="edit_education" method="post" action="index.php?action=editexperience&id=<?= $data['id'] ?>">
                        <div class="experience_block">
                            <div class="context">
                                <input name="period" value="<?= $data['period'] ?>"/>
                                <textarea name="location" rows="4"><?= $data['location'] ?></textarea>
                            </div>
                            <div class="main">
                                <input name="name" value="<?= $data['title'] ?>"/>
                                <textarea name="description" rows="4"><?= $data['description'] ?></textarea>
                            </div>
                        </div>
                        <input class="save" type="submit" value="Save">
                    </form>
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
                    <form id="edit_experience" method="post" action="index.php?action=editexperience&id=<?= $data['id'] ?>">
                        <div class="experience_block">
                            <div class="context">
                                <input name="period" value="<?= $data['period'] ?>"/>
                                <textarea name="location" rows="4"><?= $data['location'] ?></textarea>
                            </div>
                            <div class="main">
                                <input name="name" value="<?= $data['title'] ?>"/>
                                <textarea name="description" rows="4"><?= $data['description'] ?></textarea>
                            </div>
                        </div>
                        <input class="save" type="submit" value="Save">
                    </form>
                    <?php
                }
                $experience->closeCursor();
                ?>
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
                <form id="edit_expertise" method="post" action="index.php?action=editexpertise&id=<?= $data['id'] ?>">
                    <div class="expertise_window">
                        <div class="expertise_picture">
                            <?= $data['picture'] ?>
                            <input name="picture" value="<?= htmlspecialchars($data['picture']) ?>"/>
                        </div>
                        <div class="expertise_text">
                            <input name="title" value="<?= $data['title'] ?>"/>
                            <textarea name="description" rows="4"><?= $data['description'] ?></textarea>
                        </div>
                    </div>
                    <input class="save" type="submit" value="Save">
                </form>
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
                <li>All</li>
                <li>Websites</li>
                <li>SEO</li>
                <li>Content</li>
            </ul>
        </div>
        <div id="works_block">
            <?php foreach ($work_array as $data) {
                ?>
                <div class="work_form">
                    <div id="work_sample_<?= $data['id'] ?>">
                        <a href="<?= $data['link'] ?>" class="work_link"></a>
                    </div>
                    <form id="edit_work" enctype="multipart/form-data" method="post" action="index.php?action=editworks&id=<?= $data['id'] ?>">
                        <input type="file" name="picture" /><br/>
                        <input name="link" value="<?= htmlspecialchars($data['link']) ?>"/><br/>
                        <select name="category">
                            <option value="<?= $data['category'] ?>">Current: <?= $data['category'] ?></option>
                            <option value="website">Website</option>
                            <option value="seo">SEO</option>
                            <option value="content">Content</option>
                        </select>
                        <input class="save" type="submit" value="Save">
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
        <a id="addworkbutton" class="popup_button">Add new Work</a>
    </div>
</section>

<div id="addworkbox" class="popup_box" style="display: none;">
    <div id="addworkwindow" class="popup_window">
        <form id="add_work" enctype="multipart/form-data" method="post" action="index.php?action=addwork">
            <input type="file" name="picture" /><br/>
            <input name="link" value=""/><br/>
            <select name="category">
                <option value="website">Website</option>
                <option value="seo">SEO</option>
                <option value="content">Content</option>
            </select>
            <input class="save" type="submit" value="Save">
        </form>
    </div>
</div>

<section id="contact">
    <div id="contact_data">
        <h2>Contact Address</h2>
        <?= $separator ?>
        <form id="edit_contact" method="post" action="index.php?action=editcontact">
            <div id="contact_list">
                <input name="address" value="<?= $contact['address'] ?>"/><br/>
                <input name="mail" value="<?= $contact['mail'] ?>"/><br/>
                <input name="phone" value="<?= $contact['phone'] ?>"/>
            </div>
            <input class="save" type="submit" value="Save">
        </form>
        <div id="language_list">
            <?php while ($data = $languages->fetch())
            {
                ?>
            <form id="edit_contact" method="post" action="index.php?action=editlanguage&id=<?= $data['id'] ?>">
                <div class="language_sample">
                    <input name="language" value="<?= $data['languages'] ?>"/><br/>
                    <input name="level" value="<?= $data['language_level'] ?>"/><br/>
                </div>
                <input class="save" type="submit" value="Save">
            </form>
                <?php
            }
            $languages->closeCursor();
            ?>
        </div>
    </div>
    <div id="contact_form_block">
        <h2>Get in touch !</h2>
        <?= $separator ?>
        <form id="contact_form" method="get" action="index.php">
            <div id="basic_contact_data">
                <input type="text" placeholder="Name"/>
                <input type="email" placeholder="Your email"/>
            </div>
            <input type="subject" placeholder="Subject"/>
            <textarea placeholder="Your Message"></textarea>
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
        <form method="post" action="index.php?action=homeadmin">
            <label for="pseudo">Mail</label>
            <input type="email" name="pseudo" />
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
<script type="text/javascript" src="../public/js/togglelogin.js"></script>
<script type="text/javascript" src="../public/js/Launcher.js"></script>
</body>
</html>