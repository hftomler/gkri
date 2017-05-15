<?php
use app\models\MessageForm;
use yii\widgets\ActiveForm;

$model = new MessageForm;
?>
<!-- Modal -->
<div class="modal fade" id="messages" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center">
                    Mensajes Privados
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 panel-wrap">
                    <div class="row header-wrap">
                        <div class="chat-header col-sm-12">
                            <h4>Conversaciones</h4>
                        </div>
                    </div>
                    <div class="row content-wrap conversaciones">
                    <!-- Distintas conversaciones -->
                    <?php foreach ($conversaciones as $conversacion) : ?>
                        <div class="conversation btn" data-id="<?= $conversacion['user_id'] ?>">
                            <div class="media-body">
                                <h5 class="media-heading"><?= $conversacion['username'] ?></h5>
                                <small class="pull-right time"><?= date_format(new DateTime($conversacion['last_message']), 'd/m/Y H:i:s') ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 panel-wrap">
                    <!-- Los mensajes de la conversacion -->
                    <div class="row header-wrap">
                        <div class="chat-header col-sm-12">
                            <h4 class="contact-username"></h4>
                        </div>
                    </div>

                    <div class="row content-wrap messages">

                    </div>
                    <!--Message box & Send Button-->
                    <div class="row send-wrap">
                        <div class="send-message">
                            <?php $form = ActiveForm::begin([
                                'enableClientValidation' => true,
                                'id' => 'mensajes-form',
                                'fieldConfig' => [
                                    'options' => [
                                        'tag' => false,
                                    ],
                                ],
                            ]); ?>
                            <div class="message-text">
                                <?= $form->field($model, 'texto')->textarea([
                                    'class' => 'no-resize-bar form-control',
                                    'rows' => 2,
                                    'data-username' => $user->username,
                                    'id' => 'textarea-message',
                                    'placeholder' => 'Escriba un mensaje...',
                                    ])->label(false) ?>
                            </div>

                            <div class="send-button">
                                <a class="btn btn-disabled btn-enviar-mensaje">Enviar <i class="fa fa-send"></i></a>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
