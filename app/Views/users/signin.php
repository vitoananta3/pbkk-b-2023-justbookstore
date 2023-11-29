<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<div class="flex flex-col h-screen bg-[#434C5E] justify-center items-center">
    <div class="bg-[#E5E9F0] w-5/12 flex rounded-md outline p-12">
        <!-- <div class="h-full w-1/2 bg-cover rounded-l-md" style="background-image: url(<?= base_url() ?>assets/images/bookshelf-1.jpg)">
        </div> -->
        <div class="flex flex-col items-center w-full text-[#434C5E]">
            <p class="text-lg font-semibold">Sign In to JustBookStore!</p>
            <div class="my-2"></div>
            <div class="flex flex-col w-full text-[#434C5E] h-full gap-8">
                <div class="flex flex-col">
                    <div class="text-red-600"><?php
                                                if (session('error')) {
                                                    echo session('error');
                                                }
                                                ?>
                    </div>
                    <!-- Add email and password form -->
                    <?= form_open('auth/signin') ?>
                    <div class="my-4"></div>
                    <div class="relative">
                        <input type="text" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= session('validation_errors') && array_key_exists('email', session('validation_errors')) && session('validation_errors')['email'] ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= session('validation_errors') && array_key_exists('email', session('validation_errors')) && session('validation_errors')['email'] ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="..." autofocus name="email" value="<?= old('email'); ?>" />
                        <label for="email" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= session('validation_errors') && array_key_exists('email', session('validation_errors')) && session('validation_errors')['email'] ? 'red' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                    </div>
                    <div class="text-red-600"><?php
                                                if (session('validation_errors') && array_key_exists('email', session('validation_errors')) && session('validation_errors')['email']) {
                                                    echo session('validation_errors')['email'];
                                                }
                                                ?>
                    </div>
                    <div class="my-4"></div>
                    <div class="relative">
                        <input type="password" id="floating_outlined" class="border block px-4 pb-3 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-[#434C5E] dark:border-<?= session('validation_errors') && array_key_exists('password', session('validation_errors')) && session('validation_errors')['password'] ? 'red-600' : '[#434C5E]' ?> dark:focus:border-<?= session('validation_errors') && array_key_exists('password', session('validation_errors')) && session('validation_errors')['password'] ? 'red' : 'blue' ?>-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="..." autofocus name="password" value="<?= old('password'); ?>" />
                        <label for="password" class="absolute text-[#434C5E] dark:text-[#434C5E] duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-[#E5E9F0] dark:bg-[#E5E9F0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-<?= session('validation_errors') && array_key_exists('password', session('validation_errors')) && session('validation_errors')['password'] ? 'red' : 'blue' ?>-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">password</label>
                    </div>
                    <div class="text-red-600"><?php
                                                if (session('validation_errors') && array_key_exists('password', session('validation_errors')) && session('validation_errors')['password']) {
                                                    echo session('validation_errors')['password'];
                                                }
                                                ?>
                    </div>
                    <div class="my-8"></div>
                    <div class="text-sm">
                        <?= form_submit('submit', 'Sign In', ['class' => 'bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md w-full px-5 py-2.5 transition-colors duration-200 border-2 border-black']) ?>
                    </div>
                    <?= form_close() ?>
                    <div class="my-2"></div>
                    <div class="text-sm text-center">Doesn't have an account?</div>
                    <div class="my-2"></div>
                    <a href="/signup" class="text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md w-full px-5 py-2.5 transition-colors duration-200 opacity-70 border-2 border-black flex justify-center">
                        Sign Up
                    </a>
                    <!-- End of email and password form -->
                </div>
                <div class="self-end">
                    <a href="/books" class="text-sm border-2 border-[#434C5E] hover:bg-[#81A1C1] text-[#434C5E] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200 opacity-70 ">
                        Back to Books
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>