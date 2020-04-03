<form class="d-inline">
    <input type="hidden" name="order" value="<?= $criterion ?>" />
    <input type="hidden" name="order_direction" value="<?= $orderBy === $criterion && $orderDirection === 'ASC' ? 'DESC' : 'ASC' ?>" />
    <button type="submit" class="btn btn-<?= $orderBy === $criterion ? 'info' : 'outline-secondary' ?> btn-sm">
        <i class="fas fa-sort-<?= $orderBy === $criterion && $orderDirection === 'ASC' ? 'up' : 'down' ?>"></i>
    </button>
</form>
