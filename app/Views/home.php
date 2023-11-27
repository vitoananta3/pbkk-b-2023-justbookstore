<!-- <?php $this->setVar('pageTitle', "- Home"); ?> -->
<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
    <div class="flex flex-col items-center h-screen bg-[#E5E9F0]">
        <div class="my-8"></div>
        <p class="text-5xl font-extrabold py-28 text-[#434C5E] max-w-screen-xl mx-auto">JustBookStore</p>
        <div class="flex items-center justify-between text-[#434C5E] max-w-screen-xl mx-auto p-4">
            <div class="flex flex-col w-5/12 gap-8">
                <p class="font-bold text-3xl">Discover a World of Knowledge at Your Fingertips</p>
                <p class="">Explore a vast collection of books, ranging from classics to contemporary bestsellers. Dive
                    into various categories and find the perfect book that suits your interests.</p>
            </div>
            <div class="pr-52">
                <button type="button"
                    class="bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] font-medium rounded-md text-xl px-5 py-2.5 text-center inline-flex items-center me-2 transition-colors duration-200">
                    <svg class="w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 18 21">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </svg>
                    <a href="<?=  base_url(); ?>books">Shop now</a>
                </button>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
