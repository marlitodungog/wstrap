<section class="content-header">
    <h1><?= __('View User') ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Username : ') ?> <?= h($user->username) ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Group : ') ?> <?= h($user->group->name) ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Created : ') ?> <?= h($user->created) ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Modified : ') ?> <?= h($user->modified) ?></h5>
        </div>
    </div>
</section>
