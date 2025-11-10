<html>
	<head>
		<script src="js/jquery-3.7.1.min.js"></script>
		<script src="css/tailwind.js"></script>
		{block name=scripts}{/block}
	</head>
	<body class="font-sans antialiased">
        {include file='components/navbar.tpl'}
        <div class="p-4">
            {block name=main}{/block}
        </div>
	</body>
</html>