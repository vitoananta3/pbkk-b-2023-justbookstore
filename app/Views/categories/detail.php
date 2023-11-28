<!-- <?php $this->setVar('pageTitle', "- Books"); ?> -->
<?= $this->extend('layout\default') ?>
<?= $this->section('content') ?>
<?= $this->include('component/guest/navbar') ?>
<div class="flex flex-col items-center h-screen bg-[#E5E9F0]">
    <div class="my-8"></div>
    <div class="mt-4"></div>
    <div class="flex gap-4">
        <a href="#" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black">
            <div>Edit Category</div>
        </a>
        <a href="#" class="max-w-screen-xl flex gap-2 text-sm bg-[#434C5E] hover:bg-[#81A1C1] text-[#E5E9F0] hover:text-[#434C5E] rounded-md px-3 py-2.5 transition-colors duration-200 border-2 border-black">
            <div>Delete Category</div>
        </a>
        <a href="/categories" class="self-end text-sm border border-[#434C5E] hover:bg-[#81A1C1] text-[#434C5E] hover:text-[#434C5E] rounded-md px-5 py-2.5 transition-colors duration-200">
            Back to Categories
        </a>
    </div>
    <div class="flex flex-wrap gap-6 max-w-screen-xl mx-auto py-4">
        <div class="bg-[#E5E9F0] rounded-md text-[#434C5E] p-2 outline">
            <?= $name = $category['name']; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>