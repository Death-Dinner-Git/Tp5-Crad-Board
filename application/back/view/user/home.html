<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = $model->username;

$this->registerCssFile('@web/plugins/modal/zeroModal.css', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('@web/plugins/modal/zeroModal.js', ['depends' => 'backend\assets\AppAsset']);

$js = <<<JS
$('#admin-update-head .save').on('click',function() {
  $('#admin-update-head').modal('hide');
  var _head_url = $('#admin-update-head input#admin-head_url').val();
  if (_head_url && _head_url != ''){
      $.ajax({
                    type: "post",
                    url: window.location.href + '&url='+_head_url,
                    data: {},   //参数
                    beforeSend: function () {
                        $('.cover-loading').fadeIn(200);
                    },
                    success: function (msg) {
                        $('.cover-loading').fadeOut(200);
                        if (msg.code == 1 && msg.url != '') {
                           $('#show-head_url').attr('src',msg.url);
                           $('#sidebar-head_url').attr('src',msg.url);
                           clear();
                        } else {
                            zeroModal.error({content: '更新出错', overlayClose: true});
                        }
                        // console.log(msg);
                    },
                    error: function () {
                        $('.cover-loading').fadeOut(200);
                        zeroModal.error({content: '更新出错', overlayClose: true});
                    }
                });
  }
  function clear() {
      $('#admin-update-head input#admin-head_url').val('');
      $('#admin-update-head .upload-container .show').html('');
      $('#admin-update-head .upload-container img.add-admin-head_url').show();
  }
})
JS;

$this->registerJs($js);

?>

<div class="contact-item-view">

    <div class="row">

        <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" style="position: relative">

            <h1 style="text-align:center; color: #f33e6f;">
                <i><img id="show-head_url" src="<?= !empty($model->head_url) ? $model->head_url : '/back/images/default-user.png' ?>"  class="img-circle" style="width:30px; height:30px;margin: 0 15px;"  /></i>
                <?= Html::encode($this->title) ?>
            </h1>

            <p>
                <?= Html::a('修改密码', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <label class="btn btn-primary" data-toggle="modal"  href="#admin-update-head">更新头像</label>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'phone',
                    'email:email',
                    'company',
                    [
                        'label' => '管理等级',
                        'value' => $model->roleLists[$model->role],
                    ],
                    [
                        'label' => '管理地区',
                        'value' => $model->full_region_name,
                    ],
                    [
                        'label' => '注册时间',
                        'value' => date('Y-m-d H:i:s',$model->created_at),
                    ],
                ],
            ]) ?>

        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="admin-update-head" tabindex="-1" role="dialog" aria-labelledby="warning-sortLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="warning-sortLabel" style="text-align: center">请选择图片!</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <!-- start -->
                        <div class="admin-head-form">

                            <?php $form = ActiveForm::begin(['id' => 'admin-head-form']); ?>

                            <div class="form-group field-admin-head_url">
                                <label class="div-control div-tips" for="admin-head_url-file">
                                    <div class="upload-container" style="padding:15px;">
                                        <img src="/back/images/upload-img.png" alt="upload-image" class="add-admin-head_url add-tips">
                                        <div class="show" id="show-upload-admin-head_url"></div>
                                    </div>
                                </label>
                                <input type="file" id="admin-head_url-file" style="display: none" name="admin-head_url" data-parent="admin" data-target="#admin-head_url"
                                       accept="image/jpeg,image/png,image/jpg">
                                <div class="hint-block">点击即可选择图片</div>
                                <input type="text" id="admin-head_url" class="form-control" name="head_url" style="display: none">
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                        <!-- end -->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary save">确定</button>
            </div>
        </div>
    </div>
</div>
