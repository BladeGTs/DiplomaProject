<?php

use yii\helpers\Html;
$this->title = $statusCode;
?>
        <div class="while_grad">

            <div class="noise">

                <div class="header">
                    Ошибка <?= Html::encode($this->title) ?>: <span><?= nl2br(Html::encode($message)) ?></span>
                </div>

                <div class="body">

                    <img src="/img/error.png" alt="error.png" class="error_icon">

                    Упс, что-то пошло не так.

                    <div class="copyright">© 2019 «<a href="/"  title="Главная">OptimSKLAD</a>».</div>

                    <a href="/" title="Перейти на главную" class="home">Перейти на главную</a>

                </div>

            </div>

        </div>
