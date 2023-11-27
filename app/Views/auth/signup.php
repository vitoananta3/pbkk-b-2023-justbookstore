<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
    <div class="flex flex-col h-screen bg-[#434C5E] justify-center items-center">
        <div class="bg-[#E5E9F0] w-7/12 h-5/6 flex rounded-md outline">
            <div class="h-full w-1/2 bg-cover rounded-l-md"
                style="background-image: url(<?= base_url() ?>assets/images/bookshelf-2.jpg)">
            </div>
            <div class="flex flex-col items-center w-1/2 text-[#434C5E]">
                <div class="my-8"></div>
                <p class="text-lg font-semibold">Sign Up to JustBookStore!</p>
                <div class="my-2"></div>
                <div class="flex flex-col w-full px-12 text-[#434C5E] h-full justify-between">
                    <div class="flex flex-col">

                        <!-- Add email and password form -->
                        <?= form_open('auth/signup') ?>
                        <div class="my-2"></div>
                        <div class="flex gap-4">
                            <div class="text-sm">
                                <?= form_input('text', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Frist name']) ?>
                            </div>
                            <div class="text-sm">
                                <?= form_input('text', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Last name']) ?>
                            </div>
                        </div>
                        <div class="my-4"></div>
                        <div class="text-sm">
                            <?= form_input('email', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Email']) ?>
                        </div>
                        <div class="my-4"></div>
                        <div class="text-sm">
                            <?= form_password('password', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Password']) ?>
                        </div>
                        <div class="my-4"></div>
                        <div class="text-sm">
                            <?= form_password('password', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Repeat password']) ?>
                        </div>
                        <div class="my-8"></div>
                        <div class="text-sm">
                            <?= form_submit('submit', 'Sign Up', ['class' => 'bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md w-full px-5 py-2.5 transition-colors duration-200']) ?>
                        </div>
                        <?= form_close() ?>
                        <div class="my-2"></div>
                        <div class="text-sm text-center">Already have an account?</div>
                        <div class="my-2"></div>
                        <button
                            class="text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md w-full px-5 py-2.5 transition-colors duration-200 opacity-70">
                            <a href="/signin">Sign In</a>
                        </button>
                        <!-- End of email and password form -->
                    </div>
                    <div class="mb-12 self-end">
                        <button
                            class="text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200 opacity-70">
                            <a href="/books">Back to Books</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>