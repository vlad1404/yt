<?php
$this->params['breadcrumbs'][] = [
    'label' => 'Products',
    'url' => ['/products'],
    'template' => "<li>{link}</li>\n",
];
$this->params['breadcrumbs'][] = [
    'label' => $product->name,
    'url' => ['/products/view', 'id' => $product->id],
    'template' => "<li><b>{link}</b></li>\n",
];
?>
<h1><?=$product->name?></h1>

<?php if (!empty($tags)): ?>
    <div class="container">
        <h2>Tags</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tags as $tag) : ?>
                <tr>
                    <td>
                        <?=$tag->id?>
                    </td>
                    <td>
                        <?=$tag->name?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    No tags
<?php endif; ?>

<?php if (!empty($regions)): ?>
    <div class="container">
        <h2>Regions</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($regions as $region) : ?>
                <tr>
                    <td>
                        <?=$region->id?>
                    </td>
                    <td>
                        <?=$region->name?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    No regions
<?php endif; ?>

<?php if (!empty($categories)): ?>
    <div class="container">
        <h2>categories</h2>
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
