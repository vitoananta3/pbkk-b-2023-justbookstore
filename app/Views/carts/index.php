<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center bg-[#E5E9F0]">
    <div class="my-8"></div>
    <div class="mt-8"></div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="fixed top-0 mt-20 right-0 mr-8 z-30">
            <div id="alert-3" class="fade-out flex items-center p-4 text-green-800 rounded-lg bg-[#E5E9F0] dark:bg-[#434C5E] dark:text-green-400 gap-2" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    <?= session()->getFlashdata('message'); ?>
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-[#E5E9F0] text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-[#434C5E] dark:text-green-400 dark:hover:bg-[#81A1C1]" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    <?php endif; ?>
    <?php if (empty($cart)) : ?>
        <div class="flex gap-4">
            <a href="<?= base_url(); ?>books" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black">
                <div>Shop Now</div>
            </a>
        </div>
        <div class="spa flex flex-col items-center mt-8 text-[#434E5C] text-xl gap-4">
            <div>There are no items in your cart.</div>
            <div>Let's shop a book by clicking on the Shop Now above</div>
        </div>
    <?php else : ?>
        <div class="mx-auto max-w-screen-xl justify-center px-6 md:flex md:space-x-6 xl:px-0 w-full">
            <div class="rounded-lg md:w-2/3">
                <?php if (empty($books)) : ?>
                    <div class="flex justify-center">
                        <a href="<?= base_url(); ?>books" class="bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black">
                            Shop Now
                        </a>
                    </div>
                    <div class="flex flex-col items-center text-[#434E5C] text-xl gap-2 mt-4">
                        <div>There are no items in your cart</div>
                        <div>Let's shop a book by clicking on the Shop Now above</div>
                    </div>
                <?php else : ?>
                <?php endif; ?>
                <?php
                $cartTotal = 0; // Initialize the variable to hold the cart's total price
                ?>
                <?php foreach ($books as $book) : ?>
                    <?php foreach ($cartItems as $item) : ?>
                        <?php if ($book['id'] === $item['book_id']) : ?>
                            <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <div class="flex items-center justify-center w-1/5">
                                    <a href="<?= base_url(); ?>books/<?= $book['id']; ?>">
                                        <img src="<?= base_url(); ?>assets/books-cover/<?= $book['cover']; ?>" alt="product-image" class="w-full" />
                                    </a>
                                </div>
                                <div class="sm:ml-4 sm:flex sm:justify-between gap-8 w-full">
                                    <div class="mt-5 sm:mt-0 flex flex-col gap-4 justify-between w-2/3">
                                        <div class="flex flex-col gap-4">
                                            <h2 class="text-lg font-bold text-gray-900"><?= $book['title']; ?></h2>
                                            <h2 class=" text-base font-semibold text-gray-900">Rp<?= $book['price']; ?> (@1)</h2>
                                            <p class=" text-sm text-gray-700"><?= $book['author']; ?></p>
                                            <p class=" text-sm text-gray-700"><?= $book['publisher']; ?></p>
                                            <p class=" text-sm text-gray-700"><?= $book['synopsis']; ?></p>
                                        </div>
                                        <div class="w-1/4 text-sm text-center bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-2 py-2 transition-colors duration-200 border-2 border-black">
                                            <a href="<?= base_url(); ?>books/<?= $book['id']; ?>">Detail book</a>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex sm:space-y-6 sm:mt-0 sm:block flex-col gap-4 h-full w-1/3">
                                        <div class="flex border border-[#434C5E] rounded-lg">
                                            <?= form_open('updateitem/decrement/' . $item['id']); ?>
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <?= form_submit('submit', '-', ['class' => 'bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-l-md w-full px-5 py-auto transition-colors duration-200 border-2 border-black h-full']) ?>
                                            <?= form_close() ?>
                                            <div class=" flex h-8 border text-center outline-none w-full justify-center items-center"><?= $item['quantity']; ?></div>
                                            <?= form_open('updateitem/increment/' . $item['id']); ?>
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <?= form_submit('submit', '+', ['class' => 'bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-r-md w-full px-5 py-auto transition-colors duration-200 border-2 border-black h-full']) ?>
                                            <?= form_close() ?>
                                        </div>
                                        <div class="flex items-cente text-sm font-semibold justify-between">
                                            <?php
                                            $totalPrice = $book['price'] * $item['quantity'];
                                            $formattedPrice = number_format($totalPrice, 0, ',', '.');
                                            ?>
                                            <div>Subtotal</div>
                                            <div>Rp<?= $formattedPrice; ?></div>
                                        </div>
                                        <div class="flex gap-4 justify-end flex-grow">
                                            <form action="<?= base_url(); ?>deleteitem/<?= $item['id']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">

                                                <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 opacity-70 border-2 border-black" id="pop-button">
                                                    <div class="flex justify-center items-center gap-4">
                                                        <div>Remove</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </div>
                                                </button>

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
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this item?</h3>
                                                                <button data-modal-hide="popup-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2" type="submit" id="close-button">
                                                                    Yes, I'm sure
                                                                </button>
                                                                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" id="close-button">No, cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $subtotal = $book['price'] * $item['quantity']; // Calculate subtotal for each book
                            $cartTotal += $subtotal; // Add subtotal to the total price
                            ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <p class="text-lg font-bold mb-4">Cart Summary</p>
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Total</p>
                    <?php
                    $formattedCartTotal = number_format($cartTotal, 0, ',', '.');
                    ?>
                    <p class="mb-1 text-lg font-bold">Rp<?= $formattedCartTotal; ?></p>
                </div>
                <button class="bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black w-full mt-8">Check out</button>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>