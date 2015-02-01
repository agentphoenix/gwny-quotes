<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<center>
			<table cellpadding="0" cellspacing="0" width="85%">
				<thead>
					<tr>
						<td align="center"><img src="{{ $message->embed(asset('img/GOLFWNY.png')) }}"></td>
					</tr>
					<tr height="25">
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><font face="Arial">@yield('content')</font></td>
					</tr>
				</tbody>
			</table>
		</center>
	</body>
</html>