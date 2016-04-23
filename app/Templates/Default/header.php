<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo $title.' - '.SITETITLE;?></title>
    <?php
    echo $meta;//place to pass data / plugable hook zone
    Assets::css([
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
        Url::templatePath().'css/style.css',
    ]);
    echo $css; //place to pass data / plugable hook zone
    ?>
</head>
<body>
<?php echo $afterBody; //place to pass data / plugable hook zone?>

<div class="container">

<?php
if(Session::get('id')==null) {
   echo "<a href='".DIR."utilisateur/inscription'>Inscription </a>";
   echo "<a href='".DIR."utilisateur/login'> Login</a>";
} else {
	echo "Bonjour " . Session::get('login');
   echo "<a href='".DIR."utilisateur/logout'> Deconnexion </a>";
	

}