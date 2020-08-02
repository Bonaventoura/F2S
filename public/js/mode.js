<script src="{{ asset('js/jquery.min.js') }}"></script>

<script type="text/javascript">
    
    $(document).ready(function() {
        $('#mode_id').change(function() {
            var selectedValue = $(this).val();
            console.log(selectedValue);
            
            if (selectedValue == 1 || selectedValue == 2) {
                $("#tmoney_moov").show();
                $("#money_gram").hide();
                $("#west_union").hide();

            }else if(selectedValue == 3){
                $("#west_union").show();
                $("#tmoney_moov").hide();
                $("#money_gram").hide();
            }else{
                $("#money_gram").show();
                $("#west_union").hide();
                $("#tmoney_moov").hide();
            }

        });

    }); 

</script>