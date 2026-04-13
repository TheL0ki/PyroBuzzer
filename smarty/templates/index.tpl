{extends file='layouts/layout.tpl'}
{block name=scripts}
    {include file='js/main.tpl'}
{/block}
{block name=main}
    <main class="flex justify-center">
        <div class="max-w-2xl text-3xl w-full">
            <div class="bg-gray-200 rounded-md p-2 max-w-2xl">
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-md px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="reload()">Start</button>
                <button class="py-2.5 px-5 me-2 mb-2 text-gray-900 focus:outline-none bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" onclick="stop()">Stop</button>
            </div>
            <div class="bg-gray-200 rounded-md mt-2 p-2 flex justify-left space-x-2">
                <div class="flex">Status:</div>
                <div id="status-container" class="flex align-middle"></div>
            </div>
            <div class="bg-gray-200 rounded-md mt-2 p-2 max-w-2xl space-y-2">
                <div>Ranking:</div>
                <div id="text-file-container"></div>
            </div>
        </div>
    </main>
{/block}