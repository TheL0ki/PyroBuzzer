{extends file='layouts/layout.tpl'}
{block name=scripts}
    {include file='js/history.tpl'}
{/block}
{block name=main}
    <main class="flex justify-center">
        <div class="max-w-2xl text-3xl w-full">
            {nocache}
                <div class="bg-gray-200 rounded-md p-2 max-w-2xl">
                    <div id="history-list"></div>
                    <div id="history-pagination" class="mt-4 flex justify-center items-center gap-2"></div>
                </div>
                <div class="bg-gray-200 rounded-md p-2 max-w-2xl mt-2 hidden">
                    <div id="history-container" class="p-2"></div>
                </div>
            {/nocache}
        </div>
    </main>
{/block}