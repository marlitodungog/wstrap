<section class="content-header">
    <h1><?= __('Add New') ?> </h1>
</section>
<section class="content">
    <?= $this->Form->create($slide,['class' => 'form-horizontal']); ?>
    <fieldset>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <?= $this->Form->input('title',['class' => 'form-control', 'id' => 'title', 'label' => false]) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="body" class="col-sm-2 control-label">Caption</label>
            <div class="col-sm-10">
                <?= $this->Form->input('caption',['class' => 'form-control ', 'id' => 'caption', 'label' => false]) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="meta_title" class="col-sm-2 control-label">Link</label>
            <div class="col-sm-10">
                <?= $this->Form->input('link',['class' => 'form-control', 'id' => 'link', 'label' => false]) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="body" class="col-sm-2 control-label">Thumbnail</label>
            <div class="col-sm-10">
                <?= $this->Form->input('thumbnail',['class' => 'form-control has-ck-finder ', 'id' => 'thumbnail', 'readonly' => 'readonly', 'label' => false]) ?>
            </div>
        </div>
        <div class="form-group">
            <label for="is_publish" class="col-sm-2 control-label">Publish</label>
            <div class="col-sm-10">
                <?= $this->Form->select('is_publish',["1" => "Yes", "0" => "No"],['class' => 'form-control', 'id' => 'is_publish', 'label' => false]) ?>
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

