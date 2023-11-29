<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center bg-[#E5E9F0]">
    <div class="my-14"></div>
    <div class="flex items-center w-6/12 max-w-screen-xl mb-8">
        <div class="flex flex-col w-full">
            <?= form_open_multipart('books/update/' . $book['id']) ?>
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="slug" value="<?= $book['slug']; ?>">
            <input type="hidden" name="oldCover" value="<?=  $book['cover']; ?>">
            <div class="text-sm flex flex-col justify-center gap-2">
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= $validation->hasError('title') ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= $validation->hasError('title') ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="..." autofocus name="title" value="<?= (old('title')) ? old('title') : $book['title'] ?>" />
                    <label for="title" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= $validation->hasError('title') ? 'red' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Title</label>
                </div>
                <div class="text-red-600"><?= $validation->getError('title'); ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= $validation->hasError('author') ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= $validation->hasError('author') ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="..." autofocus name="author" value="<?= (old('author')) ? old('author') : $book['author'] ?>" />
                    <label for="author" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= $validation->hasError('author') ? 'red' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Author</label>
                </div>
                <div class="text-red-600"><?= $validation->getError('author'); ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= $validation->hasError('publisher') ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= $validation->hasError('publisher') ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="..." autofocus name="publisher" value="<?= (old('publisher')) ? old('publisher') : $book['publisher'] ?>" />
                    <label for="publisher" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= $validation->hasError('publisher') ? 'red' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Publisher</label>
                </div>
                <div class="text-red-600"><?= $validation->getError('publisher'); ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <textarea type="text" id="floating_outlined" class="h-32 border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= $validation->hasError('synopsis') ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= $validation->hasError('synopsis') ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autofocus name="synopsis"><?= (old('synopsis')) ? old('synopsis') : $book['synopsis'] ?></textarea>
                    <label for="synopsis" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= $validation->hasError('synopsis') ? 'red' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Synopsis</label>
                </div>
                <div class="text-red-600"><?= $validation->getError('synopsis'); ?></div>
                <div class="my-2"></div>
                <select id="category_id" name="category_id" class="bg-[#E5E9F0] border border-[#434C5E] text-[#434C5E] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-[#E5E9F0] dark:<?= $validation->hasError('category_id') ? 'red-600' : '[#434C5E]' ?> dark:text-[#434C5E] dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Choose a category</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>" <?= ($category['id'] == $book['category_id']) ? 'selected' : '' ?>>
                            <?= $category['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="text-red-600"><?= $validation->getError('category_id'); ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= $validation->hasError('price') ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= $validation->hasError('price') ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" autofocus name="price" value="<?= (old('price')) ? old('price') : $book['price'] ?>"></input>
                    <label for="price" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= $validation->hasError('price') ? 'red' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Price (in Rp)</label>
                </div>
                <div class="text-red-600"><?= $validation->getError('price'); ?></div>
                <div class="my-2"></div>
                <div class="relative">
                    <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= $validation->hasError('stock') ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= $validation->hasError('stock') ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" autofocus name="stock" value="<?= (old('stock')) ? old('stock') : $book['stock'] ?>"></input>
                    <label for="stock" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= $validation->hasError('stock') ? 'red' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Stock</label>
                </div>
                <div class="text-red-600"><?= $validation->getError('stock'); ?></div>
                <label class="block text-[#434C5E] dark:[#434C5E]" for="cover" id="cover-label">Cover</label>
                <img class="card-image-preview img-thumbnail img-preview" src="<?= base_url(); ?>assets/books-cover/<?=  $book['cover']; ?>" alt="preview-book-cover">
                <input onchange="previewImg()" id="cover" name="cover" class="block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-[#434C5E] focus:outline-none dark:bg-[#E5E9F0] dark:border-<?= session('validation_errors') && array_key_exists('cover', session('validation_errors')) && session('validation_errors')['cover'] ? 'red-600' : '[#434C5E]' ?> dark:placeholder-<?= session('validation_errors') && array_key_exists('cover', session('validation_errors')) && session('validation_errors')['cover'] ? 'red-600' : '[#434C5E]' ?>" id="cover" type="file">
                <p class="mt-1 text-<?= session('validation_errors') && array_key_exists('cover', session('validation_errors')) && session('validation_errors')['cover'] ? 'red-600' : '[#434C5E]' ?> font-thin">.jpg, .jpeg or .png | max size 1MB | max dimension 510px X 784px.</p>
                <div class="text-red-600"><?php
                                            if (session('validation_errors') && array_key_exists('cover', session('validation_errors')) && session('validation_errors')['cover']) {
                                                echo session('validation_errors')['cover'];
                                            }
                                            ?>
                </div>
            </div>
            <div class="my-8"></div>
            <?= form_submit('submit', 'Edit Book', ['class' => 'bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md w-full px-5 py-2.5 transition-colors duration-200 border-2 border-black']) ?>
            <?= form_close() ?>
            <div class="my-8">
                <div class="flex justify-end w-full">
                    <a href="/books" class="text-sm border border-[#434C5E] hover:bg-[#81A1C1] text-[#434C5E] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200">
                        Back to Books
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>