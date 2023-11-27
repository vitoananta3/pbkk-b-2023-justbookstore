<!-- <?php $this->setVar('pageTitle', "- Home"); ?> -->
<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center max-h-screen bg-[#E5E9F0]">
    <div class="my-8"></div>
    <div class="flex py-16 spa w-full max-w-screen-xl">
        <div class="flex w-1/2 border border-r-black pr-4">
            <img class="card-image object-contain" src="<?= base_url(); ?>/assets/images/<?php $path = $book['cover'];
                                                                                            echo $path ?>" alt="book-cover">
        </div>
        <div class="flex flex-col w-1/2 justify-between h-full pl-4">
            <div class="flex flex-col gap-2">
                <div class="grid grid-cols-4 gap-0 font-bold text-xl">
                    <div class="">Title:</div>
                    <div class="col-span-3"><?php $title = $book['title'];
                                            echo $title; ?></div>
                </div>
                <div class="grid grid-cols-4 gap-0">
                    <div class="">Author:</div>
                    <div class="col-span-3"><?php $author = $book['author'];
                                            echo $author; ?>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-0">
                    <div class="">Publisher:</div>
                    <div class="col-span-3"><?php $publisher = $book['publisher'];
                                            echo $publisher; ?></div>
                </div>
                <div class="grid grid-cols-4 gap-0">
                    <div class="">Synopsis:</div>
                    <div class="col-span-3"><?php $synopsis = $book['synopsis'];
                                            echo $synopsis; ?>...</div>
                </div>
                <div class="grid grid-cols-4 gap-0">
                    <div class="">Price:</div>
                    <div class="col-span-3 font-semibold">Rp<?php $price = $book['price'];
                                                        echo $price; ?></div>
                </div>
                <div class="grid grid-cols-4 gap-0">
                    <div class="">Stock:</div>
                    <div class="col-span-3"><?php $stock = $book['stock'];
                                            echo $stock; ?></div>
                </div>
            </div>
            <div class="flex justify-evenly">
                <a href="#" class="flex items-center gap-2 self-end text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div>Add to Cart</div>
                </a>
                <a href="#" class="flex items-center gap-2 self-end text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 opacity-70    ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>

                    <div >Buy Now</div>
                </a>
            </div>
            <div class="flex flex-col">
                <a href="/books" class="self-end text-sm border border-[#434C5E] hover:bg-[#81A1C1] text-[#434C5E] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200">
                    Back to Books
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>