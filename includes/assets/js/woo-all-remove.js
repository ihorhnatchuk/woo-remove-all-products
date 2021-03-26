jQuery(document).ready(function($) {
	$('a.remove_all_products').on('click' , function(){
		var data = {
            'action': 'woo_remove_all_products',
        };
        jQuery.ajax({
        url: ajaxurl , // обработчик
        data: data,
        type: 'POST', // тип запроса
        success:function(data){
            console.log(data);
            if(data['succeess'] && data['isEmpty'])
            {
                alert("Нет товаров для удаления");
            }else{
                alert("Все товары удалены");
            }

            if(!data['succeess'])
            {
                alert("Что то пошло не так"  + data['error']);
            }
        }
        });
		return false;
	})
})