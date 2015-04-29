<section class="content-header">
    <h1><?= __('View Service') ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h4><?= __('Title') ?> <?= h($service->title) ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Title : ') ?> 
            <?= h($service->meta_title) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Keyword : ') ?> 
            <?= h($service->meta_keyword) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= __('Meta Description : ') ?> 
            <?= h($service->meta_description) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Body ') ?> </h5>
            <?= $service->body ?>
        </div>
    </div>

</section>
