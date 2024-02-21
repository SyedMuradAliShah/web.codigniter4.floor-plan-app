<nav class="d-flex justify-content-center">
    <ul class="pagination">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item page-indicator">
                <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <i class="la la-angle-double-left"></i>
                </a>
            </li>
            <li class="page-item page-indicator">

                <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <i class="la la-angle-left"></i>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= !$link['active'] ? $link['uri'] : 'javascript:void()' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li class="page-item page-indicator">
                <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <i class="la la-angle-right"></i>
                </a>
            </li>
            <li class="page-item page-indicator">
                <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <i class="la la-angle-double-right"></i>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>