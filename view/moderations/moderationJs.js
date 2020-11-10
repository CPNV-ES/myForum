$( document ).ready(function() {
    let rows = $("#moderation tr").each(function(){
        let row = $(this);
        let columns = row.children(' td');
    });

    $('#selectState').change(function(){
        let state = $(this).val();
        if(!state == 'All')
        {
            rows.each(function(){
                let row = $(this);
                let match = row.data('state');
                if($.inArray(state, match) >-1)
                {
                    row.show()
                }
                else{
                    row.hide()
                }
            });
        }
    });
});