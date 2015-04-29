
<section class="content-header">
    <h1><?= __('View Slide') ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h4><?= __('Title') ?> <?= h($slide->title) ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Caption : ') ?> 
            <?= h($slide->caption) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Link : ') ?> 
            <?= h($slide->link) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Thumbnail : ') ?> 
            <?= h($slide->thumbnail) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Created : ') ?> 
            <?= h($slide->created) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Modified ') ?> </h5>
            <?= h($slide->modified) ?>
        </div>
    </div>

</section>
