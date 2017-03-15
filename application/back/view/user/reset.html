<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\AuthItem $model
 */
$this->title = Yii::t('rbac-admin', 'Update Role').' | '.$model->username;

$js = <<<JS
jQuery('#form-signup').yiiActiveForm([{
        "id": "admin-password_old",
        "name": "password_old",
        "container": ".field-admin-password_old",
        "input": "#admin-password_old",
        "validate": function (attribute, value, messages, deferred) {
            yii.validation.required(value, messages, {"message": "旧密码 不能为空。"});
        }
    }, {
        "id": "admin-password",
        "name": "password",
        "container": ".field-admin-password",
        "input": "#admin-password",
        "validate": function (attribute, value, messages, deferred) {
            yii.validation.required(value, messages, {"message": "密码不能为空。"});
            yii.validation.string(value, messages, {
                "message": "密码 位数为6至32位",
                "min": 6,
                "tooShort": "密码应该包含至少6个字符。",
                "max": 32,
                "tooLong": "密码只能包含至多32个字符。",
                "skipOnEmpty": 1
            });
            yii.validation.regularExpression(value, messages, {
                "pattern": /^\w+$/g,
                "not": false,
                "message": "密码 只能是字母和数字组合",
                "skipOnEmpty": 1
            });
        }
    }, {
        "id": "admin-password_rep",
        "name": "password_rep",
        "container": ".field-admin-password_rep",
        "input": "#admin-password_rep",
        "validate": function (attribute, value, messages, deferred) {
             yii.validation.required(value, messages, {"message": "确认密码不能为空。"});
            yii.validation.string(value, messages, {
                "message": "确认密码 位数为6至32位",
                "min": 6,
                "tooShort": "确认密码应该包含至少6个字符。",
                "max": 32,
                "tooLong": "确认密码只能包含至多32个字符。",
                "skipOnEmpty": 1
            });
            yii.validation.regularExpression(value, messages, {
                "pattern": /^\w+$/g,
                "not": false,
                "message": "确认密码 只能是字母和数字组合",
                "skipOnEmpty": 1
            });
            yii.validation.compare(value, messages, {
                "operator": "==",
                "type": "string",
                "compareAttribute": "admin-password",
                "skipOnEmpty": 1,
                "message": "两次密码不一致"
            });
        }
    }], []);
JS;

$this->registerJs($js);

?>

<section class="wrapper site-min-height">

    <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" style="position: relative">
        <h1 style="text-align:center; color: #f33e6f;"><?= Html::encode($model->username) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ]);
        ?>
    </div>

</section>