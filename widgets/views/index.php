<?php

use yii\widgets\Pjax;
use yii\widgets\LinkPager;

/* @var $this \yii\web\View */
/* @var $comments array */
/* @var $commentModel \yii2mod\comments\models\CommentModel */
/* @var $maxLevel null|integer comments max level */
/* @var $encryptedEntity string */
/* @var $pjaxContainerId string */
/* @var $formId string comment form id */
/* @var $withDeleted boolean show deleted comments or not */
/* @var $pages \yii\data\Pagination pagination object */
?>
<?php Pjax::begin([
    'enablePushState' => false,
    'timeout' => 10000,
    'id' => $pjaxContainerId
]); ?>
<div class="comments row">
    <div class="col-md-12 col-sm-12">
        <div class="title-block clearfix">
            <h3 class="h3-body-title"><?php echo Yii::t('yii2mod.comments', "Comments ({0})", $commentModel->getCommentsCount($withDeleted)); ?></h3>
            <div class="title-separator"></div>
        </div>
        <ol class="comments-list">
            <?php echo $this->render('_list', ['comments' => $comments, 'maxLevel' => $maxLevel]) ?>
            <?php if(!is_null($pages)):?>
		        <?php echo LinkPager::widget([
		          'pagination' => $pages,
		        ]);?>
	        <?endif;?>
        </ol>
	    <?php if (!Yii::$app->user->isGuest): ?>
		    <?php echo $this->render('_form', [
			    'commentModel' => $commentModel,
			    'encryptedEntity' => $encryptedEntity,
			    'formId' => $formId
		    ]); ?>
	    <?php endif; ?>
    </div>
</div>
<?php Pjax::end(); ?>
