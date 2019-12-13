<?php
use yii\helpers\Url;

$this->title = 'PDF';

?>
<embed src="<?= Url::to(['/site/pdf', 'id' => 1], true) ?>" type="application/pdf" width="100%" height="1300"></embed>