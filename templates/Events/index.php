<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Events[]|\Cake\Collection\CollectionInterface $events
 */
?>

<div class="events index content">
    <?= $this->Html->link(__('New event'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Events') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('event_id') ?></th>
                    <th><?= $this->Paginator->sort('eventName') ?></th>
                    <th><?= $this->Paginator->sort('frequency') ?></th>
                    <th><?= $this->Paginator->sort('startDateTime') ?></th>
                    <th><?= $this->Paginator->sort('endDateTime') ?></th>
                    <th><?= $this->Paginator->sort('invitees') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= $this->Number->format($event->event_id) ?></td>
                    {% comment %} <td><?= $event->has('user') ? $this->Html->link($event->group->name, ['controller' => 'Groups', 'action' => 'view', $event->group->id]) : '' ?></td> {% endcomment %}
                    <td><?= h($event->eventName) ?></td>
                    <td><?= h($event->frequency) ?></td>
                    <td><?= h($event->startDateTime) ?></td>
                    <td><?= h($event->endDateTime) ?></td>
                    <td><?= h($event->invitees) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $event->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
