<script type="text/javascript">
    $(function() {
        $('.port-card-toggle').on('click', function() {
            togglePortCard($(this).closest('.port-card'));
        });

        $('.team-name').on('change', function() {
            var row = $(this).closest('.port-card');
            saveTeamName(row.data('team'), $(this).val().trim(), row);
        });
    });

    function togglePortCard(card) {
        var isOpen = card.hasClass('is-open');
        var toggle = card.find('.port-card-toggle');
        var body = card.find('.port-card-body');
        var chevron = card.find('.chevron');

        if (isOpen) {
            card.removeClass('is-open');
            body.addClass('hidden');
            chevron.removeClass('rotate-180');
            toggle.attr('aria-expanded', 'false');
        } else {
            card.addClass('is-open');
            body.removeClass('hidden');
            chevron.addClass('rotate-180');
            toggle.attr('aria-expanded', 'true');
        }
    }

    function saveTeamName(team, name, row) {
        var formData = new FormData();
        formData.append('team', team);
        formData.append('name', name);

        fetch('save_team_name.php', {
            method: 'POST',
            body: formData
        })
        .then(function(response) { return response.json(); })
        .then(function(data) {
            if (!data.ok) {
                alert(data.error || 'Failed to save name');
                return;
            }

            row.find('.team-name').val(data.name);
            row.find('.team-name-label').text(data.name);
            row.find('.reset-name-btn').toggleClass('hidden', !data.is_custom);

            var status = row.find('.name-status');
            status.removeClass('hidden');
            setTimeout(function() { status.addClass('hidden'); }, 1500);
        })
        .catch(function() {
            alert('Failed to save name');
        });
    }

    function resetTeamName(team) {
        var row = $('.port-card[data-team="' + team + '"]');
        var defaultName = row.data('default-name');
        row.find('.team-name').val(defaultName);
        saveTeamName(team, '', row);
    }

    function uploadSound(team) {
        var row = $('.port-card[data-team="' + team + '"]');
        var fileInput = row.find('.sound-file')[0];
        if (!fileInput.files.length) {
            alert('Please select an MP3 file first.');
            return;
        }

        var formData = new FormData();
        formData.append('team', team);
        formData.append('sound', fileInput.files[0]);

        row.find('.upload-btn').prop('disabled', true).text('Uploading...');

        fetch('upload_sound.php', {
            method: 'POST',
            body: formData
        })
        .then(function(response) { return response.json(); })
        .then(function(data) {
            if (data.ok) {
                setRowConfigured(row, true);
                fileInput.value = '';
            } else {
                alert(data.error || 'Upload failed');
            }
        })
        .catch(function() {
            alert('Upload failed');
        })
        .finally(function() {
            row.find('.upload-btn').prop('disabled', false).text('Upload');
        });
    }

    function testSound(team) {
        var audio = new Audio('sounds/team_' + team + '.mp3');
        audio.play().catch(function() {
            alert('Could not play sound for port ' + team);
        });
    }

    function setRowConfigured(row, configured) {
        var badge = row.find('.status-badge');
        var testBtn = row.find('.test-btn');

        if (configured) {
            badge.removeClass('bg-gray-400').addClass('bg-emerald-600').text('Sound set');
            testBtn.prop('disabled', false).removeClass('opacity-50 cursor-not-allowed');
        } else {
            badge.removeClass('bg-emerald-600').addClass('bg-gray-400').text('No sound');
            testBtn.prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
        }
    }
</script>
