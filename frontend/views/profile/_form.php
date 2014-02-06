<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var frontend\models\Profile $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="profile-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'first_name')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'last_name')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'state_id')->textInput() ?>

		<?= $form->field($model, 'city')->textInput() ?>

		<?= $form->field($model, 'country_id')->textInput() ?>

		<?= $form->field($model, 'zip')->textInput(['maxlength' => 20]) ?>

		<?= $form->field($model, 'phone')->textInput(['maxlength' => 20]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
