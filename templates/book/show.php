<?php 

require_once _ROOTPATH_.'/templates/header.php';
/* @var $book \App\Entity\Book */
?>


<H1><?=$book->getTitle(); ?></H1>
<P><?=$book->getDescription(); ?></P>

<?php
require_once _ROOTPATH_.'/templates/footer.php';?>