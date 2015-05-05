<section class="content-header">
    <h1><?= __('Slides') ?></h1>
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
                <?php foreach ($slides as $slide): ?>
                    <tr>
                        <td><?= $this->Number->format($slide->id) ?></td>
                        <td><?= h($slide->title) ?></td>
                        <td><!--<?= $this->Number->format($slide->is_publish) ?>-->
                            <?= $this->Html->link(($slide->is_publish == 1 ? '<i title="Set as Unpublish" class="fa fa-check"></i>' : '<i title="Set as Publish" class="fa fa-circle-o"></i>'),'javascript:void(0);',['class' => 'btn-publish-update', 'update-id' => $slide->id, 'base-url' => $this->Url->build('/slides/updatePublish', true), 'escape' => false]) ?>
                        </td>
                        <td><?= $this->Number->format($slide->sorting) ?></td>
                        <td><?= h($slide->created) ?></td>
                        <td><?= h($slide->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $slide->id],['class' => 'btn btn-info','escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['action' => 'edit', $slide->id],['class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-trash"></i>', '#modal-'.$slide->id,['data-toggle' => 'modal', 'class' => 'btn btn-danger', 'escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$slide->id?>" class="modal fade" tabindex="-1" data-width="660" style="display: none; max-height:175px;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Delete Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to <b>delete</b> <?=$slide->title?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                    <?= $this->Form->postLink(
                                            'Yes',
                                            ['action' => 'delete', $slide->id],
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

