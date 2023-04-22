<?php
/** @var array $categories */
/** @var int $category_id */
?>
<?php foreach ($categories as $category): ?>
    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
<?php endforeach; ?>
