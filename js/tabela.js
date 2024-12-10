var properties = [
	'name',
	'wins',
	'draws',
	'losses',
	'total',
];

$.each(properties, function(i, val) {
	var orderClass = ''; // Variável para controlar a direção da ordenação

	// Ação de clique para cada cabeçalho de coluna
	$("#" + val).click(function(e) {
		e.preventDefault();
		
		// Remover a classe 'active' de todos os outros filtros
		$('.filter__link.filter__link--active').not(this).removeClass('filter__link--active');
		$(this).toggleClass('filter__link--active');
		
		// Remover as classes 'asc' e 'desc' de todos os links de filtro
		$('.filter__link').removeClass('asc desc');

		// Alternar entre as classes 'asc' e 'desc'
		if (orderClass == 'desc' || orderClass == '') {
			$(this).addClass('asc');
			orderClass = 'asc';
		} else {
			$(this).addClass('desc');
			orderClass = 'desc';
		}

		// Encontrar o índice da coluna clicada
		var parent = $(this).closest('.header__item');
		var index = $(".header__item").index(parent);
		var $table = $('.table-content');
		var rows = $table.find('.table-row').get();
		var isSelected = $(this).hasClass('filter__link--active');
		var isNumber = $(this).hasClass('filter__link--number');

		// Ordenar as linhas
		rows.sort(function(a, b) {
			var x = $(a).find('.table-data').eq(index).text();
			var y = $(b).find('.table-data').eq(index).text();
			
			// Se for número, comparar numericamente
			if (isNumber) {
				return isSelected ? x - y : y - x;
			} else { // Se for texto, comparar alfabeticamente
				if (isSelected) {
					return x < y ? -1 : x > y ? 1 : 0;
				} else {
					return x > y ? -1 : x < y ? 1 : 0;
				}
			}
		});

		// Reaplicar as linhas ordenadas à tabela
		$.each(rows, function(index, row) {
			$table.append(row);
		});

		return false; // Impedir o comportamento padrão
	});
});