<html>
<head>
    <title><?= $this->fetch("title")?></title>
    <?php echo $this->Html->css('bootstrap.min.css') ?>
    <?php echo $this->Html->css('jquery.dataTables.min.css') ?>
    <?php
    echo $this->Html->meta("csrfToken", $this->request->getAttribute("csrfToken"));
    ?>

    <style>
        #frm-add-student label.error {
            color: red;
        }
        #frm-edit-student label.error {
            color: red;
        }
        #frm-register-user label.error {
            color: red;
        }
        #frm-edit-user label.error {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h3 class="text-center">Cakephp 4 CURD Application</h3>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div>
<!--JS Files-->
<?php echo $this->Html->script('jquery.min.js') ?>
<?php echo $this->Html->script('bootstrap.min.js') ?>
<?php echo $this->Html->script('jquery.dataTables.min.js') ?>
<?php echo $this->Html->script('jquery.validate.min.js') ?>
<script>
    var token = $('meta[name="csrfToken"]').attr('content');
    console.log(token);
</script>
<?php echo $this->Html->script('custom.js') ?>
</body>
</html>
