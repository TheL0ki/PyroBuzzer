{extends file='layouts/layout.tpl'}
{block name=scripts}
    {include file='js/settings.tpl'}
{/block}
{block name=main}
    <main class="flex justify-center">
        <div class="max-w-3xl w-full">
            <div class="bg-gray-200 rounded-md p-4">
                <h1 class="text-2xl font-bold text-gray-800 mb-1">Team Sounds</h1>
                <p class="text-sm text-gray-600 mb-4">Upload an MP3 for each team. Re-uploading overwrites the existing file.</p>
                <div class="space-y-2">
                    {foreach from=$teams item=team}
                    <div class="grid grid-cols-[auto_1fr_auto] items-center gap-3 bg-white rounded-md p-3" data-team="{$team.id}">
                        <div class="flex items-center gap-2 min-w-[7rem]">
                            <span class="font-medium text-gray-800">Team {$team.id}</span>
                            <span class="status-badge rounded-full py-0.5 px-2 text-xs text-white {if $team.configured}bg-emerald-600{else}bg-gray-400{/if}">
                                {if $team.configured}Set{else}Not set{/if}
                            </span>
                        </div>
                        <input type="file" accept=".mp3,audio/mpeg" class="sound-file text-sm text-gray-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <div class="flex gap-2">
                            <button type="button" class="upload-btn text-white bg-blue-700 hover:bg-blue-800 rounded-md px-3 py-1.5 text-sm" onclick="uploadSound('{$team.id}')">Upload</button>
                            <button type="button" class="test-btn text-gray-700 bg-white border border-gray-200 hover:bg-gray-100 rounded-md px-3 py-1.5 text-sm {if !$team.configured}opacity-50 cursor-not-allowed{/if}" onclick="testSound('{$team.id}')" {if !$team.configured}disabled{/if}>Test</button>
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </main>
{/block}
