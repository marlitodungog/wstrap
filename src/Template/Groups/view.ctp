<section class="content-header">
    <h1><?= __('View Group') ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Name : ') ?> <?= h($group->name) ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Created : ') ?> <?= h($group->created) ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><?= __('Modified : ') ?> <?= h($group->modified) ?></h5>
        </div>
    </div>
    <br/>
    <div class=" row">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= __('Related Users') ?></h3>
        </div>
        <?php if (!empty($group->users)): ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="heading">
                        <th><?= __('Id') ?></th>
                        <th><?= __('Username') ?></th>
                        <th><?= __('Created') ?></th>
                        <th><?= __('Modified') ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($group->users as $users): ?>
                    <tr>
                        <td><?= h($users->id) ?></td>
                        <td><?= h($users->username) ?></td>
                        <td><?= h($users->created) ?></td>
                        <td><?= h($users->modified) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
        </div>
    </div>
</section>
