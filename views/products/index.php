<?php
$this->params['breadcrumbs'][] = [
    'label' => 'Products',
    'url' => ['/products'],
    'template' => "<li><b>{link}</b></li>\n",
];
?>
<?php if (!empty($products)): ?>
    <div class="container">
        <h2>Products</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
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
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    No products
<?php endif; ?>
