<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="web mvc">
    <meta name="description" content="<?php echo $this->getDescription(); ?>">
    <meta name="keywords" content="<?php echo $this->getKeywords(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->getTitle(); ?></title>
    <link rel="stylesheet" href="<?php echo DIRCSS.'style.css'?>">
    <?php echo $this->addHead(); ?>
</head>
<body>
    <div class="Nav">
        <a href="<?php echo DIRPAGE; ?>">Home</a>
        <a href="<?php echo DIRPAGE.'contato'; ?>">Contato</a>
        <a href="<?php echo DIRPAGE.'cadastro'; ?>">Cadastro</a>
        <a href="<?php echo DIRPAGE.'login'; ?>">Login</a>
    </div>
    
    <div class="Header">
        <img src="<?php echo DIRIMG.'Banner.jpg'; ?>" alt="banner">
        <?php echo $this->addHeader(); ?>
    </div>

    <div class="Main">
        <?php
            $BreadCrumb = new Src\Classes\ClassBreadcrumb();
            $BreadCrumb->addBreadcrumb();
        ?>
        <hr>
        <br>TEL: (XX) XXXX-XXXX <br>
        <?php echo $this->addMain(); ?> 
    </div>

    <div class="Footer">
        2020 - Todos os direitos reservados <br>
        <?php echo $this->addFooter(); ?>
    </div>

</body>
</html>