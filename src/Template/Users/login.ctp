<a href="" class="lg-logo"><?= $this->Html->image('logo.png') ?></a>
<div class="form-box">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
        <?= $this->Form->input('username',["placeholder" => "username", "label" => false]) ?>
        <?= $this->Form->input('password',["placeholder" => "password", "label" => false]) ?>

<?= $this->Form->button(__('Login'),["class" => "btn btn-primary btn-block login"]); ?>
<?= $this->Form->end() ?>
</div>
