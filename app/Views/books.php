<!-- <?php $this->setVar('pageTitle', "- Catalog"); ?> -->
<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center h-screen bg-[#E5E9F0]">
    <div class="my-8"></div>
    <div class="mt-4"></div>
    <div class="max-w-screen-xl flex flex-wrap gap-4 justify-between">
        <?php foreach ($books as $book) : ?>
            <a href="<?php base_url() ?>catalog/<?php $id = $book['id']; echo $id; ?>" class="bg-[#E5E9F0] rounded-md text-[#434C5E] hover:bg-[#81A1C1] hover:text-[#434C5E] card p-2 outline">
                <div class="flex flex-col">
                    <img class="card-image" src="<?= base_url() ?>assets/images/cover-2.jpg" alt="product image" />
                    <div class="flex flex-col pt-2 gap-2">
                        <div class="font-semibold text-sm">
                            <?php
                            $title = $book['title'];
                            if (strlen($title) > 16) {
                                echo substr($title, 0, 16) . '...';
                            } else {
                                echo $title;
                            }
                            ?>
                        </div>
                        <div class="font-light text-sm">
                            <?php
                            $author = $book['author'];
                            if (strlen($author) > 16) {
                                echo substr($author, 0, 16) . '...';
                            } else {
                                echo $author;
                            }
                            ?>
                        </div>
                        <span class="font-bold text-sm"><?= $book['price']; ?></span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>