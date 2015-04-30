
<section class="content-header">
    <h1><?= __('Hostings') ?></h1>
</section>

<div class="dropdown pull-right" style="margin:-50px 14px 0 0">
    <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
        Action <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">
        <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> Add New',['action' => 'add'], ['escape' => false]) ?></li>
    </ul>
</div>

<section class="content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="heading">
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('title') ?></th>
                        <th><?= $this->Paginator->sort('publish') ?></th>
                        <th><?= $this->Paginator->sort('sorting') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($hostings as $hosting): ?>
                    <tr>
                        <td><?= $this->Number->format($hosting->id) ?></td>
                        <td><?= h($hosting->title) ?></td>
                        <td><!--<?= $this->Number->format($hosting->is_publish) ?>-->
                            <?= $this->Html->link(($hosting->is_publish == 1 ? '<i title="Set as Unpublish" class="fa fa-check"></i>' : '<i title="Set as Publish" class="fa fa-circle-o"></i>'),'javascript:void(0);',['class' => 'btn-publish-update', 'update-id' => $hosting->id, 'base-url' => $this->Url->build('/hostings/updatePublish', true), 'escape' => false]) ?>
                        </td>
                        <td><?= $this->Number->format($hosting->sorting) ?></td>
                        <td><?= h($hosting->created) ?></td>
                        <td><?= h($hosting->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $hosting->id],['class' => 'btn btn-info','escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['action' => 'edit', $hosting->id],['class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-trash"></i>', '#modal-'.$hosting->id,['data-toggle' => 'modal', 'class' => 'btn btn-danger', 'escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$hosting->id?>" class="modal fade" tabindex="-1" data-width="660" style="display: none; max-height:175px;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Delete Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to <b>delete</b> <?=$hosting->title?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                    <?= $this->Form->postLink(
                                            'Yes',
                                            ['action' => 'delete', $hosting->id],
                                            ['class' => 'btn btn-primary', 'escape' => false]
                                        )
                                    ?>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator" style="text-align:center;">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Popup Modal for updating Publish -->
<a id="trigger-modal-btn" href="#modal-publish" data-toggle="modal" style="display:none;">#</a>
<div id="modal-publish" class="modal fade" tabindex="-1" data-width="660" style="display: none; max-height:164px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Message</h4>
    </div>
    <div class="modal-body">
        <div id="message-container"></div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
    </div>
</div>

