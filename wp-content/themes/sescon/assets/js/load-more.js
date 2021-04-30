jQuery(document).ready(function($) {

	$('.load-more').click(function(){
		$(this).html('Carregando');

		post_type = $(this).attr('var-post-type');
		paged = parseInt($(this).attr('var-paged'));
		category = parseInt($(this).attr('var-category'));
		taxonomy = parseInt($(this).attr('var-taxonomy'));
		pesquisa = $(this).attr('var-pesquisa');

		$.ajax({
			url: $(this).attr('var-url'),//ajaxurl,
			type: 'POST',
			data: {
				'action': 'load_more', // Ação do Ajax
				'post-type': post_type,
				'category': category,
				'taxonomy': taxonomy,
				'paged': paged,
				'pesquisa': pesquisa
			},
			success: function( response ){
				max_paged = response.split('max_paged').pop();
				loopHTML  = response.split('max_paged').shift();

				paged = paged + 1;
				if(paged > max_paged){ 
					$('.load-more').hide();
				}else{

                    //alert('pagina ' + paged);
                    //alert('maximo de ' + max_paged);

					$('.load-more').attr('var-paged' , paged);
					$('.load-more').attr('var-max-paged' , max_paged);

				}

				$('#carregar-mais').append(loopHTML);

				//owlCarousel();

				$('.load-more').html('Carregar Mais');
			},
			
			error: function(){

				$('#carregar-mais').append('<p class="erro-conteudo">Desculpe, não foi possível carregar mais conteúdos.</p>');
				//$('.load-more').html('Carregando');
				$('.load-more').hide();

			}
		});

	});

});	