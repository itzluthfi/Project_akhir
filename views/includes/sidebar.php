<div
    class="relative flex h-[calc(100vh-2rem)] w-full max-w-[17rem] flex-col bg-white bg-clip-border p-4 text-gray-700 shadow-xl shadow-blue-gray-900/5 rounded-xl">
    <div class="p-4 mb-2">
        <h5
            class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 italic">
            WELCOME BACK,
            <div class="flex">
                <p class=" text-gray-800 ">Username, </p><span class="italic text-slate-400">Role</span>
            </div>

        </h5>
    </div>
    <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700">
        <a href="/project_akhir/views/role/role_list.php">
            <div role="button"
                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-slate-100 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                <div class="ml-1 grid mr-4 place-items-center">
                    <i class="fa-solid fa-user"></i>
                </div>
                Master Data Role
            </div>
        </a>
        <a href="/project_akhir/views/user/user_list.php">
            <div role="button"
                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-slate-100 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                <div class="grid mr-4 place-items-center">
                    <i class="fa-solid fa-users"></i>
                </div>
                Master Data User
            </div>
        </a>
        <a href="/project_akhir/views/barang/barang_list.php">
            <div role="button"
                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-slate-100 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                <div class="grid mr-4 place-items-center">
                    <i class="fa-solid fa-cube"></i>
                </div>
                Master Data Barang
            </div>
        </a>

        <div class="group relative block w-full hover:bg-slate-100 rounded-lg">
            <div role="button"
                class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-slate-100 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                <button type="button"
                    class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                    <div class="grid mr-4 place-items-center">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <p
                        class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                        Menu Transaksi
                    </p>
                    <span class="ml-4">
                        <i class="fa-solid fa-chevron-down fa-xs"></i>
                    </span>
                </button>
            </div>
            <div class="overflow-hidden hidden group-hover:block">
                <div class="block w-full py-1 font-sans text-sm antialiased font-light leading-normal text-gray-700">
                    <nav
                        class="flex min-w-[240px] flex-col gap-1 p-0 font-sans text-base font-normal text-blue-gray-700">
                        <a href="insert_transaksi.php">
                            <div role="button"
                                class="flex items-center w-full p-3 pl-6 leading-tight transition-all rounded-lg outline-none text-start hover:bg-slate-200 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </div>
                                Insert Transaksi
                            </div>
                        </a>
                        <a href="list_transaksi.php">
                            <div role="button"
                                class="flex items-center w-full p-3 pl-6 leading-tight transition-all rounded-lg outline-none text-start hover:bg-slate-200 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </div>
                                List Transaksi
                            </div>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>