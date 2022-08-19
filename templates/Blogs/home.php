
<div class="container">

    <div class="row">
        <div class="col-4">
            <h3 style="color: #fff;" class="bg-info text-capitalize p-1">Recent Post</h3>
            <ul class="list-group list-group-flush">
                <?php foreach ($articleList as $key => $articleTitle) : ?>
                    <li class="list-group-item">
                        <a href =<?= $this->Url->build(['controller' =>'Blogs', 'action'=>'view', $key]) ?> > <?= $articleTitle ?> </a>
                    </li>
                <?php endforeach; ?>
                <li class="list-group-item"><a href ="#">Cras justo odio</a></li>

            </ul>
        </div>

        <div class="col-8">
            <div class="row">
                <div class="list-group ">
                    <?php foreach ($articles as $article) : ?>
                    <a href=<?= $this->Url->build(['action' => 'view', $article->id]) ?> class="list-group-item list-group-item-action flex-column mb-2">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= $article->title ?></h5>
                            <small><?= $article->created ?></small>
                        </div>
                        <p class="mb-1">
                            <?php
                            echo $this->Text->truncate(
                                $article->details ,
                                21,
                                [
                                    'ellipsis' => '...',
                                    'exact' => false
                                ]
                            );
                            ?>



                         </p>
                        <small>Donec id elit non mi porta.</small>
                    </a>
                    <?php endforeach; ?>

                    <a href="#" class="list-group-item list-group-item-action flex-column mb-2">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small>Donec id elit non mi porta.</small>
                    </a>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                    <ul class ='pagination'>
                        <?= $this->Paginator->prev("<<"); ?>
                        <?= $this->Paginator->numbers(); ?>
                        <?= $this->Paginator->next(">>"); ?>

                    </ul>


                </div>
            </div>
        </div>
    </div>

</div>

</div>

