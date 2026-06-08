{extends file='layouts/layout.tpl'}
{block name=scripts}
    {include file='js/settings.tpl'}
{/block}
{block name=main}
    <main class="flex justify-center">
        <div class="max-w-3xl w-full">
            <div class="bg-gray-200 rounded-md p-4">
                <h1 class="text-2xl font-bold text-gray-800 mb-1">Port Settings</h1>
                <p class="text-sm text-gray-600 mb-4">Einstellungen für Teamnamen und Sounds pro USB Port. Teamname ist standardmäßig <span class="font-medium">Team &lt;port&gt;</span>.</p>
                <div class="space-y-2">
                    {foreach from=$teams item=team}
                    <div class="port-card bg-white rounded-md overflow-hidden" data-team="{$team.id}" data-default-name="{$team.default_name|escape}">
                        <button type="button" class="port-card-toggle w-full flex items-center gap-3 p-4 text-left hover:bg-gray-50 transition-colors" aria-expanded="false">
                            <div class="flex items-center gap-2 min-w-0 flex-1">
                                <span class="text-sm font-semibold text-gray-500 uppercase tracking-wide shrink-0">Port {$team.id}</span>
                                <span class="team-name-label text-sm font-medium text-gray-800 truncate">{$team.name|escape}</span>
                                <span class="status-badge rounded-full py-0.5 px-2 text-xs text-white shrink-0 {if $team.configured}bg-emerald-600{else}bg-gray-400{/if}">
                                    {if $team.configured}Sound set{else}No sound{/if}
                                </span>
                            </div>
                            <svg class="chevron w-5 h-5 text-gray-400 shrink-0 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="port-card-body hidden px-4 pb-4 space-y-3 border-t border-gray-100">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="name-{$team.id}">Name</label>
                                <div class="flex gap-2">
                                    <input
                                        type="text"
                                        id="name-{$team.id}"
                                        class="team-name flex-1 rounded-md border border-gray-300 px-3 py-1.5 text-sm text-gray-800 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                                        value="{$team.name|escape}"
                                        placeholder="{$team.default_name|escape}"
                                        maxlength="50"
                                    >
                                    <button type="button" class="reset-name-btn text-sm text-gray-600 bg-white border border-gray-200 hover:bg-gray-100 rounded-md px-3 py-1.5 {if !$team.is_custom}hidden{/if}" onclick="resetTeamName('{$team.id}')">Reset</button>
                                </div>
                                <p class="name-status mt-1 text-xs text-emerald-600 hidden">Saved</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sound (MP3)</label>
                                <div class="flex flex-wrap items-center gap-2">
                                    <input type="file" accept=".mp3,audio/mpeg" class="sound-file flex-1 min-w-[12rem] text-sm text-gray-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    <button type="button" class="upload-btn text-white bg-blue-700 hover:bg-blue-800 rounded-md px-3 py-1.5 text-sm" onclick="uploadSound('{$team.id}')">Upload</button>
                                    <button type="button" class="test-btn text-gray-700 bg-white border border-gray-200 hover:bg-gray-100 rounded-md px-3 py-1.5 text-sm {if !$team.configured}opacity-50 cursor-not-allowed{/if}" onclick="testSound('{$team.id}')" {if !$team.configured}disabled{/if}>Test</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </main>
{/block}
