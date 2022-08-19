<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="students view content">
            <h3><?= h($student->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($student->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($student->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($student->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= $this->Number->format($student->age) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($student->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($student->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Football Ragistrations') ?></h4>
                <?php if (!empty($student->football_ragistrations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Created To') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->football_ragistrations as $footballRagistrations) : ?>
                        <tr>
                            <td><?= h($footballRagistrations->id) ?></td>
                            <td><?= h($footballRagistrations->student_id) ?></td>
                            <td><?= h($footballRagistrations->created_to) ?></td>
                            <td><?= h($footballRagistrations->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FootballRagistrations', 'action' => 'view', $footballRagistrations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FootballRagistrations', 'action' => 'edit', $footballRagistrations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FootballRagistrations', 'action' => 'delete', $footballRagistrations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $footballRagistrations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Picnic Ragistrations') ?></h4>
                <?php if (!empty($student->picnic_ragistrations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->picnic_ragistrations as $picnicRagistrations) : ?>
                        <tr>
                            <td><?= h($picnicRagistrations->id) ?></td>
                            <td><?= h($picnicRagistrations->student_id) ?></td>
                            <td><?= h($picnicRagistrations->amount) ?></td>
                            <td><?= h($picnicRagistrations->created_at) ?></td>
                            <td><?= h($picnicRagistrations->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PicnicRagistrations', 'action' => 'view', $picnicRagistrations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PicnicRagistrations', 'action' => 'edit', $picnicRagistrations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PicnicRagistrations', 'action' => 'delete', $picnicRagistrations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picnicRagistrations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
