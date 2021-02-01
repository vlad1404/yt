<?php
$this->params['breadcrumbs'][] = [
    'label' => 'Categories',
    'url' => ['/categories'],
    'template' => "<li>{link}</li>\n",
];
$this->params['breadcrumbs'][] = [
    'label' => $category->name,
    'url' => ['/categories/view', 'id' => $category->id],
    'template' => "<li><b>{link}</b></li>\n",
];
?>
<h1><?=$category->name?></h1>

<?php if (!empty($products)): ?>
    <div class="container">
        <h2>products</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td>
                        <?=$product->id?>
                    </td>
                    <td>
                        <a href="<?=Yii::$app->params['baseUrl'] . '/products/view?id=' . $product->id; ?>">
                            <?=$product->name; ?>
                        </a>
                    </td>
                    <td>
                        <?=$product->price?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    No categories
<?php endif; ?>
