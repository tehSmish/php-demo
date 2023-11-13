<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class="<?= c_tab_highlight("/") ?> hover:bg-gray-700 rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                        <a href="/about" class="<?= c_tab_highlight("/about")?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <a href="/index" class="<?= c_tab_highlight("/index") ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Notes</a>
                        <?php endif ?>
                        <a href="/contact" class="<?= c_tab_highlight("/contact")?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <?php if ($_SESSION['user'] ?? false) : ?>
                        <form method="POST" action="/session">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="<?= c_tab_highlight("/logout") ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Logout</button>
                    
                        </form>    
                    <?php else : ?>
                        <a href="/login" class="<?= c_tab_highlight("/login") ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>
                        <a href="/register" class="<?= c_tab_highlight("/register") ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>