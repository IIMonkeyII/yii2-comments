<?php

use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $comment \yii2mod\comments\models\CommentModel */
?>
<div class="comments" style="margin:0px">
    <div class="comment-author-name">
        <span>
	        <?php echo $comment->getAuthorName(); ?>
        </span>
	    <br>
        <span class="comment-date">
            <?php echo $comment->getPostedDate(); ?>
        </span>
    </div>
    <div class="comment-body">
        <?php echo $comment->getContent(); ?>
    </div>

</div>
