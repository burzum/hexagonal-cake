<h1>
    Articles
</h1>

<ul>
    <?php foreach ($articles as $article) : ?>
        <li>
            <section class="article">
                <h2><?php echo h($article->get('title')); ?></h2>
                <?php
                    echo $this->Text->truncate($article->get('title'));
                ?>
            </section>
        </li>
    <?php endforeach; ?>
    <?php echo $this->Paginator->numbers(); ?>
</ul>
