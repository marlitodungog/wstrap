<section class="content-header">
    <h1><?= __('View Hosting') ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h4><?= __('Title') ?> <?= h($hosting->title) ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Title : ') ?> 
            <?= h($hosting->meta_title) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Keyword : ') ?> 
            <?= h($hosting->meta_keyword) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Description : ') ?> 
            <?= h($hosting->meta_description) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Body ') ?> </h5>
            <?= $hosting->body ?>
        </div>
    </div>

</section>
