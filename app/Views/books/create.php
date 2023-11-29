<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center bg-[#E5E9F0]">
    <div class="my-14"></div>
    <div class="flex items-center w-6/12 max-w-screen-xl mb-8">
        <div class="flex flex-col w-full">
            <?= form_open_multipart('books/save') ?>
            <?= csrf_field() ?>
            <div class="text-sm flex flex-col justify-center gap-2">
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= session('validation_errors') && array_key_exists('title', session('validation_errors')) && session('validation_errors')['title'] ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= session('validation_errors') && array_key_exists('title', session('validation_errors')) && session('validation_errors')['title'] ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="..." autofocus name="title" value="<?= old('title'); ?>" />
                    <label for="title" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= session('validation_errors') && array_key_exists('title', session('validation_errors')) && session('validation_errors')['title'] ? 'red-600' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Title</label>
                </div>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('title', session('validation_errors')) && session('validation_errors')['title']) {
                                                echo session('validation_errors')['title'];
                                            }
                                            ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= session('validation_errors') && array_key_exists('author', session('validation_errors')) && session('validation_errors')['author'] ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= session('validation_errors') && array_key_exists('author', session('validation_errors')) && session('validation_errors')['author'] ? 'red-600' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="..." autofocus name="author" value="<?= old('author'); ?>" />
                    <label for="author" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= session('validation_errors') && array_key_exists('author', session('validation_errors')) && session('validation_errors')['author'] ? 'red-600' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Author</label>
                </div>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('author', session('validation_errors')) && session('validation_errors')['author']) {
                                                echo session('validation_errors')['author'];
                                            }
                                            ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= session('validation_errors') && array_key_exists('publisher', session('validation_errors')) && session('validation_errors')['publisher'] ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= session('validation_errors') && array_key_exists('publisher', session('validation_errors')) && session('validation_errors')['publisher'] ? 'red-600' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="..." autofocus name="publisher" value="<?= old('publisher'); ?>" />
                    <label for="publisher" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= session('validation_errors') && array_key_exists('publisher', session('validation_errors')) && session('validation_errors')['publisher'] ? 'red-600' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Publisher</label>
                </div>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('publisher', session('validation_errors')) && session('validation_errors')['publisher']) {
                                                echo session('validation_errors')['publisher'];
                                            }
                                            ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <textarea type="text" id="floating_outlined" class="h-32 border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= session('validation_errors') && array_key_exists('synopsis', session('validation_errors')) && session('validation_errors')['synopsis'] ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= session('validation_errors') && array_key_exists('synopsis', session('validation_errors')) && session('validation_errors')['synopsis'] ? 'red-600' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" autofocus name="synopsis"><?= old('synopsis'); ?></textarea>
                    <label for="synopsis" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= session('validation_errors') && array_key_exists('synopsis', session('validation_errors')) && session('validation_errors')['synopsis'] ? 'red-600' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Synopsis</label>
                </div>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('synopsis', session('validation_errors')) && session('validation_errors')['synopsis']) {
                                                echo session('validation_errors')['synopsis'];
                                            }
                                            ?></div>
                <div class="my-2"></div>
                <select id="category_id" name="category_id" class="bg-[#E5E9F0] border border-[#434C5E] text-[#434C5E] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-[#E5E9F0] dark:<?= session('validation_errors') && array_key_exists('category_id', session('validation_errors')) && session('validation_errors')['category_id'] ? 'red-600' : '[#434C5E]' ?> dark:text-[#434C5E] dark:focus:ring-blue-500 dark:focus:border-<?= session('validation_errors') && array_key_exists('category_id', session('validation_errors')) && session('validation_errors')['category_id'] ? 'red-600' : 'blue' ?>-500 dark:border-<?= session('validation_errors') && array_key_exists('category_id', session('validation_errors')) && session('validation_errors')['category_id'] ? 'red-600' : '[#434C5E]' ?> dark:placeholder-<?= session('validation_errors') && array_key_exists('category_id', session('validation_errors')) && session('validation_errors')['category_id'] ? 'red-600' : '[#434C5E]' ?>">
                    <option selected>Choose a category</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('category_id', session('validation_errors')) && session('validation_errors')['category_id']) {
                                                echo session('validation_errors')['category_id'];
                                            }
                                            ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= session('validation_errors') && array_key_exists('price', session('validation_errors')) && session('validation_errors')['price'] ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= session('validation_errors') && array_key_exists('price', session('validation_errors')) && session('validation_errors')['price'] ? 'red-600' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" autofocus name="price" value="<?= old('price'); ?>"></input>
                    <label for="price" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= session('validation_errors') && array_key_exists('price', session('validation_errors')) && session('validation_errors')['price'] ? 'red-600' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Price (in Rp)</label>
                </div>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('price', session('validation_errors')) && session('validation_errors')['price']) {
                                                echo session('validation_errors')['price'];
                                            }
                                            ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= session('validation_errors') && array_key_exists('stock', session('validation_errors')) && session('validation_errors')['stock'] ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= session('validation_errors') && array_key_exists('stock', session('validation_errors')) && session('validation_errors')['stock'] ? 'red-600' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" autofocus name="stock" value="<?= old('stock'); ?>"></input>
                    <label for="stock" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= session('validation_errors') && array_key_exists('stock', session('validation_errors')) && session('validation_errors')['stock'] ? 'red-600' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Stock</label>
                </div>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('stock', session('validation_errors')) && session('validation_errors')['stock']) {
                                                echo session('validation_errors')['stock'];
                                            }
                                            ?></div>
                <div class="my-2"></div>
                <label class="block text-[#434C5E] dark:[#434C5E]" for="cover" id="cover-label">Cover</label>
                <img class="card-image-preview img-thumbnail img-preview" src="<?= base_url(); ?>assets/books-cover/no-cover.jpg" alt="preview-book-cover">
                <input onchange="previewImg()" id="cover" name="cover" class="block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-[#434C5E] focus:outline-none dark:bg-[#E5E9F0] dark:border-<?= session('validation_errors') && array_key_exists('cover', session('validation_errors')) && session('validation_errors')['cover'] ? 'red-600' : '[#434C5E]' ?> dark:placeholder-<?= session('validation_errors') && array_key_exists('cover', session('validation_errors')) && session('validation_errors')['cover'] ? 'red-600' : '[#434C5E]' ?>" id="cover" type="file">
                <p class="mt-1 text-<?= session('validation_errors') && array_key_exists('cover', session('validation_errors')) && session('validation_errors')['cover'] ? 'red-600' : '[#434C5E]' ?> font-thin">.jpg, .jpeg or .png | max size 1MB | max dimension 510px X 784px.</p>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('cover', session('validation_errors')) && session('validation_errors')['cover']) {
                                                echo session('validation_errors')['cover'];
                                            }
                                            ?></div>
                <div class="text-[#434C5E] font-light">If there is <span class="font-medium">NO</span> cover for the book, click download button to download default cover.</div>
                <div>
                    <a href="https://drive.google.com/u/0/uc?id=1Z_Z_ByJ2TIB_eUwWbnzqxHNb5bZvoZkY&export=download" download="" data-tooltip-target="data-tooltip" data-tooltip-placement="bottom" class="hidden sm:inline-flex items-center justify-center text-[#434C5E] w-8 h-8 dark:text-[#434C5E] hover:bg-[#E5E9F0] dark:hover:bg-[#81A1C1] focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm border border-[#434C5E]">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                        </svg>
                        <span class="sr-only">Download data</span>
                    </a>
                    <div id="data-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm text-[#E5E9F0] transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Download Default Cover
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="text-[#434C5E] font-light">Insert that default cover to form upload for cover above.</div>
            </div>
            <div class="my-8"></div>
            <div class="text-sm">
                <?= form_submit('submit', 'Add New Book', ['class' => 'bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md w-full px-5 py-2.5 transition-colors duration-200 border-2 border-black']) ?>
            </div>
            <div class="my-8"></div>
            <?= form_close() ?>
            <a href="/books" class="self-end text-sm border border-[#434C5E] hover:bg-[#81A1C1] text-[#434C5E] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200">
                Back to Books
            </a>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>