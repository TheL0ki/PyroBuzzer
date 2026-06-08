<script type="text/javascript">
    var knownTeams = new Set();
    var rankingInitialized = false;

    $(function() {
        getStatus();
    });

    function getStatus() {
        $('#text-file-container').load('loadtxt.php');
        $('#status-container').load('get_status.php');
        checkRankingForSounds();
        setTimeout(getStatus, 1000);
    }

    function checkRankingForSounds() {
        $.getJSON('get_ranking.php')
            .done(function(entries) {
                if (!rankingInitialized) {
                    entries.forEach(function(entry) {
                        knownTeams.add(entry.team);
                    });
                    rankingInitialized = true;
                    return;
                }

                entries.forEach(function(entry) {
                    if (!knownTeams.has(entry.team)) {
                        knownTeams.add(entry.team);
                        playTeamSound(entry.team);
                    }
                });
            });
    }

    function playTeamSound(team) {
        var audio = new Audio('sounds/team_' + team + '.mp3');
        audio.play().catch(function() {});
    }

    function stopLoad() {
        window.stop();
        document.execCommand("Stop");
    }

    function reload() {
        knownTeams.clear();
        rankingInitialized = false;
        $.ajax({
            url: 'start.php',
        });
    }

    function stop() {
        $.ajax({
            url: 'stop.php',
        });
    }
</script>
