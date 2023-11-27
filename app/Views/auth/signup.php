<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<div class="flex flex-col h-screen bg-[#434C5E] justify-center items-center">
    <div class="bg-[#E5E9F0] w-5/12 flex rounded-md outline p-12">
        <!-- <div class="h-full w-1/2 bg-cover rounded-l-md"
                style="background-image: url(<?= base_url() ?>assets/images/bookshelf-2.jpg)">
            </div> -->
        <div class="flex flex-col items-center text-[#434C5E] w-full">
            <p class="text-lg font-semibold mb-4">Sign Up to JustBookStore!</p>
            <div class="my-2"></div>
            <div class="flex flex-col text-[#434C5E] h-full justify-between w-full gap-8">
                <div class="flex flex-col">
                    <!-- Add email and password form -->
                    <?= form_open('auth/signup') ?>
                    <div class="my-2"></div>
                    <div class="flex gap-4">
                        <div class="text-sm w-1/2">
                            <?= form_label('First Name', 'first name') ?>
                            <?= form_input('text', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Frist name']) ?>
                        </div>
                        <div class="text-sm w-1/2">
                            <?= form_label('Last Name', 'last name') ?>
                            <?= form_input('text', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Last name']) ?>
                        </div>
                    </div>
                    <div class="my-4"></div>
                    <div class="text-sm">
                        <?= form_label('Email', 'email') ?>
                        <?= form_input('email', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Email']) ?>
                    </div>
                    <div class="my-4"></div>
                    <div class="text-sm">
                        <?=  form_label('Password', 'password') ?>
                        <?= form_password('password', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Password']) ?>
                    </div>
                    <div class="my-4"></div>
                    <div class="text-sm">
                        <?=  form_label('Repeat Password', 'repeat password') ?>
                        <?= form_password('password', '', ['class' => 'mt-2 block w-full rounded-lg bg-white px-3 py-2 border-2 border-[#434C5E]', 'placeholder' => 'Repeat password']) ?>
                    </div>
                    <div class="my-8"></div>
                    <div class="text-sm">
                        <?= form_submit('submit', 'Sign Up', ['class' => 'bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md w-full px-5 py-2.5 transition-colors duration-200 border-2 border-black']) ?>
                    </div>
                    <?= form_close() ?>
                    <div class="my-2"></div>
                    <div class="text-sm text-center">Already have an account?</div>
                    <div class="my-2"></div>
                    <a href="/signin" class="text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md w-full px-5 py-2.5 transition-colors duration-200 opacity-70 border-2 border-black flex justify-center">
                        Sign In
                    </a>
                    <!-- End of email and password form -->
                </div>
                <div class="self-end">
                    <a href="/books" class="text-sm border-2 border-[#434C5E] hover:bg-[#81A1C1] text-[#434C5E] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200 opacity-70">
                        Back to Books
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>