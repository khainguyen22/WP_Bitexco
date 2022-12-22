jQuery(document).ready(function($) {

	

	// Search Bar Ajax
	$(".shareholder-content .btn-search").on("click", (e) => {
		const inputValue = $('.shareholder-content input').val();
		$.ajax({
			url: ajaxObject.ajaxurl,
			type: "POST",
			data: {
				action: 'post_search_ajax',
				inputValue: inputValue
			},
			beforeSend() {
				$('.shareholder-items').html(
					'<div class="loader-box">'+
						'<div class="loader"></div>'
					+'</div>'
				)
			},
			success(data) {
				var results = data.split('|');
				$('.s-0 .shareholder-items').html(results[0])
				$('.s-0 .pagination').html(results[1])
			},
			error(errorThrown) {
				console.log(errorThrown);
			}
		})
	})

	// Reset Ajax
	$(".shareholder-content .reset").on("click", (e) => {
		const inputValue = $('.shareholder-content input').val('');
		$.ajax({
			url: ajaxObject.ajaxurl,
			type: "POST",
			data: {
				action: 'post_search_ajax',
				inputValue: ''
			},
			beforeSend() {
				$('.shareholder-items').html(
					'<div class="loader-box">'+
						'<div class="loader"></div>'
					+'</div>'
				)
			},
			success(data) {
				var results = data.split('|');
				$('.s-0 .shareholder-items').html(results[0])
				$('.s-0 .pagination').html(results[1])
			},
			error(errorThrown) {
				console.log(errorThrown);
			}
		})
	})

	// Filter By Year
	$("body").on("click", ".s-1 .years-filter .years", (e) => {
		$.ajax({
			url: ajaxObject.ajaxurl,
			type: "POST",
			data: {
				action: "finance_report_ajax",
				year: e.target.getAttribute('data-value')
			},
			beforeSend(data) {
				$('.s-1 .shareholder-items').html(
					'<div class="loader-box">'+
						'<div class="loader"></div>'
					+'</div>'
				)
			},
			success(data) {
				var results = data.split('|');
				$('.s-1 .shareholder-items').html(results[0])
				$('.s-1 .pagination').html(results[1])
				if (e.target.classList.contains('in-the-dropdown')) {
					$target_data_value = $(e.target).attr('data-value')
					$(e.target).attr('data-value', 	$('.y-18').attr('data-value'))
					$('.y-18').attr('data-value', $target_data_value)
				}
			},
			error(errorThrown) {
				console.log(errorThrown);
			},
		});
	});

	// Filter By Type
	$("body").on("click", ".s-3 .years-filter .years", (e) => {
		$.ajax({
			url: ajaxObject.ajaxurl,
			type: "POST",
			data: {
				action: "shareholder_report_ajax",
				type: e.target.getAttribute('data-value')
			},
			beforeSend(data) {
				$('.s-3 .shareholder-items').html(
					'<div class="loader-box">'+
						'<div class="loader"></div>'
					+'</div>'
				)
			},
			success(data) {
				var results = data.split('|');
				$('.s-3 .shareholder-items').html(results[0])
				$('.s-3 .pagination').html(results[1])
				if (e.target.classList.contains('in-the-dropdown')) {
					$target_data_value = $(e.target).attr('data-value')
					$(e.target).attr('data-value', 	$('.y-18').attr('data-value'))
					$('.y-18').attr('data-value', $target_data_value)
				}
			},
			error(errorThrown) {
				console.log(errorThrown);
			},
		});
	});

	// Pagination
	$("body").on("click", ".s-0 .page-numbers", (e) => {
		e.preventDefault();
		const inputValue = $('.shareholder-content input').val();
		var paged = '';
		paged = e.target.innerText
		if (e.target.closest('.s-0 .page-numbers').classList.contains('prev')) {
			paged = parseInt($('.s-0 .page-numbers.current').text()) -	 1;
		} else if (e.target.closest('.page-numbers').classList.contains('next')) {
			paged = parseInt($('.s-0 .page-numbers.current').text()) + 1;
		} 
		$.ajax({
			url: ajaxObject.ajaxurl,
			type: "POST",
			data: {
				action: "navigation_post_ajax",
				paged: paged,
				inputValue: inputValue,
				year: $('.years.active').text(),
				dots: e.target.classList.contains('dots') ? true : false,
			},
			beforeSend(data) {
				$('.s-0 .shareholder-items').html(
					'<div class="loader-box">'+
						'<div class="loader"></div>'
					+'</div>'
				)
			},
			success(data) {
				var results = data.split('|');
				$('.s-0 .shareholder-items').html(results[0])
				$('.s-0 .pagination').html(results[1])
			},
			error(errorThrown) {
				console.log(errorThrown);
			},
		});
	});

	// Pagination
	$("body").on("click", ".s-1 .page-numbers", (e) => {
		e.preventDefault();
		const inputValue = $('.shareholder-content input').val();
		var paged = '';
		paged = e.target.innerText
		if (e.target.closest('.s-1 .page-numbers').classList.contains('prev')) {
			paged = parseInt($('.s-1 .page-numbers.current').text()) -	 1;
		} else if (e.target.closest('.page-numbers').classList.contains('next')) {
			paged = parseInt($('.s-1 .page-numbers.current').text()) + 1;
		} 
		$.ajax({
			url: ajaxObject.ajaxurl,
			type: "POST",
			data: {
				action: "navigation_post_report_ajax",
				paged: paged,
				inputValue: inputValue, 
				year: $('.s-1 .years.active').text()
			},
			beforeSend(data) {
				$('.s-1 .shareholder-items').html(
					'<div class="loader-box">'+
						'<div class="loader"></div>'
					+'</div>'
				)
			},
			success(data) {
				var results = data.split('|');
				$('.s-1 .shareholder-items').html(results[0])
				$('.s-1 .pagination').html(results[1])
			},
			error(errorThrown) {
				console.log(errorThrown);
			},
		});
	});

		// Pagination
		$("body").on("click", ".s-2 .page-numbers", (e) => {
			e.preventDefault();
			const inputValue = $('.shareholder-content input').val();
			var paged = '';
			paged = e.target.innerText
			if (e.target.closest('.s-2 .page-numbers').classList.contains('prev')) {
				paged = parseInt($('.s-2 .page-numbers.current').text()) -	 1;
			} else if (e.target.closest('.page-numbers').classList.contains('next')) {
				paged = parseInt($('.s-2 .page-numbers.current').text()) + 1;
			} 
			$.ajax({
				url: ajaxObject.ajaxurl,
				type: "POST",
				data: {
					action: "annual_report_nav_ajax",
					paged: paged,
				},
				beforeSend(data) {
					$('.s-2 .annual-report-content').html(
						'<div class="loader-box">'+
							'<div class="loader"></div>'
						+'</div>'
					)
				},
				success(data) {
					var results = data.split('|');
					$('.s-2 .annual-report-content').html(results[0])
					$('.s-2 .pagination').html(results[1])
				},
				error(errorThrown) {
					console.log(errorThrown);
				},
			});
		});

	// Pagination "Tai Lieu Co Dong"
	$("body").on("click", ".s-3 .page-numbers", (e) => {
		e.preventDefault();
		var paged = '';
		paged = e.target.innerText
		if (e.target.closest('.s-3 .page-numbers').classList.contains('prev')) {
			paged = parseInt($('.s-3 .page-numbers.current').text()) -	 1;
		} else if (e.target.closest('.page-numbers').classList.contains('next')) {
			paged = parseInt($('.s-3 .page-numbers.current').text()) + 1;
		} 
		$.ajax({
			url: ajaxObject.ajaxurl,
			type: "POST",
			data: {
				action: "shareholder_report_nav_action",
				paged: paged,
				type: $('.s-3 .years.active').attr('data-value')

			},
			beforeSend(data) {
				$('.s-3 .shareholder-items').html(
					'<div class="loader-box">'+
						'<div class="loader"></div>'
					+'</div>'
				)
			},
			success(data) {
				var results = data.split('|');
				$('.s-3 .shareholder-items').html(results[0])
				$('.s-3 .pagination').html(results[1])
			},
			error(errorThrown) {
				console.log(errorThrown);
			},
		});
	});
})
