<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center h-screen bg-[#E5E9F0]">
    <div class="my-8"></div>
    <div class="mt-4"></div>
    <div class="flex gap-4">
        <a href="/books/create" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black">
            <div>Add Book</div>
        </a>
        <a href="#" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black">
            <div>XXX Book</div>
        </a>
    </div>
    <div class="grid grid-cols-6 grid-flow-row gap-6 max-w-screen-xl mx-auto">
        <?php foreach ($books as $book) : ?>
            <a href="<?php base_url() ?>books/<?php $slug = $book['slug'];
                                                echo $slug; ?>" class="bg-[#E5E9F0] rounded-md text-[#434C5E] hover:bg-[#81A1C1] hover:text-[#434C5E] p-2 outline">
                <div class="flex flex-col">
                    <img class="card-image" src="<?= base_url(); ?>/assets/images/<?php $path = $book['cover'];
                                                                                    echo $path ?>" alt="">
                    <div class="flex flex-col pt-2 gap-2">
                        <div class="font-semibold text-sm">
                            <?php
                            $title = $book['title'];
                            if (strlen($title) > 20) {
                                echo substr($title, 0, 20) . '...';
                            } else {
                                echo $title;
                            }
                            ?>
                        </div>
                        <div class="font-light text-sm">
                            <?php
                            $author = $book['author'];
                            if (strlen($author) > 20) {
                                echo substr($author, 0, 20) . '...';
                            } else {
                                echo $author;
                            }
                            ?>
                        </div>
                        <span class="font-bold text-sm">Rp<?= $book['price']; ?></span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>