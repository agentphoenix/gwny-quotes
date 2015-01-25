<script>
	$('.js-changeStatus').on('click', function(e)
	{
		e.preventDefault();

		$.ajax({
			type: "POST",
			url: "{{ route('admin.quotes.changeStatus') }}",
			data: {
				"_token": "{{ csrf_token() }}",
				"status": $(this).data('status'),
				"id": $(this).data('quote')
			},
			success: function(data)
			{
				window.location.reload();
			}
		});
	});
</script>