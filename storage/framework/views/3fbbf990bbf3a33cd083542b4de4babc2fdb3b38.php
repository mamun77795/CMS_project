<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EliteDealer</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    EliteDealer
                </div>
                <div class="subtitle">
                    <?php if(Lang::has('EliteDealer::example.welcome')): ?>
                        <?php echo e(trans('EliteDealer::example.welcome')); ?>

                    <?php else: ?>
                        This is module File
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH D:\Ampps\www\new-project\app\Modules/EliteDealer/resources/views/welcome.blade.php ENDPATH**/ ?>