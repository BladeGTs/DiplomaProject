<?php
/* @var $this yii\web\View */
/* @var $bookList[] frontend\models\Book */
use yii\helpers\Url;
?>
<h1>Книги</h1>
<a href="<?php echo Url::to(['create']);?>" class ="btn btn-primary">Создать книгу </a>
<div class="card">
    <div class="card-header">
        <h5>Filtering</h5>
        <span>Include filtering in your FooTable.</span>
        <div class="card-header-right">
            <i class="icofont icofont-rounded-down"></i>
            <i class="icofont icofont-refresh"></i>
            <i class="icofont icofont-close-circled"></i>
        </div>
    </div>
    <div class="card-block">
        <table id="demo-foo-filtering" class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="">
            <thead>
                <tr class="footable-header">

                    <th class="footable-sortable footable-first-visible" style="display: table-cell;">First Name<span class="fooicon fooicon-sort"></span></th><th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Last Name<span class="fooicon fooicon-sort"></span></th><th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Job Title<span class="fooicon fooicon-sort"></span></th><th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">BOB<span class="fooicon fooicon-sort"></span></th><th class="footable-sortable footable-last-visible" style="display: table-cell;">Status<span class="fooicon fooicon-sort"></span></th></tr>
            </thead>
            <tbody>
                <?php foreach ($bookList as $book): ?>
                <?php foreach ($book->getAuthors() as $author) :?>
                <tr>
                    <td style="display: table-cell;" class="footable-first-visible"><?php echo $book->name; ?></td>
                    <td style="display: table-cell;"><?php echo $book->getDatePublished(); ?></td>
                    <td style="display: table-cell;"><?php echo $book->getPublisherName();    ?></td>
                    <td style="display: table-cell;">Null</td>
                    
                    <td style="display: table-cell;" class="footable-last-visible">
                        <span class="tag tag-danger"> <?php echo $author->first_name; ?></span>
                        <?php endforeach;?>
                    </td>
                           
                </tr>
                <?php endforeach;?>
            </tbody>

        </table>
    </div>
</div>





