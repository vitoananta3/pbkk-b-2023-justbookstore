<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center max-h-screen bg-[#E5E9F0]">
    <div class="my-8"></div>
    <div class="mt-8"></div>
    <div class="flex gap-4">
        <a href="<?= base_url(); ?>books/edit/<?= $book['slug']; ?>" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black">
            <div>Edit Category</div>
        </a>
        <form action="<?= base_url(); ?>/books/<?= $book['id']; ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 opacity-70 border-2 border-black" id="pop-button">Delete Category</button>

            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full bg-black bg-opacity-50">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this category?</h3>
                            <button data-modal-hide="popup-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2" type="submit" id="close-button">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" id="close-button">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <a href="/books" class="self-end text-sm border border-[#434C5E] hover:bg-[#81A1C1] text-[#434C5E] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200">
            Back to Books
        </a>
    </div>
    <div class="my-4"></div>
    <div class="flex spa-2 w-full max-w-screen-xl">
        <div class="flex w-1/2 border border-r-black pr-4">
            <img class="card-image object-contain" src="<?= base_url(); ?>assets/books-cover/<?= $book['cover']; ?>" alt="book-cover">
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
                    <div class="">Category:</div>
                    <div class="col-span-3"><?= $category['name'] ?></div>
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
            <div class="flex flex-col justify-center flex-grow self-center gap-10 items-center">
                <form action="<?= base_url(); ?><?php echo (session()->has('user')) ? 'useradding' : 'signin'; ?>" method="post">
                    <button type="submit" class="flex items-center gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>Add to Cart</div>
                    </button>
                </form>
                <form action="<?= base_url(); ?><?php echo (session()->has('user')) ? 'useradding' : 'signin'; ?>" method="post">
                    <button type="submit" class="flex items-center gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 opacity-70    ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>

                        <div>Buy Now</div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>