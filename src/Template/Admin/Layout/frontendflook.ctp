<!DOCTYPE html>
<html lang="en">

    <head>

        <?= $this->element('headflook') ?>

    </head>

    <body>
        
        <!-- Page Content -->

        <div style="width:100%;float:left;">

            <div id="content" style="margin-bottom: 10px; margin-top: 10px;" class="container">

                <?= $this->Flash->render() ?>

                <div class="row">

                <!--
                    When you create a layout, you need to tell CakePHP where
                    to place the output of your views. To do so, make sure your layout includes 
                    a place for $this->fetch('content')
                -->

                <?= $this->fetch('content') ?>

                </div>

            </div>

        </div>

    </body>

</html>