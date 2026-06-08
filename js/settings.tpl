<script type="text/javascript">
    function uploadSound(team) {
        var row = $('[data-team="' + team + '"]');
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
            alert('Could not play sound for team ' + team);
        });
    }

    function setRowConfigured(row, configured) {
        var badge = row.find('.status-badge');
        var testBtn = row.find('.test-btn');

        if (configured) {
            badge.removeClass('bg-gray-400').addClass('bg-emerald-600').text('Set');
            testBtn.prop('disabled', false).removeClass('opacity-50 cursor-not-allowed');
        } else {
            badge.removeClass('bg-emerald-600').addClass('bg-gray-400').text('Not set');
            testBtn.prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
        }
    }
</script>
