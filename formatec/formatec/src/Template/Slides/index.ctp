<h2 class="page-header">Liste des Slides</h2>
<div class="">

    <table class="table-bordered table">
        <thead>
            <tr>

                <th><?= $this->Paginator->sort('name') ?></th>

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($slides as $slide): ?>
            <tr>

                <td><?= h($slide->name) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $slide->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $slide->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $slide->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slide->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>



