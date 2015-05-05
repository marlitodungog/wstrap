
<section class="content-header">
    <h1><?= __('View Other Page') ?> </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h4><?= __('Title') ?> <?= h($otherPage->title) ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Title : ') ?> 
            <?= h($otherPage->meta_title) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Keyword : ') ?> 
            <?= h($otherPage->meta_keyword) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Description : ') ?> 
            <?= h($otherPage->meta_description) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Body ') ?> </h5>
            <?= $otherPage->body ?>
        </div>
    </div>

</section>
