<section class="content-header">
    <h1><?= __('Edit User') ?></h1>
</section>
<section class="content">
    <?= $this->Form->create($user,['class' => 'form-horizontal']); ?>
    <fieldset>

        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-6">
                <?= $this->Form->input('username',['class' => 'form-control', 'id' => 'username', 'label' => false]) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-6">
                <?= $this->Form->input('password',['class' => 'form-control', 'id' => 'password', 'label' => false]) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="role" class="col-sm-2 control-label">Group</label>
            <div class="col-sm-2">
                <?= $this->Form->input('groups', ['class' => 'form-control', 'id' => 'role', 'label' => false]); ?>
            </div>
        </div>

    </fieldset> 
    <div class="form-group" style="margin-top: 80px;">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="action-fixed-bottom">
                <?= $this->Form->button('<i class="fa fa-save"></i> Save',['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                <?= $this->Form->button('<i class="fa fa-edit"></i> Save and Continue',['name' => 'edit', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</section>

