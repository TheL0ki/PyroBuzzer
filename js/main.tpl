<script type="text/javascript">	 
    $(function() {
        getStatus();
    });

    function getStatus() {
        $('#text-file-container').load('loadtxt.php');
        $('#status-container').load('get_status.php');
        setTimeout("getStatus()",1000);
    }

    function stopLoad() {
        window.stop();
        document.execCommand("Stop");
    }

    function reload() {
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