<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<style>
			body {
				font-family: helvetica, arial, sans-serif;
				font-size: 16px;
				line-height: 1.75;
				color: #444;
				background-color: #ddd;
			}

			h1 {
				margin: 0;

				font-family: helvetica, arial, sans-serif;
				font-weight: 700;
				color: #ac1825;
			}
			h2 {
				margin: 0;

				font-family: helvetica, arial, sans-serif;
				font-style: italic;
				color: #77c043;
			}

			a {
				color: #6e9e32;
			}
			a:hover {
				color: #77c043;
			}

			hr {
				width: 75%;
				height: 0;
				margin-top: 20px;
				margin-bottom: 20px;

				border: 0;
				border-top: 1px solid #dbdbdb;
			}

			table {
				width: 85%;
				margin: 30px auto;
			}
			table thead tr td {
				height: 90px;

				background-color: rgb(118, 192, 67);
				color: #fff;
				text-align: center;
				font-size: 32px;
				font-weight: 600;
				font-family: helvetica, arial, sans-serif;
				font-style: italic;
				border: 1px solid rgb(110, 158, 50);
			}
			table tbody tr td {
				padding: 10px;

				background-color: #fbfbfb;
				border-left: 1px solid #ccc;
				border-right: 1px solid #ccc;
				border-bottom: 1px solid #ccc;
			}
		</style>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<td>Golf Western NY</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>@yield('content')</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>