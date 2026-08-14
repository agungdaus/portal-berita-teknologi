<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */
?>
<?php if ($pager->hasPrevious()): ?>
    <a href="<?= $pager->getPrevious() ?>">&laquo; Previous</a>
<?php endif; ?>
<?php if ($pager->hasNext()): ?>
    <a href="<?= $pager->getNext() ?>">Next &raquo;</a>
<?php endif; ?>
