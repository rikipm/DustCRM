<?php
/**
 * Created by PhpStorm.
 * User: Rikipm
 * Date: 22.06.2019
 * Time: 15:05
 */

/* @var $content string*/
?>

<?php $this->beginContent('@app/views/layouts/main.php');?>
    <div class="box">
        <div class="box-body">
            <?php echo $content ?>
        </div>
    </div>
<?php $this->endContent();?>
