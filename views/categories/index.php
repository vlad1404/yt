<?php
$this->params['breadcrumbs'][] = [
    'label' => 'Categories',
    'url' => ['/categories'],
    'template' => "<li><b>{link}</b></li>\n",
];
?>
<?php if (!empty($categories)): ?>
    <div class="container">
        <h2>Categories</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td>
                        <?=$category->id?>
                    </td>
                    <td>
                        <a href="<?=Yii::$app->params['baseUrl'] . '/categories/view?id=' . $category->id; ?>">
                            <?=$category->name; ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    No categories
<?php endif; ?>
