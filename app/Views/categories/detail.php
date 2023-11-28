<!-- <?php $this->setVar('pageTitle', "- Books"); ?> -->
<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center h-screen bg-[#E5E9F0]">
    <div class="my-8"></div>
    <div class="mt-8"></div>
    <div class="flex gap-4">
        <a href="<?=  base_url(); ?>categories/edit/<?=  $category['slug']; ?>" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black">
            <div>Edit Category</div>
        </a>
        <form action="<?= base_url(); ?>/categories/<?= $category['id']; ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black" id="pop-button">Delete Category</button>

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
        <a href="/categories" class="self-end text-sm border border-[#434C5E] hover:bg-[#81A1C1] text-[#434C5E] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200">
            Back to Categories
        </a>
    </div>
    <div class="flex flex-wrap gap-6 max-w-screen-xl mx-auto py-8">
        <div class="bg-[#E5E9F0] rounded-md text-[#434C5E] p-2 outline">
            <?= $name = $category['name']; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>